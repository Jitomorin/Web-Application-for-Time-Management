<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="L.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <button onclick="window.location.href='index.php';" class="home" id="h">Home</button>
        <button onclick="window.location.href='About.html';" class="about">About</button>
        <button class="help">Help</button>
        <button class="login" id="ac" onclick="window.location.href='LogIn.html';" class="log">Login</button>

    </div>
    <div class="collection">
        <div class="card">
            <h1 class="title">Sign in To Account</h1>
            <form class="f" method="post" action="includes/LogIn.inc.php" id="login">
                <div class="inputgroup">
                    <input class="in" size="90" type="text" name="name" id="email" autofocus placeholder="Username/Email">
                </div>
                <div class="inputgroup">
                    <input class="in" size="90" type="password" name="password" id="password" autofocus placeholder="Password">
               </div>
               <button class="formbutton" type="submit">Log in</button>
               
           </form>
            <p class="form__text">
                <a class="form__link" href="SignUp.php" id="create">Don't have an account? Sign up</a>
            </p>
               
            <p class="form__text">
            <a class="form__link" href="#" id="create">Forgotten your password?</a>
        </p>
                
        </div>
    </div>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="wrongcredentials"){
                echo "<p>Username or password incorrect</p>";
            }else if($_GET["error"]=="usernoexist"){
                echo "<p>This username does not exist</p>";
            }
        }
    ?>
    
</body>
</html>