<?php

class user {
    public $lastvisit_at;
    public $is_guest;
    public $login;
    public $roles;

    function __construct() {
        
        $this->lastvisit_at = (!empty($_SESSION['user']['lastvisit_at'])) ? $_SESSION['user']['lastvisit_at'] : null;
        $this->login = (!empty($_SESSION['user']['login'])) ? $_SESSION['user']['login'] : null;
        $this->is_guest = (isset($_SESSION['user']['is_guest']) && !$_SESSION['user']['is_guest']) ? $_SESSION['user']['is_guest'] : true;
        $this->roles = (!empty($_SESSION['user']['roles'])) ? $_SESSION['user']['roles'] : array();
    }

    public function authUser($login, $pass) {

        $db = new db;
        
        $pass = hash('sha512', hash('sha256', $pass));
        
        $user = $db->select("SELECT `lastvisit_at` FROM `users`
			WHERE `login` = '".$db->RealEscapeString($login)."' AND `pass` = '".$pass."';");
        
        if ($user) {
            
                $this->login = $login;
                $_SESSION['user']['login'] = $login;

                $this->lastvisit_at = $user[0]['lastvisit_at'];
                $_SESSION['user']['lastvisit_at'] = $user[0]['lastvisit_at'];

                $db->update("UPDATE `users` SET `lastvisit_at` = NOW() WHERE `login` = '".$login."';");

                $this->is_guest = false;
                $_SESSION['user']['is_guest'] = false;
                
                $this->roles = array(1);

                return true;
            
        }
        else
            return false;
    }

    public function unAuthUser() {
        $this->lastvisit_at = null;
        $this->login = null;
        $this->roles = array();
        $this->is_guest = true;
        unset($_SESSION['user']);
    }

}