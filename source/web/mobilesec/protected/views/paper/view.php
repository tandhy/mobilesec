<?php
/* @var $this PaperController */
/* @var $model Paper */

/*$this->breadcrumbs=array(
	'Papers'=>array('index'),
	$model->title,
);*/

/*$this->menu=array(
	array('label'=>'List Paper', 'url'=>array('index')),
	array('label'=>'Create Paper', 'url'=>array('create')),
	array('label'=>'Update Paper', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Paper', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Paper', 'url'=>array('admin')),
);*/
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-1.9.1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<style media="screen" type="text/css">
.ui-widget{
	font-size:0.8em;
}
</style>


<h3><?php echo $model->title; ?></h3>
<?php
// so User can return to previous search page
if(Yii::app()->user->hasState("paperHist"))
{       
        $paperHist=Yii::app()->user->getState('paperHist');               
        $route=array("paper/searchAll");
        echo CHtml::link("Back to search result",array_merge($route,$paperHist));
        Yii::app()->user->setState("paperHist",null);
}
?>
<?php
 $pathToPDF = Yii::app()->baseUrl . '/paperUpload/';
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'title',
		'author',
		'year',
		'confPub',
		'abstract',
		array(
			'name'=>'idCat',
			'value'=>$model->getCategoryNameFromId($model->idCat),
		),
		'bibTex',
		//'fileUrl',
		'fileName',
		array(
			'name'=>'createdBy',
			'value'=>$model->getFNameLNameByEmail($model->createdBy),
		),
		'createdDate',
		array(
			'name'=>'file',
			'type' => 'raw',
			'value'=> CHtml::link('Open File',array('paper/viewpdf','id'=>$model->id),array('target'=>'_blank')),
			/*'value'=>CHtml::link('Open PDF File', $pathToPDF.$model->fileUrl,
					array('target'=>'_blank')
			),*/
		),
	),
)); ?>

    <div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'edit-paper-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>
    <?php 
	if($model->createdBy == Yii::app()->user->id || strtolower( Yii::app()->user->roles) == "admin" )
	{
		echo Chtml::hiddenField('txtIdPaper',CHtml::encode($model->id));
		echo CHtml::submitButton('Edit Paper',array('name'=>'cmdEditPaper', 'class'=>'edit-paper-btn'))." ";
	}
	?>
	<?php $this->endWidget(); ?>    
	</div>

<?php 

if(Yii::app()->user->hasState("paperHist"))
{       
	echo CHtml::link("Back to search result",array_merge($route,$paperHist)); 
}
?>
<p>&nbsp;</p>
<div id="tabs">
<ul>
<li><a href="#tabs-1">Current Review</a></li>
<li><a href="#tabs-2">Write a Review</a></li>
</ul>
<div id="tabs-1">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'emptyText'=>'No Review available',
	'itemView'=>'_viewReviewPaper',
));
?>
</div>
<div id="tabs-2">
<?php 
	if($modelReviewPaper->checkUserReviewOnPaper(Yii::app()->user->id,$model->id))
		$this->renderPartial('_addReviewPaper', array('modelReviewPaper'=>$modelReviewPaper)); 
	else
		echo "<span class='red-text'>You are not allowed to create another review on this paper</span>";
?>
</div>
</div>
