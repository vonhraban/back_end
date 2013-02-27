<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $company = Company::model()->findByPk(Yii::app()->user->companyId);
        /* Ilyen formátumra kell hozni a tömböt:
        $chartData = array(
            'label' => "Teszt 1",
            'data' =>  array(array(1, 1), ... ,array(30, 8)),
            'lines' => array('fillColor' => "#f2f7f9"),
            'points' => array('fillColor' => "#88bbc8")
        );
        */
        $chartData = array();
        $quizzis = $company->quizs;
        foreach ($quizzis as $quiz) {
            $data = array();
            $stat = $quiz->getStats('2013-01-29', '2013-02-27');
            $i = 1;
            foreach ($stat as $item) {
                $data[] = array($i++, $item);
            }
            
            $chartData[] = array(
                'label' => $quiz->name,
                'data' =>  $data,
                //'lines' => array('fillColor' => "#f2f7f9"),
                //'points' => array('fillColor' => '88bbc8')
            );
        }
        $this->render('index', array(
            'company' => $company,
            'chartData' => $chartData,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new CompanyLoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['CompanyLoginForm'])) {
            $model->attributes = $_POST['CompanyLoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    /**
     * Itt lehet regelni
     */
    public function actionRegistration()
    {
        $user = new CompanyUser('registration');
        if (isset($_POST['CompanyUser'])) {
            $user->attributes = $_POST['CompanyUser'];
            $user->company_id = 1; //Most még nem kezeljük a cégeket
            if ($user->save()) {
                $company = new Company();
                $company->name = $user->email;
                $company->save();
                $user->company_id = $company->company_id;
                //Bejelentkezetetjük az user-t
                $userIdentity = new UserIdentity($user->email, $user->password);
                $userIdentity->authenticate();
                Yii::app()->user->login($userIdentity);
                
                //Titkosítjuk a jelszavát
                $user->password = $user->hash($user->password);
                $user->password_confirm = $user->password;
                $user->save();
                
                $this->redirect(Yii::app()->createUrl('site'));
            }
        }
        
        $this->render('registration', array(
            'model' => $user,
        ));
    }

}