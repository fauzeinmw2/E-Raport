<?php 
    $nis = isset($_GET['nis'])?$_GET['nis']:""; 
    $status = isset($_GET['status'])?$_GET['status']:"";
    include "../../koneksi.php"; 
    $no=0;
    $sql = $eraport->prepare("UPDATE siswa SET 
        status='$status' WHERE nis='$nis'");
    $sql->execute();
?>