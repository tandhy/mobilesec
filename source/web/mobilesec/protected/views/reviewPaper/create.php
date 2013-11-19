<?php
/* @var $this ReviewPaperController */
/* @var $model ReviewPaper */

$this->breadcrumbs=array(
	'Review Papers'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List ReviewPaper', 'url'=>array('index')),
	array('label'=>'Manage ReviewPaper', 'url'=>array('admin')),
);*/
?>

<h1>Create ReviewPaper</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>