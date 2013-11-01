<ul class="operations">
<?php
if(!Yii::app()->user->isGuest)
{
	if(Yii::app()->user->roles=='admin')
	{
$this->menu=array(
	array('label'=>'Create Paper', 'url'=>array('create')),
	array('label'=>'Manage Paper', 'url'=>array('admin')),
);
	
?>
        <li><?php echo CHtml::link('Registered Users',array('manage')); ?></li>
        <li><?php echo CHtml::link('New User Registration',array('approve')); ?></li>
<?php
	}
?>
	<li><?php echo CHtml::link('View Profile',array('update','id'=>Yii::app()->user->id)); ?></li>
<?php
}
?>
</ul>