<?php
/* @var $this PaperController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Papers',
);*/

/*$this->menu=array(
	array('label'=>'Create Paper', 'url'=>array('create')),
	array('label'=>'Manage Paper', 'url'=>array('admin')),
);*/
?>

<h3>Here is the list of your submitted Paper</h3>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
