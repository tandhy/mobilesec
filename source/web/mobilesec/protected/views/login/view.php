<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->email)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View User : <?php echo $model->email; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'password',
		'fName',
		'mName',
		'lName',
		'institution',
		'area',
		'phone',
		'mobile',
		'role',
		'regDate',
		'accStatus',
		'lastLogin',
	),
)); ?>
