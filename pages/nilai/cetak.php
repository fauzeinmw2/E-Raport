<?php 

    include "../../koneksi.php";
    // error_reporting(0);
    $sql = $eraport->prepare("SELECT 
        siswa.nama_siswa, siswa.nis,
        nilai.nilai
        FROM nilai
        INNER JOIN mapel ON mapel.id_mapel=nilai.id_mapel
        INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
        INNER JOIN siswa ON siswa.nis=nilai.nis
        WHERE mapel.id_mapel='$_REQUEST[mapel]' AND rombel.id_rombel='$_REQUEST[rombel]'");
    $sql->execute();
    $data = $sql->fetchAll();

    $bio = $eraport->prepare("SELECT 
        guru.nama_guru,
        kelas.nama_kelas,
        semester.semester, semester.kode_semester,
        tapel.tapel,
        mapel.nama_mapel
        FROM guru
        INNER JOIN guru_mapel ON guru_mapel.nik=guru.nik
        INNER JOIN rombel ON rombel.id_rombel=guru_mapel.id_rombel
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas
        INNER JOIN semester ON semester.id_semester=rombel.semester
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel
        INNER JOIN mapel ON mapel.id_mapel=guru_mapel.id_mapel
        WHERE guru.nik='$_REQUEST[nik]' AND mapel.id_mapel='$_REQUEST[mapel]' AND rombel.id_rombel='$_REQUEST[rombel]'");
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
        <h2>Rekap Nilai Siswa</h2>
    </center>
        <table class="normal">
            <tr>
                <td>Nama Guru</td>
                <td class="pl">: <?= $datab['nama_guru'] ?></td>
            </tr>

            <tr>
                <td>Mata Pelajaran</td>
                <td class="pl">: <?= $datab['nama_mapel'] ?></td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td class="pl">: <?= $datab['nama_kelas'] ?></td>
            </tr>

            <tr>
                <td>Semester</td>
                <td class="pl">: <?= $datab['semester'] ?> (<?= $datab['kode_semester'] ?>)</td>
            </tr>

            <tr>
                <td>Tahun Pelajaran</td>
                <td class="pl">: <?= $datab['tapel'] ?></td>
            </tr>
        </table><br>
    <center>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $noc=0;
                    foreach ($data as $datav) {
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $datav['nis']; ?></td>
                    <td><?= $datav['nama_siswa']; ?></td>
                    <td>
                        <?php
                            if($datav['nilai'] < 78){
                                echo "<font style=color:red;><center>$datav[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datav[nilai]</center></font>";
                            }
                        ?>
                    </td>
                </tr>

                <?php } ?>
            </tbody>    
        </table>
    </center>

    <script>
        window.print();
    </script>
</body>
</html>