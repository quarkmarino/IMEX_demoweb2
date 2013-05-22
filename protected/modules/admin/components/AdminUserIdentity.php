<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminUserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user based on {@link username} and {@link password}.
	 * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = AdminUser::model()->findByPk(strtolower($this->username));
        /** @var AdminUser $user */
        if (isset($user)) {
            if (sha1($user->salt . $this->password) == $user->password) {
                $states = $this->getPersistentStates();
                $states['fullName'] = $user->name;
                $this->setPersistentStates($states);
                $this->errorCode = self::ERROR_NONE;
            } else {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }
        } else {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        return !$this->errorCode;
    }

}