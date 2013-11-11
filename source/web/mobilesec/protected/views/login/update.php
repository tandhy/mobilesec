<?php
/* @var $this LoginController */
/* @var $model Login */

/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email=>array('view','id'=>$model->email),
	'Edit',
);
*/
?>

<h2>Your Profile Information<?php //echo $model->email; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>