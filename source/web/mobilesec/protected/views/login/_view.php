<?php
/* @var $this LoginController */
/* @var $data Login */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email), array('view', 'id'=>$data->email)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fName')); ?>:</b>
	<?php echo CHtml::encode($data->fName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mName')); ?>:</b>
	<?php echo CHtml::encode($data->mName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lName')); ?>:</b>
	<?php echo CHtml::encode($data->lName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institution')); ?>:</b>
	<?php echo CHtml::encode($data->institution); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regDate')); ?>:</b>
	<?php echo CHtml::encode($data->regDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accStatus')); ?>:</b>
	<?php echo CHtml::encode($data->accStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastLogin')); ?>:</b>
	<?php echo CHtml::encode($data->lastLogin); ?>
	<br />

	*/ ?>

</div>