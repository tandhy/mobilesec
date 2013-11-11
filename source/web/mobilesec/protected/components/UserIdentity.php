<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_USER_NOT_APPROVED = 12; // define any number
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function authenticate()
	{
        $userAcc=Login::model()->findByAttributes(array(
			'email'=>$this->username,
		));
		
		Yii::log("authenticate started",'vardump','UserIdentity');
		
		if(!$userAcc)
		{
            $this->errorCode=self::ERROR_USERNAME_INVALID;
			Yii::log("ERROR_USERNAME_INVALID",'vardump','UserIdentity');
		}
        else if( $userAcc->password !== md5($this->password))
//        else if( $userAcc->password !== md5($this->password,$userAcc->password))
		{
           $this->errorCode=self::ERROR_PASSWORD_INVALID;
			Yii::log("ERROR_PASSWORD_INVALID",'vardump','UserIdentity');
		}
        else
        {
			// check accStatus, only accStatus = 1 is allowed to proceed to login,
			// otherwise, send message "not approved yet"
			//Yii::log($userAcc->email.' status : '.$userAcc->accStatus,'vardump','UserIdentity');
			//Yii::log($userAcc->role.' role : '.$userAcc->role,'vardump','UserIdentity');
			if($userAcc->accStatus==0)
			{
				$this->errorCode = self::ERROR_USER_NOT_APPROVED;
				$this->errorMessage='Sorry, but your is not approved yet. Please contact Administrator.';
				Yii::log('User not approved yet', 'vardump', 'UserIdentity');
			}
			else
			{
				// user has been approved
				$this->errorCode=self::ERROR_NONE;
				$this->setState('roles', $userAcc->role);
				Yii::log('login success', 'vardump', 'UserIdentity');
			}
        }
        return !$this->errorCode;
    }

}