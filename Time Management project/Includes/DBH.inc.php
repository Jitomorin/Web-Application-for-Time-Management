<?php
    $serverName="localhost";
    $databaseName="credentials";
    $databasePassword="";
    $databaseUserName="root";

    //the mysqli_connect function returns bool
    $conn=mysqli_connect($serverName, $databaseUserName, $databasePassword, $databaseName);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }