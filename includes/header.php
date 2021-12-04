<?php
    require "includes/init.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>My blog</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <?php if(Auth::isLoggedIn()): ?>
               <li><a href="logout.php">Logout</a></li>
               <li><a href="new-article.php">Create Article</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main>