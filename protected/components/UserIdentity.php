<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = CompanyUser::model()->findByAttributes(array(
            'email' => $this->username
        ));
        if (!$user)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->verify($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode = self::ERROR_NONE;
            $this->username =  $user->email;
            Yii::app()->user->setState('id', $user->company_user_id);
            Yii::app()->user->setState('companyId', $user->company_id);
        }
        return !$this->errorCode;
    }

}