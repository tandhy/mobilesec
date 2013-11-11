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
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Input Email address')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
<<<<<<< HEAD
=======
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100, 'placeholder'=>'Input Password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verifyPassword'); ?>
		<?php echo $form->passwordField($model,'verifyPassword',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'verifyPassword'); ?>
	</div>

	<div class="row">
>>>>>>> iter1
		<?php echo $form->labelEx($model,'fName'); ?>
		<?php echo $form->textField($model,'fName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'fName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mName'); ?>
		<?php echo $form->textField($model,'mName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lName'); ?>
		<?php echo $form->textField($model,'lName',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution'); ?>
		<?php echo $form->textField($model,'institution',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->textField($model,'role',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
<<<<<<< HEAD
=======
		<?php echo $form->labelEx($model,'regDate'); ?>
		<?php echo $form->textField($model,'regDate'); ?>
		<?php echo $form->error($model,'regDate'); ?>
	</div>

	<div class="row">
>>>>>>> iter1
		<?php echo $form->labelEx($model,'accStatus'); ?>
		<?php echo $form->textField($model,'accStatus'); ?>
		<?php echo $form->error($model,'accStatus'); ?>
	</div>

<<<<<<< HEAD
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'update-submit-btn')); ?>
        <?php echo CHtml::resetButton('Reset',array('class'=>'reset-btn')); ?>
=======
	<div class="row">
		<?php echo $form->labelEx($model,'lastLogin'); ?>
		<?php echo $form->textField($model,'lastLogin'); ?>
		<?php echo $form->error($model,'lastLogin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
>>>>>>> iter1
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->