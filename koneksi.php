<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pwpb_eraport";

    try{
        $eraport = new PDO("mysql:host={$host}; dbname={$dbname}",
        $username, $password);
        $eraport->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $exception){
        die("Connection error : " . $exception->getMessage());
    }
?>