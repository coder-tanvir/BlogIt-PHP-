<?php
/**
 * @Article is the class that returns all the articles by PDO method
 */




class Article
{    public $id;
     public $title;
     public $content;
     public $published_at; 
    public $image_file;


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

        /**
         * Pagination
         * 
         */

         public static function getpage($conn,$limit,$offset){

            $sql="SELECT * 
                 FROM article 
                 ORDER BY published_at
                 LIMIT :limit
                 OFFSET :offset";
                 
            $stmt=$conn->prepare($sql);
            
            $stmt->bindValue(':limit',$limit,PDO::PARAM_INT);
            $stmt->bindValue(':offset',$offset,PDO::PARAM_INT);

            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
         }

         /**
          * @return total number of records
          */

         public static function getTotal($conn){
             return $conn->query('SELECT COUNT(*) FROM article')->fetchColumn();
         }

         /**
          * @param object $conn Connection to the database
          *@param String $filename the filename of the image file
          *@return boolean true if it was successfull, false otherwise
          */

         public function setImageFile($conn,$filename){
             $sql="UPDATE article
                    SET image_file= :image_file
                    WHERE id = :id";
                $stmt=$conn->prepare($sql);
                $stmt->bindValue(':id',$this->id,PDO::PARAM_INT);
                $stmt->bindValue(':image_file',$filename,PDO::PARAM_STR);

                return $stmt->execute();
         }

}