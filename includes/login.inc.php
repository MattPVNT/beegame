<?php
if(isset($_POST["submit"])){

    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];

    require_once '../function.php';
    require_once 'dbh.inc.php';

    if(emptyInputLogin($username,$pwd)!== false){
        header("Location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn,$username,$pwd);
}
else{
    header("Location: ../index.php");
    exit();
}