<?php
    require "includes/init.php";
?>
<!doctype html>
<html>
<head>
    <title>My blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
    <header>
        <h1>My blog</h1>
    </header>
    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <?php if(Auth::isLoggedIn()): ?>
               <li class="nav-item"><a class="nav-link" href="logout.php"> Logout</a></li>
               <li class="nav-item"><a class="nav-link" href="new-article.php">Create Article</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php"> Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main>