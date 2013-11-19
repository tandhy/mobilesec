<?php
/* @var $this ReviewPaperController */
/* @var $data ReviewPaper */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('idTargetProblemCat')); ?>:</b>
	<?php echo CHtml::encode($data->getCategoryNameFromId($data->idTargetProblemCat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('targetProblemDetail')); ?>:</b>
	<?php echo CHtml::encode($data->targetProblemDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPropSolutionCat')); ?>:</b>
	<?php echo CHtml::encode($data->getCategoryNameFromId($data->idPropSolutionCat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('propSolutionDetail')); ?>:</b>
	<?php echo CHtml::encode($data->propSolutionDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relatedWork')); ?>:</b>
	<?php echo CHtml::encode($data->relatedWork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pros')); ?>:</b>
	<?php echo CHtml::encode($data->pros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cons')); ?>:</b>
	<?php echo CHtml::encode($data->cons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('performance')); ?>:</b>
	<?php echo CHtml::encode($data->performance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<b><?php echo CHtml::encode("Reviewer"); ?>:</b>
	<?php echo CHtml::encode($data->getFNameLNameByEmail($data->createdBy)); ?>
	<br />

    <div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'edit-review-paper-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>
    <?php 
	if($data->createdBy==Yii::app()->user->id || strtolower(Yii::app()->user->roles)=="admin")
	{
		echo Chtml::hiddenField('txtIdReviewPaper',CHtml::encode($data->id));
	?>
    	<br />
    <?php
		echo CHtml::submitButton('Edit Review',array('name'=>'cmdEditReviewPaper', 'class'=>'edit-review-btn'))." ";
	}
	if(strtolower(Yii::app()->user->roles)=="admin")
		echo CHtml::submitButton('Delete Review',array('name'=>'cmdDeleteReviewPaper', 'class'=>'delete-review-btn'));
	?>
	<?php $this->endWidget(); ?>    
	</div>
</div>