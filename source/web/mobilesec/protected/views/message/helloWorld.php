<?php
$this->breadcrumbs=array(
	'Message'=>array('message/index'),
	'HelloWorld',
);?>
<h1>Hellow Gengs!!</h1>
<h3><a href="index.php?r=message/goodbye">Goodbye</a></h3>
<h3><?php echo CHtml::link("Pergi Jauh",array('message/goodbye'));?></h3>