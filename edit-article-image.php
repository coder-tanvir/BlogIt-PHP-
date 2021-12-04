<?php
//Restricts the size of the maximum amount of data 
//that can be sent to the server

require "includes/init.php";

//$conn=getDB();
$db=new Database();
$conn=$db->getConn();


if(isset($_GET['id'])){
    $article=Article::getByID($conn,$_GET['id']);

    if(! $article){
        die('Not found');
    }

    }
else{
     $article=null;
     die('Article Not Found');
}

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    try{
        if(empty($_FILES)){
            throw new Exception('Invalid Upload');
        }
        var_dump($_FILES);
        switch($_FILES['file']['error']){
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file uploaded');
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('File Exceeds 2MB');
                break;
            default:
                throw new Exception('An error occurred');   
        }
        if($_FILES['file']['size']>2000000){
            throw new Exception('File too large');
        }
        $mime_types=['image/gif','image/png','image/jpeg','image/jpg','image/JPG','image/PNG','image/GIF','image/JPEG'];

        if(! in_array($_FILES['file']['type'],$mime_types)){
            throw new Exception('Invalid file type');
        }
        $destination="uploads/" . $_FILES['file']['name'];
        if(move_uploaded_file($_FILES['file']['tmp_name'],$destination)){
            echo "upload successfull";
        }else{
            throw new Exception('unable to move uploaded file');
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }


    }

?>

<?php require 'includes/header.php'; ?>
<h2>Article Image </h2>
<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="file">Image File</label>
        <input type="file" name="file" id="file">
    </div>
    <button>Upload</button>
</form>

<?php require 'includes/footer.php';?>

