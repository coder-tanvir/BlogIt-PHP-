<?php
require "includes/init.php";

session_start();

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $db=new Database();
        $conn=$db->getConn();
        if(User::authenticate($conn,$_POST['username'],$_POST['password'])){
            session_regenerate_id(true);
            $_SESSION['is_logged_in']=true;
            header("Location:index.php");
            exit;
        }else{
            $error='Login incorrect';
        }
    }
?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if(!empty($error)): ?>
    <p><?=$error; ?>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label for="username">Username</label>
        <input class="form-control" name="username" id="username">
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input class="form-control" name="password" type="password" id="password">
    </div>
    <button class="btn btn-primary">Log in</button>

</form>

<?php require "includes/footer.php"; ?>
