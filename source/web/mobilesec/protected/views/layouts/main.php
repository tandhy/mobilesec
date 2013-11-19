<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
	<div id="header">
    <div id="header-content">
    <!-- divide header with 2 column, span-19:750px; and span-5 last for the remaining -->
		<!-- <div id="logo"> -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td>
        <img src="images/mobsec_logo_sml.png" />
        </td>
        <td width="400" align="right" valign="bottom" id="header-login-txt">
        <div id="tblLogin" style="visibility:<?php echo (Yii::app()->user->isGuest) ? "visible" : "hidden" ; ?>;">
			<?php 
			$model = new LoginForm;
			$form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
				//'action'=>'index.php',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>

        <?php //echo $form->label($model,'username');?>&nbsp;
        <?php echo $form->textField($model,'username',array('class'=>'header-login-txtbox','placeholder'=>'email address')); ?>
		<?php //echo $form->label($model,'password'); ?>&nbsp;
        <?php echo $form->passwordField($model,'password',array('class'=>'header-login-txtbox','placeholder'=>'password')); ?>&nbsp;
        <?php echo CHtml::submitButton('Log In',array('class'=>'header-login-btn')); ?>
        <?php $this->endWidget(); ?>
        <?php if(Yii::app()->user->hasFlash('validationError')):?>
    			<div class="info">
        		<?php echo Yii::app()->user->getFlash('validationError'); ?>
    			</div>
		<?php endif; ?>
        </div>
        </td>
        </tr>
    </table>
    <!--    	<img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/mobsec_logo_sml.png" />
			<?php //echo CHtml::encode(Yii::app()->name); ?><br />
            <div id="logo-uni-name">
            <?php //echo "<b>Boston University</b> Metropolitan College<br>";?>
            <?php //echo "Department of Computer Science";?>
            </div>
        </div> <!-- logo end -->
	</div><!-- header content -->
	</div><!-- header -->


	<div id="mainmenu">
    <div id="mainmenu-content">
	<?php
		
		$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activeCssClass'=>'active',
			'activateParents' => TRUE,
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'People', 'url'=>array('/site/people')),
				array('label'=>'Projects', 'url'=>array('/site/projects')),
				array('label'=>'Publications', 'url'=>array('site/publications')),
				array('label'=>'Tools', 'url'=>array('/site/tools')),
				array('label'=>'Links', 'url'=>array('/site/links')),
				array('label'=>'Registration', 'url'=>array('/site/register'),'visible'=>Yii::app()->user->isGuest),
				// the login menu available to admin only
				array('label'=>'Dashboard', 'url'=>array('login/index'), 'visible' => (!Yii::app()->user->isGuest ? 1 : 0)),
				array('label'=>'Manage Users', 'url'=>array('/login/manage'), 'visible' => (!Yii::app()->user->isGuest && Yii::app()->user->roles=="admin" ? 1 : 0)),
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		));
				
	?>
	</div><!-- mainmenu content -->
	</div><!-- mainmenu -->
	
    <div id="breadcrumbs-content">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs-content -->
	<?php endif?>
	</div><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
    	<?php
			// menu in footer
			/*$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));*/
		?>
		Copyright &copy; <?php echo date('Y'); ?> by Mobile Security Research Lab.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
