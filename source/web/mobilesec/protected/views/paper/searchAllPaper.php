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

<h1>Search All Papers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchAllPaper',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paper-grid',
	'dataProvider'=>$model->search(),
	'enableHistory'=>true,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'fileName',
		'title',
		'author',
		'year',
		'confPub',
		//'abstract',
		//'idCat',
		//'bibTex',
		//'fileUrl',
		//'createdBy',
		//'createdDate',
		array(
			'class'=>'CButtonColumn',
			'template'=>$model->buttonTemplateUserForSearchAllPaper(Yii::app()->user->id,$model->id),
			'buttons'=>array(
				'review'=> array(
					'label'=>'Review Paper',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/review.png',
					'url' => 'Yii::app()->createUrl("paper/writeReview",array("id"=>$data->id))',
				),
			),
			'htmlOptions' => array('style'=>'width:10px'),
			'headerHtmlOptions'=>array('style'=>'width:10px;'),
		),
	),
)); ?>
