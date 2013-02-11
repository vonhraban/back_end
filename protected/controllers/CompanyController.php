<?php

class CompanyController extends GxController
{

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Company'),
        ));
    }

    public function actionCreate()
    {
        $model = new Company;


        if (isset($_POST['Company'])) {
            $model->setAttributes($_POST['Company']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->company_id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Company');


        if (isset($_POST['Company'])) {
            $model->setAttributes($_POST['Company']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->company_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Company')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Company');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Company('search');
        $model->unsetAttributes();

        if (isset($_GET['Company']))
            $model->setAttributes($_GET['Company']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}