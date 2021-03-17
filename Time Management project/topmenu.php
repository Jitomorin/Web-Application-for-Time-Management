<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="page"></div>
    <div class="main">
        <div class="menu">
            <button onclick="window.location.href='index.php';" id="ac" class="home" id="h">Home</button>
            <button onclick="window.location.href='About.html';" class="about">About</button>
            <button class="help">Help</button>
            <?php
                /* if(isset($_SESSION['usersName'])){
                    //if userName exists then the user s loged in
                    echo "";
                } */
            ?>
            <button class="login" onclick="window.location.href='LogIn.php';" class="log">Login</button>

        </div>