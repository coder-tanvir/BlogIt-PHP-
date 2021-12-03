
<?php
//Function is used for getting individual articles
////i means the integer ID value.
///Returns a associative array of value
/** 
*@param $columns is the optional list of columns, that user can sepcify
*/
function get_Article($conn,$id,$columns='*'){
    $sql="SELECT $columns from article WHERE id= :id";
    $stmt=$conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       // mysqli_stmt_bind_param($stmt,"i",$id);

       // if(mysqli_stmt_execute($stmt)){
           if($stmt->execute()){
           // $result=mysqli_stmt_get_result($stmt);
            //return mysqli_fetch_array($result,MYSQLI_ASSOC);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
}