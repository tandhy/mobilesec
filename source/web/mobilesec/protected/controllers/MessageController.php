<?php

class MessageController extends Controller
{
	public function actionHelloWorld()
	{
		//$this->render('helloWorld');
		$theTime = date("D M j G:i:s T Y");
		$this->render('helloWorld',array('time'=>$theTime));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionGoodbye()
	{
		$this->render('goodbye');
	}

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}