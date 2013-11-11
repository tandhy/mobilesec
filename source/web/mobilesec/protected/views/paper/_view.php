<?php
/* @var $this PaperController */
/* @var $data Paper */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileName')); ?>:</b>
	<?php echo CHtml::encode($data->fileName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php echo CHtml::encode($data->author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confPub')); ?>:</b>
	<?php echo CHtml::encode($data->confPub); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abstract')); ?>:</b>
	<?php echo CHtml::encode($data->abstract); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCat')); ?>:</b>
	<?php echo CHtml::encode($data->idCat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bibTex')); ?>:</b>
	<?php echo CHtml::encode($data->bibTex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileUrl')); ?>:</b>
	<?php echo CHtml::encode($data->fileUrl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>