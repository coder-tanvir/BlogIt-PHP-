<?php

//Returns boolean if the user is logged in or not.
function isLoggedin(){
    if( isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']){
        return true;
    }else{
        return false;
    }
}