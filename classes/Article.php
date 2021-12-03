<?php
/**
 * @Article is the class that returns all the articles by PDO method
 */




class Article
{    public $id;
     public $title;
     public $content;
     public $published_at; 



    public static function getAll($conn)
    {
        $sql="SELECT * from article ORDER BY published_at;";

        $results=$conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }


    //Function is used for getting individual articles
    ////i means the integer ID value.
    ///Returns a associative array of value
    /** 
    *@param $columns is the optional list of columns, that user can sepcify
    *@return object of this class
    */
    public static function getByID($conn,$id,$columns='*'){
        $sql="SELECT $columns from article WHERE id= :id";
        $stmt=$conn->prepare($sql);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        // mysqli_stmt_bind_param($stmt,"i",$id);
            $stmt->setFetchMode(PDO::FETCH_CLASS,'Article');

        // if(mysqli_stmt_execute($stmt)){
            if($stmt->execute()){
            // $result=mysqli_stmt_get_result($stmt);
                //return mysqli_fetch_array($result,MYSQLI_ASSOC);

                return $stmt->fetch();
            }
    }

}