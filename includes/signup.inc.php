<?php
if( isset($_POST["submit"]) ){
    
    $name=$_POST["username"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdRepeat=$_POST["pwdRepeat"];
    
    require_once '../function.php';
    require_once 'dbh.inc.php';

    if(emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat)!== false){
        header("Location: ../index.php?error=emptyinput");
        exit();
    }

    if(invalidEmail($email)!==false){
        header("Location: ../index.php?error=invalidemail");
    }
    
    if(invalidUid($username)!==false){
        header("Location: ../index.php?error=invaliduid");
        exit();
    }

    if(pwdMatch($pwd,$pwdRepeat)!==false){
        header("Location: ../index.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn,$username,$email)!==false){
        header("Location: ../index.php?error=usernametaken");
        exit();
    }

    createUser($conn,$name,$email,$username,$pwd);
} 
else{
    header("Location: ../index.php.");
    exit();
}