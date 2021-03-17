<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="S.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <button onclick="window.location.href='index.php';" class="home" id="h">Home</button>
        <button onclick="window.location.href='About.html';" class="about">About</button>
        <button class="help">Help</button>
        <button class="login" onclick="window.location.href='LogIn.php';" class="log">Login</button>

    </div>
    <div class="collection">
        <div class="card">
            <h1 class="title">Create Account</h1>
            <form class="form" method="post" action="includes/SignUp.inc.php" id="signin">
                <div class="in">
                    <input class="inputgroup" height="30rem" size="90" type="text" name="email" required id="email" autofocus placeholder="Email Address">
                </div>
                <div class="in">
                    <input class="inputgroup" maxlength="10" size="90" type="text" required name="name" id="name" autofocus placeholder="Username">
                </div>
                <div class="in">
                    <input class="inputgroup" size="90" type="password" required name="password" id="password" autofocus placeholder="Password">
                </div>
                <div class="in">
                    <input class="inputgroup" size="90" required type="password" name="passwordrepeat" id="password" autofocus placeholder="Confirm password">
                </div>
                
                <button class="formbutton" name="submit" type="submit">Continue</button>
                
            </form>
            <p class="form__text">
                <a class="form__link"  href="LogIn.php" id="log">Already have an account? Sign in</a>
            </p>
            
        </div>
        
    </div>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="Passwordsdontmatch"){
                echo "<p>Please make sure both passwords match.</p>";
            }else if($_GET["error"]=="Usernametaken"){
                echo "<p>This username is taken, try another one.</p>";
            }
        }
    ?>
</body>
</html>