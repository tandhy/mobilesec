<?php
/* @var $this LoginController */
/* @var $model Login */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Approve Users',
);

<<<<<<< HEAD
=======
$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

>>>>>>> iter1
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
<<<<<<< HEAD
=======
		'mName',
>>>>>>> iter1
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
<<<<<<< HEAD
			'template'=>'{view} {approve}',
			'buttons'=>array(
				'approve'=> array(
					'label'=>'Approve',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/approve.png',
					'options' => array(
                            'confirm' => 'Are you sure?',
                    ),
					'url' => 'Yii::app()->createUrl("login/approveUser",array("id"=>$data->email))',
					//correct - 'url' => 'Yii::app()->controller->createUrl("approveUsers",array("id"=>$data->email))',
					//'url'=>array('ApproveUser',array('id'=>22)),
					//'url'=>$this->createUrl("login/approveUser",array('id'=>100,'#'=>'title')),
					//'url'=>array('login/delete','id'=>$model->email),
					//'url'=>Yii::app()->createUrl('/faq/index/', array('email' => $model->email)),
				),
			),
=======
>>>>>>> iter1
		),
	),
)); ?>
