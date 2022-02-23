<?php 

session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

// include "koneksi.php"; 
$login = $eraport->prepare("SELECT * FROM user WHERE username='$username' AND password='$password'");
$login->execute();

$guru = $eraport->prepare("SELECT * FROM guru WHERE nik='$username'");
$guru->execute();
$datag = $guru->fetch();

$siswa = $eraport->prepare("SELECT * FROM siswa WHERE nis='$username'");
$siswa->execute();
$datas = $siswa->fetch();

$admin = $eraport->prepare("SELECT * FROM admin WHERE username='$username'");
$admin->execute();
$dataa = $admin->fetch();

// cek apakah username dan password di temukan pada database
if($login->rowCount() > 0){

    $data = $login->fetch();
 
    if($data['akses'] == "2"){
        // $_SESSION['nik'] = $username;
        $_SESSION['status'] = "guru";
        $_SESSION['nama'] = $datag['nama_guru'];
        $_SESSION['nik'] = $datag['nik'];
        // alihkan ke halaman dashboard admin
        echo '
            <script>
                alert("Login Berhasil !!!");;
                window.location.href="index.php"
            </script>
        ';
    
    }else if($data['akses'] == "1"){
        // $_SESSION['nik'] = $nik;
        $_SESSION['status'] = "admin";
        $_SESSION['nama'] = $dataa['nama_admin'];
        // alihkan ke halaman dashboard admin
        echo '
            <script>
                alert("Login Berhasil !!!");;
                window.location.href="index.php"
            </script>
        ';

    }else if($data['akses'] == "3"){
        $_SESSION['nis'] = $datas['nis'];
        $_SESSION['status'] = "siswa";
        $_SESSION['nama'] = $datas['nama_siswa'];
        // alihkan ke halaman dashboard admin
        echo '
            <script>
                alert("Login Berhasil !!!");;
                window.location.href="index.php"
            </script>
        ';
    }
    

}else{
    echo '<script>alert("Login Gagal !!!");;
        window.location.href="login.php"</script>';
}
 
?>