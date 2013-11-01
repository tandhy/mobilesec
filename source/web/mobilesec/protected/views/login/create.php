<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

?>

<h1>Create Login</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>