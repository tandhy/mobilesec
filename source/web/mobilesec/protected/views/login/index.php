<?php
/* @var $this LoginController */
<<<<<<< HEAD

$this->pageTitle=Yii::app()->name . ' - Dashboard';

?>

<h3>Dashboard</h3>
<p>This is a dashboard page for user</p>
=======
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
	array('label'=>'Need to Approve', 'url'=>array('approve')),
);
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
>>>>>>> iter1
