<?php
/* @var $this ReviewPaperController */
/* @var $model ReviewPaper */

$this->breadcrumbs=array(
	'Review Papers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewPaper', 'url'=>array('index')),
	array('label'=>'Create ReviewPaper', 'url'=>array('create')),
	array('label'=>'View ReviewPaper', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewPaper', 'url'=>array('admin')),
);
?>

<h1>Update ReviewPaper <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>