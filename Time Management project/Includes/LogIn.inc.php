<?php
if(isset($_POST["submit"])){

    $username=$_POST["Username/Email"];
    $password=$_POST["Password"];


    require_once 'DBH.inc.php';
    require_once 'functons.inc.php';


    UserLogin($conn, $username, $password);

}else{
    header("location: ../LogIn.php");
        exit();
}