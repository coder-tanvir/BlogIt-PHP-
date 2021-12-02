
<?php
//Function is used for getting individual articles
////i means the integer ID value.
///Returns a associative array of value
function get_Article($conn,$id){
    $sql="SELECT * from article WHERE id=?";
    $stmt=mysqli_prepare($conn,$sql);

    if($stmt===false){
        echo mysqli_error($conn);
    }else{
        mysqli_stmt_bind_param($stmt,"i",$id);

        if(mysqli_stmt_execute($stmt)){
            $result=mysqli_stmt_get_result($stmt);

            return mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
    }

}