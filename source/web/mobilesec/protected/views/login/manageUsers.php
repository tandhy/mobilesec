<?php
/* @var $this LoginController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Users',
);*/

Yii::app()->clientScript->registerScript('search', "
$('#accordionUser').click(function(){
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
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-1.9.1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
	$( "#accordionUser" ).accordion({
		active: false,
		collapsible: true,
		heightStyle: "content",
		icons: { "header": "ui-icon-circle-triangle-e" },
		event: "click"
	});
});
</script>
<style media="screen" type="text/css">
.ui-widget{
	font-size:0.8em;
}
</style>

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

<div id="accordionUser">
<h3><b>Advanced Search</b></h3>
    <div>
        <div class="search-form" style="display:none;background:#FFFFFF">
        <?php $this->renderPartial('_searchUsers',array(
            'data'=>$data,
        )); ?>
		</div><!-- search-form -->
    </div>
</div>

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

