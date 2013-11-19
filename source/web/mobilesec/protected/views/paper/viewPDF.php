<?php
/* @var $this PaperController */

?>

<p>&nbsp;</p>
<p align="center"><h1 align="center"><?php echo $model->title;?></h1></p>
<p>&nbsp;</p>
<div style="height:600px;">
<?php
Yii::app()->clientScript->registerCoreScript('jquery');

$this->widget('ext.pdfJs.QPdfJs',array(
  'url'=>'paperUpload/'.$model->fileUrl,
  ));

?>
</div>