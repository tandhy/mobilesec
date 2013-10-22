<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email=>array('view','id'=>$model->email),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->email)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Login <?php echo $model->email; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>