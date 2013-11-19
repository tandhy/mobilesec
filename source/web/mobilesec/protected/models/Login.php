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
 * @property integer $accStatus
 * @property string $lastLogin
 */
class Login extends CActiveRecord
{
	public $verifyPassword; // holds for comparing with password

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tlogin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, verifyPassword, fName, lName, institution, area, mobile', 'required'),
			array('accStatus', 'numerical', 'integerOnly'=>true),
			array('email, password, verifyPassword', 'length', 'max'=>100),
			//array('email','size', 'max'=>50),
			array('fName, mName, lName, phone, mobile', 'length', 'max'=>50),
			array('institution, area', 'length', 'max'=>200),
			array('role', 'length', 'max'=>20),
			array('email','email'), // make sure email is a valid email
			array('verifyPassword', 'compare', 'compareAttribute'=>'password'), // compare password and verify password
			array('email, password, fName, mName, lName, institution, area, phone, mobile, role, regDate, accStatus, lastLogin', 'safe'),
			//array('password','password'),
			//array('email','filter','strtolower'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
			array('email, password, fName, mName, lName, institution, area, phone, mobile, role, regDate, accStatus, lastLogin', 'safe', 'on'=>'search'),
			array('email, password, fName, mName, lName, institution, area, phone, mobile, role, regDate, accStatus, lastLogin', 'safe', 'on'=>'getNewUsers'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email' => 'Email',
			'password' => 'Password',
			'verifyPassword' => 'Verify Password',
			'fName' => 'First Name',
			'mName' => 'Middle Name',
			'lName' => 'Last Name',
			'institution' => 'Institution',
			'area' => 'Area',
			'phone' => 'Phone Number',
			'mobile' => 'Mobile Number',
			'role' => 'Role',
			'regDate' => 'Register Date',
			'accStatus' => 'Account Status',
			'lastLogin' => 'Last Login',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fName',$this->fName,true);
		$criteria->compare('mName',$this->mName,true);
		$criteria->compare('lName',$this->lName,true);
		$criteria->compare('institution',$this->institution,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('regDate',$this->regDate,true);
		$criteria->compare('accStatus',$this->accStatus);
		$criteria->compare('lastLogin',$this->lastLogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/*
	 * Retrieve list of Users where account Status is 0
	 * @author tandhy
	 */
	public function getNewUsers()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('accStatus','0', true);
		$criteria->compare('role','user',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/*
	 * Retrieve list of Users where account Status is 0
	 * @author tandhy
	 */
	public function getDeactivateUsers()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('accStatus','2', true);
		$criteria->compare('role','user',true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/*
	 * Retrieve list of Approved Users only -> accStatus = 1
	 * @author tandhy
	 */
	public function getApprovedUsers()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('accStatus','1', true);
		$criteria->compare('role','user', true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Login the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->regDate = date("Y-m-d");
			$this->lastLogin = date("Y-m-d");
			$this->accStatus = 0;
			$this->role = "user";
			
			// hash password with md5
			$pass = md5($this->password);
			$this->password = $pass;
		}
		return true;
	}
	
	/*
	 * Function to send email notification to admin, notify a user registration
	 * @author tandhy
	 */
	public function sendRegistrationNotificationToAdmin()
	{		
		$contentMsg = "
			There is a User registration with the following information :<br>
			Email       : ".$this->email."<br>
			First Name	: ".$this->fName."<br>
			Middle Name : ".$this->mName."<br>
			Last Name   : ".$this->lName."<br>
			Institution : ".$this->institution."<br>
			Area of Interest : ".$this->area."<br><br>
			
			Please take a moment to approve.<br><br>
			
			------<br>
			This email is auto-generated when a user register in the web.
			
		";
		$message = new YiiMailMessage;
		$message->setBody($contentMsg, 'text/html');
		$message->subject = 'New User Registration';
		$message->addTo(Yii::app()->params['adminEmail']);
		$message->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($message);
	}
	
	/*
	 * Function to send email notification to admin, after save model return true
	 * @author tandhy
	 */
	public function afterSave()
	{
		if($this->isNewRecord) $this->sendRegistrationNotificationToAdmin();
		return true;
	}
	
	/*
	 * Function to send email notification to user, after admin approve the user
	 * @author tandhy
	 */
	public function sendApprovalNotificationToUser($userRegistered)
	{
		$contentMsg = "
			Hi ".$userRegistered->fName.", thank you for register in Mobile Security Lab Research, Boston University Metropolitan College. Your request<br>
			has been approved by Administrator and you may log in with using the following information :<br>
			Email       : ".$userRegistered->email."<br>
			<br>
			Please make sure that you keep your password safe.<br>
			<br>
			If you have any question, please do not hesitate to contact our Administrator.<br>
			<br>
			Thank you,<br>
			Mobile Security Lab Administrator<br>
			Department of Computer Science<br>
			Boston University Metropolitan College<br>
			<br>
			<br>
			<br>
			------<br>
			This email is auto-generated, please do not reply to this email.<br>
			
		";
		$message = new YiiMailMessage;
		$message->setBody($contentMsg, 'text/html');
		$message->subject = 'Your Registration to Mobile Security Lab of BU has been approved.';
		$message->addTo($userRegistered->email);
		$message->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($message);
		return true;
	}	
	
	/*
	 * Function to send email notification to user, after admin approve the user
	 * @author tandhy
	 */
	public function getNewUserNumber()
	{		
		$criteria = new CDbCriteria;
		
		$criteria->select = 'email';
		$criteria->condition = 'accStatus = 0';
		$arrResult = Login::model()->count($criteria);
		
		return $arrResult;
	}	
	
	/**
	 * Get First Name and Last Name from Login by email
	 * author : tandhy
	 * date : 11.09.2013
	 */
	public function getFNameLNameByEmail($emailId)
	{
		$criteria = new CDbCriteria;
		
		$criteria->select = "fName,lName";
		$criteria->condition = "email = :emailId";
		$criteria->params = array(':emailId' => $emailId);
		$arrResult = Login::model()->find($criteria);
		if(empty($arrResult['lName']))
			return $arrResult['fName'];
		else
			return $arrResult['lName'].", ".$arrResult['fName'];
			
	}
}
