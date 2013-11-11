<?php
/* @var $this ReviewPaperController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Review Papers',
);

$this->menu=array(
	array('label'=>'Create ReviewPaper', 'url'=>array('create')),
	array('label'=>'Manage ReviewPaper', 'url'=>array('admin')),
);
?>

<h1>Review Papers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
