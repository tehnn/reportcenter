<?php

class UserIdentity extends CUserIdentity {

    const ERROR_USER_NOTAUTH = -1;

    private $_id;

    public function authenticate() {

        $username = strtolower($this->username);
        $user = User::model()->find('LOWER(username)=?', array($username));

        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->password !== $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else if ($user->role === '') {
            $this->errorCode = self::ERROR_USER_NOTAUTH;
        } else {

            $this->_id = $user->username;
            $this->username = $user->username;
            $this->setState('role', $user->role);
            $this->setState('fullname', $user->fullname);


            $this->errorCode = self::ERROR_NONE;

            //Update lastvisit
            $u = User::model()->findByPK($this->_id);
            $count = $u->countlogin;
            $date = date("Y-m-d H:i:s");
            User::model()->updateByPk(array($this->_id), array('lastlogin' => $date));
            User::model()->updateByPk(array($this->_id), array('countlogin' => $count + 1));
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->_id;
    }

}