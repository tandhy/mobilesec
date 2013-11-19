<ul class="operations">
<?php
/**
 * This file : RightSideMenu.php will serve all menu for all user
 * distinguish user by role
 */
if(!Yii::app()->user->isGuest)
{
	if(Yii::app()->user->roles=='admin')
	{
		/*$this->menu=array(
			array('label'=>'Create Paper', 'url'=>array('create')),
			array('label'=>'Manage Paper', 'url'=>array('admin')),
		);*/
	
?>
        <div class="portlet-decoration"><div class="portlet-title">User Management</div></div>
        <li><?php echo CHtml::link('Registered Users',array('login/manage')); ?></li>
        <li><?php echo CHtml::link('New User Registration'.($newUserNumber==0 ? "":' (<span class="required">'.$newUserNumber.'</span>)'),array('login/approve')); ?></li>
        <li><?php echo CHtml::link('Deactivated User',array('login/deactivate')); ?></li>
        <div class="portlet-decoration"><div class="portlet-title">Paper Portal</div></div>
        <li><?php echo CHtml::link('Add New Papers',array('paper/create')); ?></li>
        <li><?php echo CHtml::link('Manage Papers',array('paper/searchAll')); ?></li>
		<li><hr style="margin: 0 0 1px;"/></li>
		<li><?php echo CHtml::link('View Profile',array('login/update','id'=>Yii::app()->user->id)); ?></li>
		<li><?php echo CHtml::link('Logout',array('/site/logout')); ?></li>
<?php
	}
	else
	{
?>
        <div class="portlet-decoration"><div class="portlet-title">Paper Portal</div></div>
        <li><?php echo CHtml::link('Add New Papers',array('paper/create')); ?></li>
        <li><?php echo CHtml::link('Search Your Paper',array('paper/search')); ?></li>
        <li><?php echo CHtml::link('Search All Papers',array('paper/searchAll')); ?></li>
		<li><hr style="margin: 0 0 1px;"/></li>
		<li><?php echo CHtml::link('View Profile',array('login/update','id'=>Yii::app()->user->id)); ?></li>
		<li><?php echo CHtml::link('Logout',array('/site/logout')); ?></li>
<?php
	}
}
else
{
?>
        <li><?php echo CHtml::link('Home',array('site/index')); ?></li>
        <li><?php echo CHtml::link('People',array('site/people')); ?></li>
        <li><?php echo CHtml::link('Projects',array('site/projects')); ?></li>
		<li><?php echo CHtml::link('Publications',array('site/publications')); ?></li>
		<li><?php echo CHtml::link('Tools',array('site/tools')); ?>	    
		 <ul>
		  <li><?php echo CHtml::link('Paper Portal',array('site/tools')); ?></li>
	     </ul>
		</li>
        <li><?php echo CHtml::link('Links',array('site/links')); ?></li>
        <li><?php echo CHtml::link('Registration',array('site/register')); ?></li>
 <?php
}
?>
</ul>
