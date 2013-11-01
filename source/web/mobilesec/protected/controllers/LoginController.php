<?php

class LoginController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('manage','index','view','update','approve','logout','approveUser','deactivateUser','manage'),
				'users'=>array('administrator','tandhy@bu.edu'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Login;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Login']))
		{
			/*$model->attributes=$_POST['Login'];
			$model->regDate = date("Y-m-d");
			$model->lastLogin = date("Y-m-d");
			$model->accStatus = 0;
			$model->role = "user";
			
			// hash password with md5
			$pass = md5($this->password);
			$model->password = $pass;
			*/
			if($model->save())
				$this->redirect(array('view','id'=>$model->email));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['Login'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->email));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Login');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$data = new Login("getApprovedUsers");
		$data->unsetAttributes();  // clear any default values
		$this->render('index',array(
			'data'=>$data,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionManage()
	{
		/*$dataProvider=new CActiveDataProvider('Login');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$data = new Login("getApprovedUsers");
		$data->unsetAttributes();  // clear any default values
		$this->render('manageUsers',array(
			'data'=>$data,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Login('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Login']))
			$model->attributes=$_GET['Login'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/*
	 * Render view of member which has not been approved.
	 * @param check the accStatus, if 0 = not been approved
	 * @author tandhy / 10.18.13
	 */
	public function actionapproveUser($id)
	{
		if(Login::model()->updateByPk($id,array('accStatus'=>1)) ==1)
		{
			// send notification to user
			Login::model()->sendApprovalNotificationToUser($this->loadModel($id));
		}
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('approve'));
	}	
	
	/*
	 * Render view of member which has not been approved.
	 * @param check the accStatus, if 0 = not been approved
	 * @author tandhy / 10.18.13
	 */
	public function actiondeactivateUser($id)
	{
		if(Login::model()->updateByPk($id,array('accStatus'=>0)) == 1 )
		{
			// send notification to user that the account is deactivate
			//Login::model()->sendApprovalNotificationToUser($this->loadModel($id));
		}
		

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}	
	
	/*
	 * Render view of member which has not been approved.
	 * @param check the accStatus, if 0 = not been approved
	 * @author tandhy / 10.18.13
	 */
	public function actionApprove()
	{
		$model=new Login('getNewUsers');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Login']))
			$model->attributes=$_GET['Login'];

		$this->render('approveUsers',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Login the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Login::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
