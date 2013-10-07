<?php
/**
 * This is the model class for table "tlogin".
 *
 * The followings are the available columns in table 'tlogin':
 * @property string $email
 * @property string $password
 * @property string $fName
 * @property string $mName
 * @property string $lName
 * @property string $institution
 * @property string $area
 * @property string $phone
 * @property string $mobile
 * @property string $role
 * @property string $regDate
 * @property string $actCode
 * @property integer $accStatus
 * @property string $lastLogin
 */
class ProjectTest extends CDbTestCase
{
	public function testCRUD()
	{
			$newLogin = new Login;
			$newLogin->setAttributes(
				array(
					'email' => 'mail@tandhy.com',
					'password' => 'password',
					'fName' => 'tandhy',
					'mName' => 'b',
					'lName' => 'parlindungan',
					'institution' => 'poltek batam',
					'area' => 'computer science',
					'phone' => '6177631324',
					'mobile' => '6177631324',
					'role' => 'member',
					'regDate' => '2013-10-06',
					'actCode' => '00000000',
					'accStatus' => '0',
					'lastLogin' => '-'
				)
			);
			$this->assertTrue($newLogin->save(false));

			// Updated password and institution
			$updPassword = 'passwordnya ini';
			$updInstution = 'BU';
			$newLogin->password = $updPassword;
			$newLogin->institution = $updInstution;
			$this->assertTrue($newLogin->save(false));

			// READ updated Data
			$updLogin = Login::model()->findByPk($newLogin->email);
			$this->assertTrue($updLogin instanceof Login);
			$this->assertEquals($updPassword,$updLogin->password);
			$this->assertEquals($updInstution,$updLogin->institution);

			// DELETE
			//$delLogin = Login::model()->findByPk($newLogin->email);
			$delEmail = $newLogin->email;
			$this->assertTrue($newLogin->delete());
			$delLogin = Login::model()->findByPk($delEmail);
			$this->assertEquals(NULL,$delLogin);
	}
}
?>
