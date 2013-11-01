<?php
/* @var $this LoginController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

?>

<h2>Registered Users</h2>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>
<?php /*$this->widget('zii.widgets.grid.CGridView', array(
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
		/*array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
 <div class="search-form" style="display:none">
<?php $this->renderPartial('_manageUsers',array(
	'data'=>$data,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'login-grid',
	'dataProvider'=>$data->getApprovedUsers(),
	'filter'=>$data,
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
			'template'=>'{view} {update} {deactivate}',
			'buttons'=>array(
				'deactivate'=> array(
					'label'=>'Deactivate',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/deactivateUser.png',
					'options' => array(
                            'confirm' => 'Are you sure want to deactivate ?',
                    ),
					'url' => 'Yii::app()->createUrl("login/deactivateUser",array("id"=>$data->email))',
					//correct - 'url' => 'Yii::app()->controller->createUrl("approveUsers",array("id"=>$data->email))',
					//'url'=>array('ApproveUser',array('id'=>22)),
					//'url'=>$this->createUrl("login/approveUser",array('id'=>100,'#'=>'title')),
					//'url'=>array('login/delete','id'=>$model->email),
					//'url'=>Yii::app()->createUrl('/faq/index/', array('email' => $model->email)),
				),
			),
		),
	),
)); ?>

