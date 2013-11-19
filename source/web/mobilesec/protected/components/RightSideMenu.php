<?php
Yii::import('zii.widgets.CPortlet');
 
class RightSideMenu extends CPortlet
{
	public $newUserNumber;
	
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
		if(!isset($this->newUserNumber) || $this->newUserNumber)
		{
			$this->newUserNumber = Login::model()->getNewUserNumber();
		}
    }
 
    protected function renderContent()
    {
        $this->render('RightSideMenu',array('newUserNumber'=>$this->newUserNumber));
		//Yii::log('newUserNumber : '.$this->newUserNumber,'vardump','RightSideMenu');
    }
}
?>