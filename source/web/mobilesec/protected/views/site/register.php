<?php
/* @var $this LoginController */
/* @var $model Login */
/* @var $form CActiveForm */
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-1.9.1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.js"></script>
<script>
$(function() {
$( document ).tooltip();
});
<style>
</style>
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-register-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>true,
	//'validateOnSubmit'=>true,
	//'validateOnChange'=>false,
	//'validateOnType'=>false,
)); ?>
<?php //if($resetForm=='1') document.getElementById("login-register-form").reset(); ?>

	<h1>User Registration</h1>
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->emailField($model,'email',array('title'=>'Example : johndoe@bu.edu', 'placeholder'=>'Input your Email address*','class'=>'registerStyle')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->passwordField($model,'password',array('title'=>'6-20 character','placeholder'=>'Input your Password*. contain mininum 6 char','class'=>'registerStyle-password')); ?>&nbsp;<?php echo $form->passwordField($model,'verifyPassword',array('title'=>'type the same as in password','placeholder'=>'Input your password again','class'=>'registerStyle-verpassword')); ?>
		<?php echo $form->error($model,'password'); ?><?php echo $form->error($model,'verifyPassword'); ?>
    </div>

	<div class="row">
		<?php echo $form->textField($model,'fName',array('size'=>'30','placeholder'=>'Input your First name*','class'=>'registerStyle-fName')); ?>&nbsp;<?php echo $form->textField($model,'mName',array('size'=>'10','placeholder'=>'Middle name','class'=>'registerStyle-mName')); ?>&nbsp;<?php echo $form->textField($model,'lName',array('size'=>'40','placeholder'=>'Input your Last name*','class'=>'registerStyle-lName')); ?>
		<?php echo $form->error($model,'fName'); ?>&nbsp;<?php echo $form->error($model,'mName'); ?>&nbsp;<?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'institution',array('size'=>'40', 'placeholder'=>'Input your Institution/Company/College*','class'=>'registerStyle')); ?>
		<?php echo $form->error($model,'institution'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'area',array('size'=>'40','placeholder'=>'Input your Area of interest*','class'=>'registerStyle')); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'phone',array('size'=>'20','placeholder'=>'Input your Phone number','class'=>'registerStyle-phone')); ?>&nbsp;<?php echo $form->textField($model,'mobile',array('size'=>'20','placeholder'=>'Input your Mobile number*','class'=>'registerStyle-mobile')); ?>
		<?php echo $form->error($model,'phone'); ?>&nbsp;<?php echo $form->error($model,'mobile'); ?>
	</div>

<!-- hide the following data : start -->

	<div class="row" style="visibility:visible">
		<?php //echo $form->labelEx($model,'role'); ?>
		<?php //echo $form->textField($model,'role'); ?>
		<?php //echo $form->error($model,'role'); ?>
	</div>

	<div class="row" style="visibility:visible">
		<?php //echo $form->labelEx($model,'regDate'); ?>
		<?php //echo $form->textField($model,'regDate'); ?>
		<?php //echo $form->error($model,'regDate'); ?>
	</div>

	<div class="row" style="visibility:visible">
		<?php //echo $form->labelEx($model,'lastLogin'); ?>
		<?php //echo $form->textField($model,'lastLogin'); ?>
		<?php //echo $form->error($model,'lastLogin'); ?>
	</div>

	<div class="row" style="visibility:visible">
		<?php //echo $form->labelEx($model,'accStatus'); ?>
		<?php //echo $form->textField($model,'accStatus'); ?>
		<?php //echo $form->error($model,'accStatus'); ?>
	</div>

<!-- hide the following data : end -->

	<p>&nbsp;</p>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Register',array('name'=>'cmdRegister', 'class'=>'register-submit-btn')); ?>
        <?php echo CHtml::resetButton('Reset',array('name'=>'cmdReset', 'class'=>'register-reset-btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->