<?php

class QuestionController extends GxController
{

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Question'),
        ));
    }

    public function actionCreate()
    {
        $model = new Question;


        if (isset($_POST['Question'])) {
            $model->setAttributes($_POST['Question']);
            $relatedData = array(
                'tags' => $_POST['Question']['tags'] === '' ? null : $_POST['Question']['tags'],
                'quizs' => $_POST['Question']['quizs'] === '' ? null : $_POST['Question']['quizs'],
            );

            if ($model->saveWithRelated($relatedData)) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->question_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Question');


        if (isset($_POST['Question'])) {
            $model->setAttributes($_POST['Question']);
            $relatedData = array(
                'tags' => $_POST['Question']['tags'] === '' ? null : $_POST['Question']['tags'],
                'quizs' => $_POST['Question']['quizs'] === '' ? null : $_POST['Question']['quizs'],
            );

            if ($model->saveWithRelated($relatedData)) {
                $this->redirect(array('view', 'id' => $model->question_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Question')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    /**
     * Kilistázza az elérhető kérdéseket
     * 
     * @param string $category {all|private|public} milyen kérdések látszódjanak
     */
    public function actionIndex($category = 'all')
    {
        $private_checked = '';
        $public_checked = '';
        $all_checked = '';
        $condition = '';
        if ($category == 'private') {
            $private_checked =  'checked="checked"';
            $condition = 't.company_id = 1';
        }
        if ($category == 'public') {
            echo '----------------------------LEFUT';
            $public_checked = 'checked="checked"';
            $condition = 't.company_id IS NULL';
        }
        if ($category == 'all') {
            $all_checked = 'checked="checked"';
        }
        $dataProvider = new CActiveDataProvider('Question', array(
            'criteria' => array(
                'with' => 'tags',
                'condition' => $condition,
            )
        ));
                
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'all_checked' => $all_checked,
            'private_checked' => $private_checked,
            'public_checked' => $public_checked,
        ));
    }

    public function actionAdmin()
    {
        $model = new Question('search');
        $model->unsetAttributes();

        if (isset($_GET['Question']))
            $model->setAttributes($_GET['Question']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}