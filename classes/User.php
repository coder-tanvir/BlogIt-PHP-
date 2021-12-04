<?php
/**
 * User for user classs
 * authenticate for authenticating user
 */
class User{
    /**
     * @param integer id
     * @param string username
     * @param string password
     */
    public $id;
    public $username;
    public $password;
    /**
     * @$username string
     * @$password string
     */
    public static function authenticate($conn,$username,$password){
        $sql="SELECT * FROM user WHERE username= :username";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(':username',$username,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'User');
        $stmt->execute();

        $user=$stmt->fetch();
        if($user){
            if($user->password==$password){
            return true;
            }
        }
    }
}