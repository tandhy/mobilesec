<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Approve Users',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#login-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Approve New Users</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
 <div class="search-form" style="display:none">
<?php $this->renderPartial('_approveUsersView',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'login-grid',
	'dataProvider'=>$model->getNewUsers(),
	'filter'=>$model,
	'columns'=>array(
		'email',
		'fName',
		'mName',
		'lName',
		'institution',
		/*'accStatus',
		'area',
		'phone',
		'mobile',
		'role',
		'regDate',
		'accStatus',
		'lastLogin',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
