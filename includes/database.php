<?php
$db_host="localhost";
$db_name="cms";
$db_user="cms_world";
$db_password="tangolango";

$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit;
}

echo "Connected Successfully";