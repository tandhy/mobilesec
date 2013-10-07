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
    <!-- divide header with 2 column, span-19:750px; and span-5 last for the remaining -->
		<!-- <div id="logo"> -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td>
        <img src="images/mobsec_logo_sml.png" />
        </td>
        <td width="300" align="right" valign="bottom" id="header-login-txt">
			<?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'frmlogin',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>
        <!-- <form id="frmlogin" name="frmlogin" action="" method="post"> -->
        <?php echo CHtml::label('Username','luser'); ?>&nbsp;
        <input type="text" name="txtuser" id="txtuser" class="header-login-txtbox"/>&nbsp;
		<?php echo CHtml::label('Password','lpwd'); ?>&nbsp;
        <input type="password" name="txtpwd" id="txtpwd" class="header-login-txtbox" />&nbsp;
        <input type="submit" name="cmdlogin" id="cmdlogin" class="header-login-btn" value="LOGIN" />
        <!-- </form> -->
        <?php $this->endWidget(); ?>
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

	    <!-- adding search form : start 
        	 author : tandhy / 10.03.13
             purpose : add search form in header area
        -->
        <?php
			/*$form = $this->beginWidget('CActiveForm',array(
				'id'=>'search-form',				// form id
				'enableAjaxValidation'=>true,
				'enableClientValidation'=>true,
				//'focus'=>array($model,'firstName'),
			));
		*/
		 ?>
         <?php //echo CHtml::textField('txtsearch','',array('size'=>10,'maxlength'=>20)); ?>
         <?php //echo CHtml::submitButton('Search'); ?>
         <?php //$this->endWidget(); ?>
        <!-- adding search form : end -->

	</div><!-- header -->


	<div id="mainmenu">
	<?php 
		$this->widget('zii.widgets.CMenu',array(
			//'activeCssClass'=>'active',
			//'activateParents' => TRUE,
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'People', 'url'=>array('/site/people')),
				/*array(
					'label'=>'People', 
					'url'=>array('/site/people'),
					'linkOptions' => array('id'=>'menuPeople'), // tag id <a id='menuPeople'></a>
					'itemOptions' => array('id'=>'itemPeople'),
					//sub menu
					'items'=>array(
						array('label'=>'Faculty','url'=>'site/faculty'),
						array('label'=>'Student','url'=>'site/student'),
						array('label'=>'Collaboration','url'=>'site/collaboration'),
					),
				),*/
				array('label'=>'Projects', 'url'=>array('/site/projects')),
				array('label'=>'Publications', 'url'=>array('site/publications')),
				array('label'=>'Tools', 'url'=>array('/site/tools')),
				array('label'=>'Links', 'url'=>array('/site/links')),
				array('label'=>'Register', 'url'=>array('/site/register')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		));
	?>
	</div><!-- mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
    	<?php
			$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		?>
		Copyright &copy; <?php echo date('Y'); ?> by Mobile Security Research Lab.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
