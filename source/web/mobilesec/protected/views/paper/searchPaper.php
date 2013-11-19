<?php
/* @var $this PaperController */
/* @var $model Paper */

/*$this->breadcrumbs=array(
	'Papers'=>array('index'),
	'Manage',
);*/

/*$this->menu=array(
	array('label'=>'List Paper', 'url'=>array('index')),
	array('label'=>'Create Paper', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paper-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search Your Papers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchPaper',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paper-grid',
	'dataProvider'=>$model->searchUserPaper(Yii::app()->user->id),
	'enableHistory'=>true,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'fileName',
		'title',
		'author',
		'confPub',
		array(
			'name'=>'year',
			'htmlOptions'=> array('style'=>'width:40px','text-align'=>'right'),
		),
		//'abstract',
		//'idCat',
		//'bibTex',
		//'fileUrl',
		//'createdBy',
		//'createdDate',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}',
			'htmlOptions' => array('style'=>'width:15px'),
			'headerHtmlOptions'=>array('style'=>'width:15px;'),
		),
	),
)); ?>
