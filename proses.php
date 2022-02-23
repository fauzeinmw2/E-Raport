<?php
    session_start();
    include "koneksi.php";
    $nama=addslashes($_POST['nama']);

    if($_SESSION['status'] == 'admin'){
        // GURU
        if($_GET['act'] == "simpanGuru"){
            $sql = $eraport->prepare("INSERT INTO guru(nik, nama_guru, status)
                VALUES('$_POST[nik]', '$_POST[nama_guru]', 'nonaktif')");
            $sql->execute();

            $pass = md5('guru');

            $akun = $eraport->prepare("INSERT INTO user(username, password, pass, aktif, akses)
                VALUES('$_POST[nik]', 'guru', '$pass', '', '2')");
            $akun->execute();

            header("location:index.php?page=guru");
        }

        if($_GET['act'] == "editGuru"){
            $sql = $eraport->prepare("UPDATE guru SET
                nik='$_POST[nik]', nama_guru='$_POST[nama_guru]' WHERE nik='$_POST[nik_old]'");
            $sql->execute();

            $uakun = $eraport->prepare("UPDATE user SET
                username='$_POST[nik]' WHERE username='$_POST[nik_old]'");
            $uakun->execute();

            header("location:index.php?page=guru");
        }

        if($_GET['act'] == "hapusGuru"){
            $sql = $eraport->prepare("DELETE FROM guru WHERE nik='$_GET[nik]'");
            $sql->execute();

            $delakun = $eraport->prepare("DELETE FROM user WHERE username='$_GET[nik]'");
            $delakun->execute();
            header("location:index.php?page=guru");
        }
        // ====================================

        // SISWA
        if($_GET['act'] == "simpanSiswa"){
            $sql = $eraport->prepare("INSERT INTO siswa(nis, nama_siswa, id_jurusan, status)
                VALUES('$_POST[nis]', '$_POST[nama_siswa]', '$_POST[id_jurusan]', 'nonaktif')");
            $sql->execute();

            $pass = md5('siswa');

            $akun = $eraport->prepare("INSERT INTO user(username, password, pass, aktif, akses)
                VALUES('$_POST[nis]', 'siswa', '$pass', '', '3')");
            $akun->execute();

            header("location:index.php?page=siswa&id=$_POST[id_jurusan]");
        }

        if($_GET['act'] == "editSiswa"){
            $sql = $eraport->prepare("UPDATE siswa SET 
                nis='$_POST[nis]', nama_siswa='$_POST[nama_siswa]', id_jurusan='$_POST[id_jurusan]' WHERE nis='$_POST[nis_old]'");
            $sql->execute();

            $uakun = $eraport->prepare("UPDATE user SET
                username='$_POST[nis]' WHERE username='$_POST[nis_old]'");
            $uakun->execute();

            header("location:index.php?page=siswa&id=$_POST[id_jurusan]");
        }

        if($_GET['act'] == "hapusSiswa"){
            $sql = $eraport->prepare("DELETE FROM siswa WHERE nis='$_GET[nis]'");
            $sql->execute();

            $delakun = $eraport->prepare("DELETE FROM user WHERE username='$_GET[nis]'");
            $delakun->execute();
            header("location:index.php?page=siswa&id=$_GET[id]");
        }

        
        // MAPEL
        if($_GET['act'] == "simpanMapel"){
            $sql = $eraport->prepare("INSERT INTO mapel(nama_mapel, singkatan, a, b, c, d, e, f, id_jurusan, kelompok)
                VALUES('$_POST[nama_mapel]', '$_POST[singkatan]', '$_POST[a]', '$_POST[b]', '$_POST[c]', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[id_jurusan]', '$_POST[kelompok]')");
            $sql->execute();
            header("location:index.php?page=mapel&id=$_POST[id_jurusan]");
        }

        if($_GET['act'] == "editMapel"){
            $sql = $eraport->prepare("UPDATE mapel SET 
                nama_mapel='$_POST[nama_mapel]', 
                singkatan='$_POST[singkatan]', 
                a='$_POST[a]', b='$_POST[b]', c='$_POST[c]', d='$_POST[d]', e='$_POST[e]', f='$_POST[f]', 
                id_jurusan='$_POST[id_jurusan]',
                kelompok='$_POST[kelompok]' WHERE id_mapel='$_POST[id_mapel]'");
            $sql->execute();
            header("location:index.php?page=mapel&id=$_POST[id_jurusan]");
        }

        if($_GET['act'] == "hapusMapel"){
            $sql = $eraport->prepare("DELETE FROM mapel WHERE id_mapel='$_GET[id_mapel]'");
            $sql->execute();
            header("location:index.php?page=mapel&id=$_GET[id]");
        }

        // JURUSAN
        if($_GET['act'] == "simpanJurusan"){
            $sql = $eraport->prepare("INSERT INTO jurusan(nama_jurusan) VALUES('$_POST[nama_jurusan]')");
            $sql->execute();
            header("location:index.php?page=jurusan");
        }

        if($_GET['act'] == "editJurusan"){
            $sql = $eraport->prepare("UPDATE jurusan SET nama_jurusan='$_POST[nama_jurusan]' WHERE id_jurusan='$_POST[id_jurusan]'");
            $sql->execute();
            header("location:index.php?page=jurusan");
        }

        if($_GET['act'] == "hapusJurusan"){
            $sql = $eraport->prepare("DELETE FROM jurusan WHERE id_jurusan='$_GET[id]'");
            $sql->execute();
            header("location:index.php?page=jurusan");
        }

        // KELAS
        if($_GET['act'] == "simpanKelas"){
            $sql = $eraport->prepare("INSERT INTO kelas(nama_kelas, id_jurusan, tingkat) VALUES('$_POST[nama_kelas]', '$_POST[jurusan]', '$_POST[tingkat]')");
            $sql->execute();
            header("location:index.php?page=kelas");
        }

        if($_GET['act'] == "editKelas"){
            $sql = $eraport->prepare("UPDATE kelas SET nama_kelas='$_POST[nama_kelas]', id_jurusan='$_POST[jurusan]', tingkat='$_POST[tingkat]' WHERE id_kelas='$_POST[id_kelas]'");
            $sql->execute();
            header("location:index.php?page=kelas");
        }

        if($_GET['act'] == "hapusKelas"){
            $sql = $eraport->prepare("DELETE FROM kelas WHERE id_kelas='$_GET[id]'");
            $sql->execute();
            header("location:index.php?page=kelas");
        }

        // TAPEL
        if($_GET['act'] == "simpanTapel"){
            $sql = $eraport->prepare("INSERT INTO tapel(tapel) VALUES('$_POST[tapel]')");
            $sql->execute();
            header("location:index.php?page=tapel");
        }

        if($_GET['act'] == "editTapel"){
            $sql = $eraport->prepare("UPDATE tapel SET tapel='$_POST[tapel]' WHERE id_tapel='$_POST[id_tapel]'");
            $sql->execute();
            header("location:index.php?page=tapel");
        }

        if($_GET['act'] == "hapusTapel"){
            $sql = $eraport->prepare("DELETE FROM tapel WHERE id_tapel='$_GET[id]'");
            $sql->execute();
            header("location:index.php?page=tapel");
        }

        // SEMESTER
        if($_GET['act'] == "simpanSemester"){
            $sql = $eraport->prepare("INSERT INTO semester(semester, kode_semester, jenis) VALUES('$_POST[semester]', '$_POST[kode_semester]', '$_POST[jenis]')");
            $sql->execute();
            header("location:index.php?page=semester");
        }

        if($_GET['act'] == "editSemester"){
            $sql = $eraport->prepare("UPDATE semester SET semester='$_POST[semester]', kode_semester='$_POST[kode_semester]', jenis='$_POST[jenis]' WHERE id_semester='$_POST[id_semester]'");
            $sql->execute();
            header("location:index.php?page=semester");
        }

        if($_GET['act'] == "hapusSemester"){
            $sql = $eraport->prepare("DELETE FROM semester WHERE id_semester='$_GET[id]'");
            $sql->execute();
            header("location:index.php?page=semester");
        }

        // ROMBEl
        if($_GET['act'] == "simpanRombel"){
            $sql = $eraport->prepare("INSERT INTO rombel(id_kelas, tapel, semester, guru_kelas, guru_bk) VALUES('$_POST[kelas]', '$_POST[tapel]', '$_POST[semester]', '$_POST[guru_kelas]', '$_POST[guru_bk]')");
            $sql->execute();
            header("location:index.php?page=datarombel&tapel=$_POST[tapel]&semester=$_POST[semester]");
        }

        if($_GET['act'] == "editRombel"){
            $sql = $eraport->prepare("UPDATE rombel SET id_kelas='$_POST[kelas]', guru_kelas='$_POST[guru_kelas]', guru_bk='$_POST[guru_bk]' WHERE id_rombel='$_POST[id_rombel]'");
            $sql->execute();
            header("location:index.php?page=datarombel&tapel=$_POST[tapel]&semester=$_POST[semester]");
        }

        if($_GET['act'] == "hapusRombel"){
            $sql = $eraport->prepare("DELETE FROM rombel WHERE id_rombel='$_GET[id]'");
            $sql->execute();
            header("location:index.php?page=datarombel&tapel=$_GET[tapel]&semester=$_GET[semester]");
        }

        // GURU MAPEL
        if($_GET['act'] == "kelolaGuruMapel"){
            $rombel = $_POST['rombel'];
            $guru = $_POST['guru'];
            $mapel = $_POST['mapel'];
            $jmlMapel = count($mapel);
              
            $delete = $eraport->prepare("DELETE FROM guru_mapel WHERE id_rombel='$rombel'");
            $delete->execute();
            
            for($i=0; $i<$jmlMapel; $i++){
                $sql = $eraport->prepare("INSERT INTO guru_mapel(nik, id_mapel, id_rombel) VALUES('$guru[$i]', '$mapel[$i]', '$rombel')");
                $sql->execute(); 
            }
            
            header("location:index.php?page=datarombel&tapel=$_POST[tapel]&semester=$_POST[semester]");
        }

        // SISWA ROMBEL
        if($_GET['act'] == "kelolaSiswaRombel"){
            $rombel = $_POST['rombel'];
            $pilih = $_POST['pilih'];
            $pilih1 = $_POST['pilih1'];
            $jmlpilih = count($pilih);
            $jmlpilih1 = count($pilih1);
              
            $delete = $eraport->prepare("DELETE FROM siswa_rombel WHERE id_rombel='$rombel'");
            $delete->execute();
            
            for($i=0; $i<$jmlpilih; $i++){
                $sql = $eraport->prepare("INSERT INTO siswa_rombel(nis, id_rombel) VALUES('$pilih[$i]', '$rombel')");
                $sql->execute(); 
            }
            
            for($i=0; $i<$jmlpilih1; $i++){
                $sql = $eraport->prepare("INSERT INTO siswa_rombel(nis, id_rombel) VALUES('$pilih1[$i]', '$rombel')");
                $sql->execute(); 
            }
            
            header("location:index.php?page=datarombel&tapel=$_POST[tapel]&semester=$_POST[semester]");
        }    

    }else if($_SESSION['status'] == 'guru'){
        // NILAI
        if($_GET['act'] == "kelolanilai"){
            $rombel = $_POST['rombel'];
            $mapel = $_POST['mapel'];
            $siswa = $_POST['siswa'];
            $nilai = $_POST['nilai'];
            $jmlsiswa = count($siswa);
              
            $delete = $eraport->prepare("DELETE FROM nilai WHERE id_rombel='$rombel' AND id_mapel='$mapel'");
            $delete->execute();
            
            for($i=0; $i<$jmlsiswa; $i++){
                $sql = $eraport->prepare("INSERT INTO nilai(id_rombel, id_mapel, nis, nilai) VALUES('$rombel', '$mapel', '$siswa[$i]', '$nilai[$i]')");
                $sql->execute(); 
            }
            
            header("location:index.php?page=datanilai&tapel=$_POST[tapel]&semester=$_POST[semester]");
        }

        if($_GET['act'] == "editNilai"){
            $id_nilai = $_POST['id_nilai'];
            $siswa = $_POST['siswa'];
            $nilai = $_POST['nilai'];
            $mapel = $_POST['mapel'];
            $jmlSiswa = count($siswa);

            for($i=0; $i<$jmlSiswa; $i++){
                $sql = $eraport->prepare("UPDATE nilai SET nilai='$nilai[$i]' WHERE id_nilai='$id_nilai[$i]'");
                $sql->execute();
            }

            header("location:index.php?page=nilai");
        }

    }else{
        header("location:login.php");
    }

    
?>