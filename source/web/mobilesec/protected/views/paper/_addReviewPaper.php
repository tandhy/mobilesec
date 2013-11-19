<?php
/* @var $this ReviewPaperController */
/* @var $modelReviewPaper ReviewPaper */
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

	<?php echo $form->errorSummary($modelReviewPaper); ?>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'idTargetProblemCat'); ?>
		<?php echo $form->DropDownList($modelReviewPaper,'idTargetProblemCat',$modelReviewPaper->getCategoryList(),array('class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'idTargetProblemCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'targetProblemDetail'); ?>
		<?php echo $form->textArea($modelReviewPaper,'targetProblemDetail',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write Target Problem Detail*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'targetProblemDetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'idPropSolutionCat'); ?>
		<?php echo $form->DropDownList($modelReviewPaper,'idPropSolutionCat',$modelReviewPaper->getCategoryList(),array('class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'idPropSolutionCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'propSolutionDetail'); ?>
		<?php echo $form->textArea($modelReviewPaper,'propSolutionDetail',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write Proposed Solution Detail*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'propSolutionDetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'relatedWork'); ?>
		<?php echo $form->textArea($modelReviewPaper,'relatedWork',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write paper related works*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'relatedWork'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'pros'); ?>
		<?php echo $form->textArea($modelReviewPaper,'pros',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write paper pros*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'pros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'cons'); ?>
		<?php echo $form->textArea($modelReviewPaper,'cons',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write paper cros*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'cons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'performance'); ?>
		<?php echo $form->textArea($modelReviewPaper,'performance',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write Paper Performance*','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'performance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelReviewPaper,'other'); ?>
		<?php echo $form->textArea($modelReviewPaper,'other',array('rows'=>6, 'cols'=>50,'placeholder'=>'Write Others Solution or other information you may discover','class'=>'inputStyle')); ?>
		<?php echo $form->error($modelReviewPaper,'other'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Add Review',array('name'=>'cmdAddReviewPaper', 'class'=>'std-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->