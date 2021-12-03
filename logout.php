<?php

//Starts the session
session_start();

$_SESSION=array();

//Completly destro the session with data

if(ini_get("session.use_cookies")){
    $params=session_get_cookie_params();
    setcookie(session_name(), '', time()-42000,
    $params["path"],$params["domain"],
    $params["secure"],$params["httponly"]
    );
}

//Destroys the session
session_destroy();

header("Location:index.php");