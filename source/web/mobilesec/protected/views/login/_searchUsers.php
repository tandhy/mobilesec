<?php
/* @var $this LoginController */
/* @var $data Login */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($data,'email'); ?>
		<?php echo $form->textField($data,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'fName'); ?>
		<?php echo $form->textField($data,'fName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'mName'); ?>
		<?php echo $form->textField($data,'mName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'lName'); ?>
		<?php echo $form->textField($data,'lName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'institution'); ?>
		<?php echo $form->textField($data,'institution',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'area'); ?>
		<?php echo $form->textField($data,'area',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'phone'); ?>
		<?php echo $form->textField($data,'phone',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'mobile'); ?>
		<?php echo $form->textField($data,'mobile',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'role'); ?>
		<?php echo $form->textField($data,'role',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'regDate'); ?>
		<?php echo $form->textField($data,'regDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'accStatus'); ?>
		<?php echo $form->textField($data,'accStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($data,'lastLogin'); ?>
		<?php echo $form->textField($data,'lastLogin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->