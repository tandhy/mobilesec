<?php
/* @var $this ReviewPaperController */
/* @var $data ReviewPaper */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPaper')); ?>:</b>
	<?php echo CHtml::encode($data->idPaper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTargetProblemCat')); ?>:</b>
	<?php echo CHtml::encode($data->idTargetProblemCat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('targetProblemDetail')); ?>:</b>
	<?php echo CHtml::encode($data->targetProblemDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPropSolutionCat')); ?>:</b>
	<?php echo CHtml::encode($data->idPropSolutionCat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('propSolutionDetail')); ?>:</b>
	<?php echo CHtml::encode($data->propSolutionDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relatedWork')); ?>:</b>
	<?php echo CHtml::encode($data->relatedWork); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pros')); ?>:</b>
	<?php echo CHtml::encode($data->pros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cons')); ?>:</b>
	<?php echo CHtml::encode($data->cons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('performance')); ?>:</b>
	<?php echo CHtml::encode($data->performance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdDate')); ?>:</b>
	<?php echo CHtml::encode($data->createdDate); ?>
	<br />

	*/ ?>

</div>