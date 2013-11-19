<?php
/* @var $this LoginController */
/* @var $model Login */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Input Email address','class'=>'profileStyle-email','readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'fName',array('size'=>50,'maxlength'=>50,'class'=>'registerStyle-fName')); ?>&nbsp;<?php echo $form->textField($model,'mName',array('size'=>50,'maxlength'=>50,'class'=>'registerStyle-mName')); ?>&nbsp;<?php echo $form->textField($model,'lName',array('size'=>50,'maxlength'=>50,'class'=>'registerStyle-lName')); ?>
		<?php echo $form->error($model,'fName'); ?><?php echo $form->error($model,'mName'); ?><?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution'); ?>
		<?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>200,'class'=>'registerStyle')); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>200,'class'=>'registerStyle')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50,'class'=>'registerStyle-phone')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>50,'maxlength'=>50,'class'=>'registerStyle-mobile')); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'update-submit-btn')); ?>
        <?php echo CHtml::resetButton('Reset',array('class'=>'reset-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->