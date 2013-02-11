<?php

class QuizController extends GxController
{

    public function actionView($id)
    {
        $dataProvider = new CActiveDataProvider('question', array(
            'criteria' => array(
                'with' => array('quizs'),
                'condition' => 'quizs.quiz_id = :quiz_id',
                'params' => array(':quiz_id' => $id),
                'together' => true,
            )
        ));
        
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Quiz'),
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionCreate()
    {
        $model = new Quiz;


        if (isset($_POST['Quiz'])) {
            $model->setAttributes($_POST['Quiz']);
            $relatedData = array(
                'questions' => !isset($_POST['Quiz']['questions']) ? null : $_POST['Quiz']['questions'],
            );

            if ($model->saveWithRelated($relatedData)) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->quiz_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Quiz');


        if (isset($_POST['Quiz'])) {
            $model->setAttributes($_POST['Quiz']);
            $relatedData = array(
                'questions' => $_POST['Quiz']['questions'] === '' ? null : $_POST['Quiz']['questions'],
            );

            if ($model->saveWithRelated($relatedData)) {
                $this->redirect(array('view', 'id' => $model->quiz_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Quiz')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Quiz');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Quiz('search');
        $model->unsetAttributes();

        if (isset($_GET['Quiz']))
            $model->setAttributes($_GET['Quiz']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}