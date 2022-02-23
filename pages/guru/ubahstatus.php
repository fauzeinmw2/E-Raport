<?php 
    $nik = isset($_GET['nik'])?$_GET['nik']:""; 
    $status = isset($_GET['status'])?$_GET['status']:"";
    include "../../koneksi.php"; 
    $no=0;
    $sql = $eraport->prepare("UPDATE guru SET 
        status='$status' WHERE nik='$nik'");
    $sql->execute();
?>