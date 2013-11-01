<?php
/* @var $this ReviewPaperController */
/* @var $model ReviewPaper */

$this->breadcrumbs=array(
	'Review Papers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReviewPaper', 'url'=>array('index')),
	array('label'=>'Create ReviewPaper', 'url'=>array('create')),
	array('label'=>'Update ReviewPaper', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewPaper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewPaper', 'url'=>array('admin')),
);
?>

<h1>View ReviewPaper #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idPaper',
		'idTargetProblemCat',
		'targetProblemDetail',
		'idPropSolutionCat',
		'propSolutionDetail',
		'relatedWork',
		'pros',
		'cons',
		'performance',
		'other',
		'createdBy',
		'createdDate',
	),
)); ?>
