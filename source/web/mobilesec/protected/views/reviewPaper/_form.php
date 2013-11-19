<?php
/* @var $this ReviewPaperController */
/* @var $model ReviewPaper */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-paper-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idTargetProblemCat'); ?>
		<?php echo $form->DropDownList($model,'idTargetProblemCat',$model->getCategoryList(),array('class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'idTargetProblemCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'targetProblemDetail'); ?>
		<?php echo $form->textArea($model,'targetProblemDetail',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'targetProblemDetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idPropSolutionCat'); ?>
		<?php echo $form->DropDownList($model,'idPropSolutionCat',$model->getCategoryList(),array('class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'idPropSolutionCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'propSolutionDetail'); ?>
		<?php echo $form->textArea($model,'propSolutionDetail',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'propSolutionDetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relatedWork'); ?>
		<?php echo $form->textArea($model,'relatedWork',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'relatedWork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pros'); ?>
		<?php echo $form->textArea($model,'pros',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'pros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cons'); ?>
		<?php echo $form->textArea($model,'cons',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'cons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'performance'); ?>
		<?php echo $form->textArea($model,'performance',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'performance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other'); ?>
		<?php echo $form->textArea($model,'other',array('rows'=>6, 'cols'=>50,'class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'other'); ?>
	</div>

	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'std-btn')); ?>&nbsp;<?php echo CHtml::resetButton('Cancel Edit',array('class'=>'reset-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->