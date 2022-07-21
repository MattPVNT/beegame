<?php

$Servername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="beegame";

$conn=mysqli_connect($Servername,$dbUsername,$dbPassword,$dbName);
if(!$conn){
    die("Connessione fallita: ".mysqli_connect_error());
}