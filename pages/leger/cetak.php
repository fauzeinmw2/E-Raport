<?php 

    include "../../koneksi.php";
    // error_reporting(0);
    // $sql = $eraport->prepare("SELECT 
    //     siswa.nama_siswa, siswa.nis,
    //     nilai.nilai,
    //     mapel.singkatan, mapel.kelompok, mapel.id_mapel,
    //     kelas.nama_kelas
    //     FROM nilai
    //     INNER JOIN mapel ON mapel.id_mapel=nilai.id_mapel
    //     INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
    //     INNER JOIN siswa ON siswa.nis=nilai.nis
    //     INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas
    //     WHERE kelas.id_kelas='$_REQUEST[kelas]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    // $sql->execute();
    // $data = $sql->fetchAll();

    $siswa = $eraport->prepare("SELECT 
        siswa.nama_siswa, siswa.nis
        FROM siswa
        INNER JOIN siswa_rombel ON siswa_rombel.nis=siswa.nis
        INNER JOIN rombel ON rombel.id_rombel=siswa_rombel.id_rombel
        WHERE rombel.id_kelas='$_REQUEST[kelas]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    $siswa->execute();
    $datas = $siswa->fetchAll();

    $rombel = $eraport->prepare("SELECT * FROM rombel WHERE id_kelas='$_REQUEST[kelas]' AND tapel='$_REQUEST[tapel]' AND semester='$_REQUEST[semester]'");
    $rombel->execute();
    $datar = $rombel->fetch();

    $mapel = $eraport->prepare("SELECT DISTINCT
        mapel.singkatan, mapel.kelompok, mapel.id_mapel
        FROM mapel
        INNER JOIN nilai ON nilai.id_mapel=mapel.id_mapel
        INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
        WHERE rombel.id_kelas='$_REQUEST[kelas]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    $mapel->execute();
    $datam = $mapel->fetchAll();

    $bio = $eraport->prepare("SELECT 
        tapel.tapel,
        kelas.nama_kelas,
        semester.semester, semester.kode_semester,
        jurusan.nama_jurusan
        FROM nilai
        INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas
        INNER JOIN semester ON semester.id_semester=rombel.semester
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel
        INNER JOIN jurusan ON jurusan.id_jurusan=kelas.id_jurusan
        WHERE rombel.id_kelas='$_REQUEST[kelas]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    $bio->execute();
    $datab = $bio->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nilai</title>

    <style type="text/css">
        .styled-table{
            color:#232323;
            border-collapse:collapse;
            width: 100%;
        }

        .styled-table,th,td{
            border:1px solid #999;
            padding:5px 14px;
        } 

        .styled-table thead tr {
            background-color: grey;
            color: #ffffff;
            text-align: left;
        } 

        .normal td{
            border:0px solid #999;
            padding:0px 0px;
        } 

        td.pl{
            padding-left:10px;
        }
    </style>
</head>
<body>
    <center>
        <h2>Leger Nilai Siswa</h2>
    </center>
        <table class="normal">
            <tr>
                <td>Tahun Pelajaran</td>
                <td class="pl">: <?= $datab['tapel'] ?></td>
            </tr>

            <tr>
                <td>Semester</td>
                <td class="pl">: <?= $datab['semester'] ?> (<?= $datab['kode_semester'] ?>)</td>
            </tr>

            <tr>
                <td>Kompetensi Keahlian</td>
                <td class="pl">: <?= $datab['nama_jurusan'] ?></td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td class="pl">: <?= $datab['nama_kelas'] ?></td>
            </tr>
        </table><br>

    <center>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>

                    <?php
                        $idmapel = [];
                        foreach ($datam as $mapel) {
                            // $cari = array_search($mapel['id_mapel'], $idmapel);
                            if($mapel['kelompok'] != "C"){
                                array_push($idmapel, $mapel['id_mapel']);

                    ?>
                    <th><?= $mapel['singkatan'] ?></th>
                    <?php }} ?>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $noc=0;
                    foreach ($datas as $key => $siswa) {
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $siswa['nis']; ?></td>
                    <td><?= $siswa['nama_siswa']; ?></td>
                       
                    <?php
                        $jmlmapel = count($idmapel);
                        for ($i=0; $i < $jmlmapel; $i++) {
                            $nilai = $eraport->prepare("SELECT
                                nilai.nilai, nilai.id_mapel, nilai.id_rombel, nilai.nis
                                FROM nilai
                                INNER JOIN mapel ON nilai.id_mapel=mapel.id_mapel
                                INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
                                WHERE nilai.id_rombel='$datar[id_rombel]' AND nilai.id_mapel='$idmapel[$i]' AND nilai.nis='$siswa[nis]'");
                            $nilai->execute();
                            $datan = $nilai->fetch();
                    ?>
                    <th>
                        <?php 
                             if($datan['nilai'] < 78){
                                echo "<font style=color:red;><center>$datan[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datan[nilai]</center></font>";
                            }
                        ?>
                    </th>
                    <?php } ?>
                    
                </tr>

                <?php }?>
            </tbody>    
        </table>
    </center>

    <br><hr><br>

    <center>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>

                    <?php
                        $idmapelc = [];
                        foreach ($datam as $mapel) {
                            // $cari = array_search($mapel['id_mapel'], $idmapel);
                            if($mapel['kelompok'] == "C"){
                                array_push($idmapelc, $mapel['id_mapel']);

                    ?>
                    <th><?= $mapel['singkatan'] ?></th>
                    <?php }} ?>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $noc=0;
                    foreach ($datas as $key => $siswa) {
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $siswa['nis']; ?></td>
                    <td><?= $siswa['nama_siswa']; ?></td>
                       
                    <?php
                        $jmlmapelc = count($idmapelc);
                        for ($i=0; $i < $jmlmapelc; $i++) {
                            $nilaic = $eraport->prepare("SELECT
                                nilai.nilai, nilai.id_mapel, nilai.id_rombel, nilai.nis
                                FROM nilai
                                INNER JOIN mapel ON nilai.id_mapel=mapel.id_mapel
                                INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
                                WHERE nilai.id_rombel='$datar[id_rombel]' AND nilai.id_mapel='$idmapelc[$i]' AND nilai.nis='$siswa[nis]'");
                            $nilaic->execute();
                            $datanc = $nilaic->fetch();
                    ?>
                    <th>
                        <?php 
                             if($datanc['nilai'] < 78){
                                echo "<font style=color:red;><center>$datanc[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datanc[nilai]</center></font>";
                            }
                        ?>
                    </th>
                    <?php } ?>
                    
                </tr>

                <?php }?>
            </tbody>    
        </table>
    </center>

    <script>
        window.print();
    </script>
</body>
</html>