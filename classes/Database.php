<?php
/**
 * Database connection for class
 */
class Database
/**
 * @return PDO object connection to the database server.
 */
{
    public function getConn(){
        $db_host="localhost";
        $db_name="cms";
        $db_user="cms_world";
        $db_password="tangolango";

        $dsn='mysql:host=' . $db_host . ';dbname='. $db_name . ';charset=utf8';
        try{
            $db=new PDO($dsn,$db_user,$db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;
        }catch(PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }
}