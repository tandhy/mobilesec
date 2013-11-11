<?php
/* @var $this LoginController */
/* @var $model Login */

<<<<<<< HEAD
/*$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email=>array('view','id'=>$model->email),
	'Edit',
);
*/
?>

<h2>Your Profile Information<?php //echo $model->email; ?></h2>
=======
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
>>>>>>> iter1

<?php $this->renderPartial('_form', array('model'=>$model)); ?>