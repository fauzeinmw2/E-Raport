<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($_SESSION['status'] == "admin"){
        switch ($page) {
            // guru
            case 'guru':
                include 'pages/guru/index.php';
            break;
            case 'tambah_guru':
                include 'pages/guru/create.php';
            break;
            case 'edit_guru':
                include 'pages/guru/edit.php';
            break;
            // =======================================
        
            // mapel
            case 'jurmapel':
                include 'pages/mapel/index.php';
            break;
            case 'mapel':
                include 'pages/mapel/mapel.php';
            break;
            case 'tambah_mapel':
                include 'pages/mapel/create.php';
            break;
            case 'edit_mapel':
                include 'pages/mapel/edit.php';
            break;
            // =======================================
        
            // siswa
            case 'jursiswa':
                include 'pages/siswa/index.php';
            break;
            case 'siswa':
                include 'pages/siswa/siswa.php';
            break;
            case 'tambah_siswa':
                include 'pages/siswa/create.php';
            break;
            case 'edit_siswa':
                include 'pages/siswa/edit.php';
            break;
            // =======================================
        
            // jurusan
            case 'jurusan':
                include 'pages/jurusan/index.php';
            break;
            case 'tambah_jurusan':
                include 'pages/jurusan/create.php';
            break;
            case 'edit_jurusan':
                include 'pages/jurusan/edit.php';
            break;
            // =======================================
        
            // kelas
            case 'kelas':
                include 'pages/kelas/index.php';
            break;
            case 'tambah_kelas':
                include 'pages/kelas/create.php';
            break;
            case 'edit_kelas':
                include 'pages/kelas/edit.php';
            break;
            // =======================================

            // Tapel
            case 'tapel':
                include 'pages/tahunpelajaran/index.php';
            break;
            case 'tambah_tapel':
                include 'pages/tahunpelajaran/create.php';
            break;
            case 'edit_tapel':
                include 'pages/tahunpelajaran/edit.php';
            break;
            // =======================================

            // Semester
            case 'semester':
                include 'pages/semester/index.php';
            break;
            case 'tambah_semester':
                include 'pages/semester/create.php';
            break;
            case 'edit_semester':
                include 'pages/semester/edit.php';
            break;
            // =======================================

            // Rombel
            case 'rombel':
                include 'pages/rombel/index.php';
            break;
            case 'datarombel':
                include 'pages/rombel/datarombel.php';
            break;
            case 'createrombel':
                include 'pages/rombel/createrombel.php';
            break;
            case 'edit_rombel':
                include 'pages/rombel/editrombel.php';
            break;
            case 'gurumapel':
                include 'pages/rombel/gurumapel.php';
            break;
            case 'siswarombel':
                include 'pages/rombel/siswarombel.php';
            break;
        
            // =======================================
        
            // Guru Mapel
            case 'guru_mapel':
                include 'pages/gurumapel/index.php';
            break;
            case 'guru_mapel_kelas':
                include 'pages/gurumapel/kelas.php';
            break;
            case 'tambah_guru_mapel':
                include 'pages/gurumapel/create.php';
            break;
            case 'edit_guru_mapel':
                include 'pages/gurumapel/edit.php';
            break;
            // =======================================
        
            // Siswa Kelas
            case 'siswa_kelas':
                include 'pages/siswakelas/index.php';
            break;
            case 'tambah_siswa_kelas':
                include 'pages/siswakelas/create.php';
            break;
            case 'edit_siswa_kelas':
                include 'pages/siswakelas/edit.php';
            break;
            // =======================================

            // Leger Nilai
            case 'leger':
                include 'pages/leger/index.php';
            break;
            case 'dataleger':
                include 'pages/leger/dataleger.php';
            break;
            // =======================================

            // Raport
            case 'rapor':
                include 'pages/rapor/rombel.php';
            break;
            case 'datarapor':
                include 'pages/rapor/index.php';
            break;
            // =======================================
        }

    }else if($_SESSION['status'] == "guru"){ 
        
        switch ($page) {
            // Guru Mapel
            case 'nilai':
                include 'pages/nilai/index.php';
            break;
            case 'datanilai':
                include 'pages/nilai/datanilai.php';
            break;
            case 'kelolanilai':
                include 'pages/nilai/kelolanilai.php';
            break;
            case 'edit_nilai':
                include 'pages/nilai/edit.php';
            break;
            // =======================================
        }

    }else if($_SESSION['status'] == "siswa"){
        switch ($page) {
            // Raport
            case 'raporsiswa':
                include 'pages/rapor/rombelpersiswa.php';
            break;
            // =======================================
        }

    }else{
        echo "<h1> Hak Akses Ditolak </h1>";
    }

}else{
  include "dashboard.php";
}
?>