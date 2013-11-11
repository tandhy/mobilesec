<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
if(!Yii::app()->user->isGuest)
	$msg=Yii::app()->user->roles;
else
	$msg="guest";
Yii::log($msg, 'vardump','index.php');
?>

<<<<<<< HEAD
<h3>Welcome to Mobile Security Lab (MobSec Lab) at Department of Computer Science, Metropolitan College, Boston University. </h3>
<p>Mobile devices are now pervasive, not only for personal usage, but also changing the traditional IT environment in enterprises. According to a survey of the organizations with 500 more employees by Gartner Inc, 90% of enterprises have already deployed mobile devices, with smartphones being most widely deployed. BYOD (bring your own device) is an inevitable trend but also top concern for enterprises security. As the new favorite target to attackers, mobile devices become a very vulnerable point to security threats because of its immaturity. As the most popular mobile platform, the open platform Android  accounts for 79% of all smartphone shipped in the second quarter of 2013 based on the reports by Garnter an IDC. It also attracted most attention from attackers because of its popularity and openness.</p>
<p>The MobSec Lab studies how the mobile security (particular android security) can be enhanced through preventing, avoiding and detecting the threats from both platform and application levels. Our current interests include Role-Based Access Control on Android, Android application analysis, and NFC related security problems. The mobile security lab supports both education and research in mobile security by engaging the faculty and students in the research projects and by provision of educational and research resources.</p>
=======
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>&nbsp;</p>
>>>>>>> iter1
