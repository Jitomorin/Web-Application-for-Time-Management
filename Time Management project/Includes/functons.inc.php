<?php
    function emptyInputSignup($name, $email, $password, $passwordrepeat){
        $filled=true;
        
        if(empty($name)||empty($email)||empty($password)||empty($passwordrepeat)){
            $filled=true;
        }else{
            $filled=false;
        }
        return $filled;
    }

    function invalidUserName($name){
        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $filled=true;
        }else{
            $filled=false;
        }
        return $filled;
    }
    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $filled=true;
        }else{
            $filled=false;
        }
        return $filled;
    }
    function passwordMatch($password, $passwordrepeat){
        if($password!==$passwordrepeat){
            $filled=true;
        }else{
            $filled=false;
        }
        return $filled;
    }
    
    function usernameExists($conn, $name, $email){
        
        $sql="SELECT * FROM users WHERE usersName=? OR usersEmail=?;"; 
        $stmt=mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../SignUp.php?error=STMTfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        mysqli_stmt_execute($stmt);

        $resultsData=mysqli_stmt_get_result($stmt);

        if ($row=mysqli_fetch_assoc($resultsData)) {
            return $row;

        }else {
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
   

    function createUser($conn, $name, $email, $password){
        
        $sql="INSERT INTO users (usersName, usersEmail, usersPassword) VALUES (?, ?, ?);"; 
        $stmt=mysqli_stmt_init($conn);
        

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../SignUp.php?error=STMTfailed");
            exit();
        }

        $hashedPassword=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);
        $stmt->bind_param('sss',$name, $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../signup.php?error=none");
        exit();
    }
    
    function UserLogin($conn, $username, $password){
        $UserExists=usernameExists($conn, $username, $username);

        if($UserExists==false){
            header("location: ../SignUp.php?error=usernoexist");
            exit();

        }

        $PassHash=$UserExists["usersPassword"];
        $checkPass=password_verify($password,$PassHash);


        if($checkPass==false){
            header("location: ../SignUp.php?error=wrongcredentials");
            exit();
        }else if($checkPass==true){
            session_start();
            $_SESSION['usersId']=$UserExists["usersId"];
            $_SESSION['usersName']=$UserExists["usersName"];
            //once login successfull go back to home page>>
            header("location: ../index.php");
            exit();
        }
    }

    