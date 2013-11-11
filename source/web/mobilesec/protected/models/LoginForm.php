<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	//public function authenticate($attribute,$params)
	public function authenticate()
	{

		
		Yii::log("authenticate function start | ".$this->username." / ".$this->password, 'vardump', 'LoginForm');
		if(!$this->hasErrors())
		{
			//Yii::log("authenticate function no error", 'vardump', 'LoginForm');
			
			
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
			{
				if($this->_identity->errorCode==12) // means not approved yet
				{
					$this->addError('not Approved','Account not approved.');
					Yii::app()->user->setFlash('validationError', "Sorry, but your account is not approved yet. Please contact Administrator.");
				}
				else
				{
					$this->addError('password','Incorrect username or password.');
					Yii::app()->user->setFlash('validationError', "Incorrect username or password.");
				}
			}
			Yii::log("this->_identity->errorCode = ".$this->_identity->errorCode, 'vardump', 'LoginForm');
		}		
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		//Yii::log("login function start | ".$this->username." / ".$this->password, 'vardump', 'LoginForm');
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
			//Yii::log("_identity is null | ".$this->username." / ".$this->password, 'vardump', 'LoginForm');
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			//Yii::log("no error | ".$this->username." / ".$this->password, 'vardump', 'LoginForm');
			return true;
		}
		else
			return false;
	}
<<<<<<< HEAD

=======
>>>>>>> iter1
	
}
