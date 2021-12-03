<?php

session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if($_POST['username']=='tanvir' && $_POST['password']=='secret'){
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
    <div>
        <label for="username">Username</label>
        <input name="username" id="username">
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" type="password" id="password">
    </div>
    <button>Log in</button>

</form>

<?php require "includes/footer.php"; ?>
