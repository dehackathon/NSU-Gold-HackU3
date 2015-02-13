<?php

namespace Application\Utility;

use Zend\Session\Container;

class Login
{
    public static function isLoggedIn()
    {
        $sessionUser = new Container('user');
        if ($sessionUser and $sessionUser->loggedIn) {
            return true;
        }
        return false;
    }
}
 