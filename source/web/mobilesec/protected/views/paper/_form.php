<?php
/* @var $this PaperController */
/* @var $model Paper */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paper-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>'60%','placeholder'=>'Paper Title')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255,'placeholder'=>'Paper Author')); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4,'placeholder'=>'Publishing Year')); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'confPub'); ?>
		<?php echo $form->textField($model,'confPub',array('size'=>60,'maxlength'=>100,'placeholder'=>'Conference Publisher')); ?>
		<?php echo $form->error($model,'confPub'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'abstract'); ?>
		<?php echo $form->textArea($model,'abstract',array('rows'=>6, 'cols'=>'60%','placeholder'=>'Paper Abstract')); ?>
		<?php echo $form->error($model,'abstract'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'idCat'); ?>
		<?php //echo $form->textField($model,'idCat',array('placeholder'=>'Select category')); ?>
        <?php echo $form->DropDownList($model,'idCat',$model->getCategoryList()); ?>
		<?php echo $form->error($model,'idCat'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'bibTex'); ?>
		<?php echo $form->textArea($model,'bibTex',array('rows'=>6, 'cols'=>'60%','placeholder'=>'Paste BibText here...')); ?>
		<?php echo $form->error($model,'bibTex'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fileUrl'); ?>
		<?php echo $form->fileField($model,'fileUrl',array('size'=>60,'maxlength'=>255,'placeholder'=>'Select a file to upload')); ?>
		<?php echo $form->error($model,'fileUrl'); ?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($model,'fileName'); ?>
		<?php echo $form->textField($model,'fileName',array('size'=>60,'maxlength'=>255,'placeholder'=>'Set File Name')); ?>
		<?php echo $form->error($model,'fileName'); ?>
	</div>
	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('name'=>'cmdCreatePaper', 'class'=>'createpaper-submit-btn')); ?>
        <?php echo CHtml::resetButton('Reset',array('name'=>'cmdReset', 'class'=>'reset-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->