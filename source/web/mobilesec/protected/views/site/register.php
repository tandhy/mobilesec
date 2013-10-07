<?php
/* @var $this LoginController */
/* @var $model Login */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>'40')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fName'); ?>
		<?php echo $form->textField($model,'fName',array('size'=>'20')); ?>
		<?php echo $form->error($model,'fName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mName'); ?>
		<?php echo $form->textField($model,'mName',array('size'=>'20')); ?>
		<?php echo $form->error($model,'mName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lName'); ?>
		<?php echo $form->textField($model,'lName',array('size'=>'20')); ?>
		<?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institution'); ?>
		<?php echo $form->textField($model,'institution',array('size'=>'40')); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>'40')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'phone');
			echo CHtml::label('Phone (xxx) xxx-xxxx','fmtphone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>'10')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'mobile'); 
			echo CHtml::label('Mobile (xxx) xxx-xxxx','fmtmobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>'10')); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>

<!-- hide the following data : start -->
<!-- 
	<div class="row">
		<?php //echo $form->labelEx($model,'role'); ?>
		<?php //echo $form->textField($model,'role'); ?>
		<?php //echo $form->error($model,'role'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'regDate'); ?>
		<?php //echo $form->textField($model,'regDate'); ?>
		<?php //echo $form->error($model,'regDate'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'actCode'); ?>
		<?php //echo $form->textField($model,'actCode'); ?>
		<?php //echo $form->error($model,'actCode'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'lastLogin'); ?>
		<?php //echo $form->textField($model,'lastLogin'); ?>
		<?php //echo $form->error($model,'lastLogin'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'accStatus'); ?>
		<?php //echo $form->textField($model,'accStatus'); ?>
		<?php //echo $form->error($model,'accStatus'); ?>
	</div>
-->
<!-- hide the following data : end -->


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->