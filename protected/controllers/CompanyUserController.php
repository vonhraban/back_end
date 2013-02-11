<?php

class CompanyUserController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'CompanyUser'),
		));
	}

	public function actionCreate() {
		$model = new CompanyUser;


		if (isset($_POST['CompanyUser'])) {
			$model->setAttributes($_POST['CompanyUser']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->company_user_id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'CompanyUser');


		if (isset($_POST['CompanyUser'])) {
			$model->setAttributes($_POST['CompanyUser']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->company_user_id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'CompanyUser')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('CompanyUser');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new CompanyUser('search');
		$model->unsetAttributes();

		if (isset($_GET['CompanyUser']))
			$model->setAttributes($_GET['CompanyUser']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}