<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Create Login</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>