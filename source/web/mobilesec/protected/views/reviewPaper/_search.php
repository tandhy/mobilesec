<?php
/* @var $this ReviewPaperController */
/* @var $model ReviewPaper */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPaper'); ?>
		<?php echo $form->textField($model,'idPaper',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTargetProblemCat'); ?>
		<?php echo $form->textField($model,'idTargetProblemCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'targetProblemDetail'); ?>
		<?php echo $form->textArea($model,'targetProblemDetail',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPropSolutionCat'); ?>
		<?php echo $form->textField($model,'idPropSolutionCat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propSolutionDetail'); ?>
		<?php echo $form->textArea($model,'propSolutionDetail',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relatedWork'); ?>
		<?php echo $form->textArea($model,'relatedWork',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pros'); ?>
		<?php echo $form->textArea($model,'pros',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cons'); ?>
		<?php echo $form->textArea($model,'cons',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'performance'); ?>
		<?php echo $form->textArea($model,'performance',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other'); ?>
		<?php echo $form->textArea($model,'other',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdBy'); ?>
		<?php echo $form->textField($model,'createdBy',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdDate'); ?>
		<?php echo $form->textField($model,'createdDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->