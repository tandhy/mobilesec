<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Tools';
/*$this->breadcrumbs=array(
	'Tools',
);*/
?>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
 <tr>
  <td>here is the list of tools available for Mobile Security Research Lab : </td>
 </tr>
 <tr>
  <td><strong><?php echo CHtml::link('Paper Portal',array('paper/index')); ?></strong></td>
 </tr>
<?php if(Yii::app()->user->isGuest){
?>
 <tr>
  <td>You are required to <strong>Login</strong> in order to use this tool. If you not a user, please Register <?php echo CHtml::link('here',array('site/register'));?>.</td>
 </tr>
<?php
}
?>
 <tr>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td>&nbsp;</td>
 </tr>
</table>
<p>&nbsp;</p>
