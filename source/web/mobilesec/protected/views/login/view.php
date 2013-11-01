<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->email,
);

/*$this->menu=array(
	array('label'=>'Manage Users', 'url'=>array('manage')),
	array('label'=>'New User Registration', 'url'=>array('approve')),
	//array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email),'confirm'=>'Are you sure you want to delete this item?')),
);*/
?>

<h1>View User : <?php echo $model->email; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'fName',
		'mName',
		'lName',
		'institution',
		'area',
		'phone',
		'mobile',
		'role',
		'regDate',
		array(
		'name'=>'accStatus',
		'value'=>($model->accStatus=="1" ? 'Approved' : 'Pending'),
		),
		'lastLogin',
	),
)); ?>
