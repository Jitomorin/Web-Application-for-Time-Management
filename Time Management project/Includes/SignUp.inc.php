<?php
    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $passwordrepeat=$_POST["passwordrepeat"];

        require_once 'DBH.inc.php';
        require_once 'functons.inc.php';

        if(emptyInputSignup($name, $email, $password, $passwordrepeat)!==false){
            header("location: ../SignUp.php?error=emptyinput");
            exit();
        }
        if(invalidUserName($name)!==false){
            header("location: ../SignUp.php?error=Invalidusername");
            exit();
        }
        if(invalidEmail($email)!==false){
            header("location: ../SignUp.php?error=invalidemail");
            exit();
        }
        if(passwordMatch($password, $passwordrepeat)!==false){
            header("location: ../SignUp.php?error=Passwordsdontmatch");
            exit();
        }
        if(usernameExists($conn, $name, $email)!==false){
            header("location: ../SignUp.php?error=Usernametaken");
            exit();
        }
        //make password length and username length error check

        createUser($conn, $name, $email, $password);
    }else{
        header("location: ../SignUp.php");
        exit();
    }