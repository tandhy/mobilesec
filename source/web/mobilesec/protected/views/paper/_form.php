<?php
/* @var $this PaperController */
/* @var $model Paper */
/* @var $form CActiveForm */
?>
<style media="screen" type="text/css">
textarea{
	resize:none;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paper-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textArea($model,'title',array('rows'=>3,'placeholder'=>'Type the title*','class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'author',array('rows'=>3,'placeholder'=>'Type paper author*. Split authors with semi-colon(;) and write last name, first name order.','class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'year'); ?>
        <?php //echo $form->labelEx($model,'confPub'); ?>
		<?php echo $form->textField($model,'year',array('size'=>5,'maxlength'=>5,'placeholder'=>'Year*','class'=>'inputStyle-year')); ?>
        <?php echo $form->textField($model,'confPub',array('size'=>70,'maxlength'=>100,'placeholder'=>'Conference Publisher*','class'=>'inputStyle-confpub')); ?>
		<?php echo $form->error($model,'year'); ?>
        <?php echo $form->error($model,'confPub'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'abstract',array('rows'=>10, 'cols'=>70,'placeholder'=>'Type paper abstracts*','class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'abstract'); ?>
	</div>

	<div class="row">
        <?php echo $form->DropDownList($model,'idCat',$model->getCategoryList(),array('class'=>'inputStyle')); ?>
		<?php //echo $form->textField($model,'idCat'); ?>
		<?php echo $form->error($model,'idCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->textArea($model,'bibTex',array('rows'=>6, 'cols'=>70,'placeholder'=>'Paste BibTex description','class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'bibTex'); ?>
	</div>

	<div class="row">
		<?php echo Chtml::label('Choose PDF File format for paper*','tempFileUpload');//echo $form->labelEx($model,'fileUrl'); ?>
		<?php echo $form->fileField($model,'tempFileUpload',array('size'=>70,'maxlength'=>255,'placeholder'=>'Choose PDF File format for paper*','class'=>'inputStyle')); ?>
		<?php echo $form->error($model,'tempFileUpload'); ?>
	</div>

	<div class="row">
        <?php echo "<span class='information'>Suggested Filename : </span>"; ?>
		<?php echo $form->textField($model,'fileName',array('size'=>70,'maxlength'=>255,'placeholder'=>'You may name your uploaded file','class'=>'inputStyle')); ?>
        <?php echo "<span class='information'>Filename format is : [Last Name First Author]-[Title summary]-[Conference Name][Year].<br>"; ?>
		<?php echo "For Example : Zhang-DynamicRBACForAndroid-ACSAC2013</span>";?>
		<?php echo $form->error($model,'fileName'); ?>
	</div>

	<p>&nbsp;</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add Paper' : 'Save',array('name'=>'cmdCreatePaper', 'class'=>'createpaper-submit-btn')); ?>
		<?php echo CHtml::resetButton('Reset',array('name'=>'cmdReset', 'class'=>'reset-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->