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
            );

            if ($model->saveWithRelated($relatedData)) {
                $model->saveFromJSON($_POST['options']);
                $this->redirect(array('view', 'id' => $model->question_id));
            }
        }
        $tags = Tag::model()->findAll();
        foreach ($tags as $tag) {
            $tags[] = $tag->name;
        }

        $this->render('update', array(
            'model' => $model,
            'tags' => $tags,
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
     * Kilistázza az elérhető kérdéseket. Ha van megadva $quiz_id, 
     * akkor a kérdést hozzá is lehet adni a quiz-hez.
     * 
     * @param string $category {all|private|public} milyen kérdések látszódjanak
     * @param integer $quiz_id Melyik quiz-hez adjuk hozzá.
     */
    public function actionIndex($category = 'all', $quiz_id = null)
    {
        $private_checked = '';
        $public_checked = '';
        $all_checked = '';
        $condition = '';
        if ($category == 'private') {
            $private_checked =  'checked="checked"';
            $condition = 't.company_id = ' . Yii::app()->user->companyId;
        } else if ($category == 'public') {
            $public_checked = 'checked="checked"';
            $condition = 't.company_id IS NULL';
        } else {
            $condition = 't.company_id IS NULL OR t.company_id = ' . Yii::app()->user->companyId;
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
            'quiz_id' => $quiz_id,
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
    
    /**
     * Megjeleníti a tag-ek felsorolsához szükséges view-t
     * 
     * @param string $name Tag neve
     */
    public function actionTagAjax($name)
    {
        echo $this->renderPartial(
            '_tag',
            array('tag' => Tag::model()->findByAttributes(array('name' => $name))),
            true
        );
    }

}