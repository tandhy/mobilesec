<?php

class SiteController extends Controller
{
	public $layout = 'column2';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	 * Function name : processLoginForm
	 * Author		 : tandhy
	 * Date			 : 10.16.13
	 * Purpose		 : render and catch LoginForm request to view
	 */
	public function processLoginForm()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->authenticate())
			{
				//echo "validate and authenticate<br>";
				//$this->render('index');
				$this->redirect(Yii::app()->user->returnUrl);
			}
				
		}
	}	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$model=new LoginForm;
		//$this->layout = 'column2';
		if(!Yii::app()->user->isGuest) $this->layout = 'column2';

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			/*echo "<script language=javascript>alert('".$model->username."');</script>";*/
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			//Yii::log("actionIndex on click", 'vardump', 'SiteController');

			if($model->validate() && $model->login())
			{
				//Yii::log("actionIndex | validate and login return true", 'vardump', 'SiteController');

				$identity = new UserIdentity($model->username, $model->password);
				if($identity->authenticate()) {
					yii::app()->user->login($identity);				
					//$this->layout = 'column2';
					$this->redirect(array('login/index'));
				}
			}
			else
			{
				/*Yii::log('ErrorCode = '.$model->errorCode,'vardump','SiteController-93');
				if($model->errorCode==12)
				{
					Yii::app()->user->setFlash('validationError', "Sorry, but your is not approved yet. Please contact Administrator.");
				}
				else
				{	
					Yii::app()->user->setFlash('validationError', "Incorrect username or password");
				}
				*/
				//Yii::log("actionIndex | validate and login return false", 'vardump', 'SiteController');
			}
		}
		// display the login form
		//$this->render('login',array('model'=>$model));
		
		//$this->render('index',array('model'=>$model));

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
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
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->render('index');
				//$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
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
	 * author 	: tandhy
	 * date		: 10.01.13
	 * purpose	:
	 *	open publications page
	 */
	 public function actionPublications()
	 {
	 	$this->processLoginForm();
	 	//$this->layout = 'column2';
		// set the public layout in component/controller.php
		$this->render('publications');
	 }

	/**
	 * author 	: tandhy
	 * date		: 10.01.13
	 * purpose	:
	 *	open projects page
	 */
	 public function actionPeople()
	 {
	 	$this->processLoginForm();
		//$this->layout = 'column1';
		 $this->render('people');
	 }

	/**
	 * author 	: tandhy
	 * date		: 10.01.13
	 * purpose	:
	 *	open projects page
	 */
	 public function actionProjects()
	 {
	 	$this->processLoginForm();
		 $this->render('projects');
	 }

	/**
	 * author 	: tandhy
	 * date		: 10.03.13
	 * purpose	:
	 *	open tools page
	 */
	 public function actionTools()
	 {
	 	$this->processLoginForm();
		 $this->render('tools');
	 }

	/**
	 * author 	: tandhy
	 * date		: 10.03.13
	 * purpose	:
	 *	open links page
	 */
	 public function actionLinks()
	 {
	 	$this->processLoginForm();
		 $this->render('links');
	 }
	 
	/**
	 * author 	: tandhy
	 * date		: 10.03.13
	 * purpose	:
	 *	open Register page
	 */
	 public function actionRegister()
	 {
	 	$model = new Login;
		$resetForm = 0;
	 	// check for the register function

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['Login']))
		{
			// assign regDate and lastLogin to current Date
			//$model = new Login;
			$model->attributes=$_POST['Login'];
			/*echo "<script language=javascript>alert('".$msg."');</script>";*/
			if($model->save())
			{
				/*echo "<script language=javascript>alert('Saved');</script>";*/
				$resetForm = 1;
				// send email notification to admin via email
				
			}
			else
			{
				$resetForm = 0;
			}
		}

		$this->processLoginForm();
		if(Yii::app()->user->isGuest) 
		{
			//$model = new Login;
			//$model->unsetAttributes();
			$this->render('register', array('model'=>$model));
			/*if($resetForm==1)
			{
				$resetForm = 0;
				$form.reset('login-register-form').trigger('reset');
			}*/
		} 
		else 
		{
			$this->render('index');
		}

		/*
		if(isset($_POST['LoginForm']))
		{
			//echo "<script language=javascript>alert('".$model->username."');</script>";
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['Login'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->email));
		}
		*/
	 
	 }

}