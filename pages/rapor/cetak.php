<?php 

    include "../../koneksi.php";
    error_reporting(0);
    $sql = $eraport->prepare("SELECT * FROM nilai
        INNER JOIN mapel ON mapel.id_mapel=nilai.id_mapel
        INNER JOIN rombel ON rombel.id_rombel=nilai.id_rombel
        WHERE nilai.nis='$_REQUEST[nis]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    $sql->execute();
    $data = $sql->fetchAll();

    $bio = $eraport->prepare("SELECT 
        siswa.nama_siswa, siswa.nis,
        kelas.nama_kelas,
        semester.semester, semester.kode_semester,
        tapel.tapel
        FROM siswa
        INNER JOIN siswa_rombel ON siswa_rombel.nis=siswa.nis
        INNER JOIN rombel ON rombel.id_rombel=siswa_rombel.id_rombel
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas
        INNER JOIN semester ON semester.id_semester=rombel.semester
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel
        WHERE siswa.nis='$_REQUEST[nis]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
    $bio->execute();
    $datab = $bio->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Raport</title>

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

        .hl{
            float:left;
            margin-right: 90px;
        }
    </style>
</head>
<body>
    <!-- <center>
        <h2>Raport Peserta Didik</h2>
    </center> -->
        <table class="normal hl">
            <tr>
                <td>Nama Peserta Didik</td>
                <td class="pl">: <?= $datab['nama_siswa'] ?></td>
            </tr>

            <tr>
                <td>NISN</td>
                <td class="pl">: <?= $datab['nis'] ?></td>
            </tr>

            <tr>
                <td>Sekolah</td>
                <td class="pl">: SMKN 2 Padang</td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td class="pl">: Jl. Baru Andalas No.5, Simpang Haru</td>
            </tr>
        </table>
        
        <table class="normal hr">

            <tr>
                <td>Kelas</td>
                <td class="pl">: <?= $datab['nama_kelas'] ?></td>
            </tr>

            <tr>
                <td>Fase</td>
                <td class="pl">: -</td>
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
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai Akhir</th>
                    <th>Capaian Kompetensi</th>
                </tr>
            </thead>

            <tbody>
                
            <tr><td colspan="4"><b>Muatan Nasional</b></td></tr>
                <?php
                    $noc=0; 
                    foreach($data as $datav){
                        if($datav['kelompok'] == "A"){
                    
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $datav['nama_mapel']; ?></td>
                    <td>
                        <?php
                            if($datav['nilai'] < 78){
                                echo "<font style=color:red;><center>$datav[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datav[nilai]</center></font>";
                            }
                        ?>
                    </td>
                    <td>
                        -
                    </td>
                </tr>

                <?php }} ?>

                <tr><td colspan="4"><b>Muatan Kewilayahan</b></td></tr>
                <?php
                    $noc=0; 
                    foreach($data as $datav){
                        if($datav['kelompok'] == "B"){
                    
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $datav['nama_mapel']; ?></td>
                    <td>
                        <?php
                            if($datav['nilai'] < 78){
                                echo "<font style=color:red><center>$datav[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datav[nilai]</center></font>";
                            }
                        ?>
                    </td>
                    <td>
                        -
                    </td>
                </tr>

                <?php }} ?>

                <tr><td colspan="4"><b>Muatan Peminatan Kejuruan</b></td></tr>
                <?php
                    $noc=0; 
                    foreach($data as $datav){
                        if($datav['kelompok'] == "C"){
                    
                ?>
                <tr>
                    <td><center><?= $noc=$noc+1; ?></center></td>
                    <td><?= $datav['nama_mapel']; ?></td>
                    <td>
                        <?php
                            if($datav['nilai'] < 78){
                                echo "<font style=color:red><center>$datav[nilai]</center></font>";
                            }else{
                                echo "<font><center>$datav[nilai]</center></font>";
                            }
                        ?>
                    </td>
                    <td>
                        -
                    </td>
                </tr>

                <?php }} ?>
            </tbody>    
        </table>
    </center>

    <script>
        window.print();
    </script>
</body>
</html>