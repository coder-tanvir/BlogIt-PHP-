<?php

class Auth{
    /**
     * @return true if the user is logged in
     */
    public static function isLoggedIn(){
        if( isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){
            return true;
        }else{
            return false;
        }
    }
}