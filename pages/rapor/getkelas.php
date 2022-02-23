<?php 
    $prog = isset($_GET['prog'])?$_GET['prog']:"";
    $tapel = isset($_GET['tapel'])?$_GET['tapel']:""; 
    $semester = isset($_GET['semester'])?$_GET['semester']:""; 

    include "../../koneksi.php"; 
    $no=0;
    $sql = $eraport->prepare("SELECT * FROM siswa 
        INNER JOIN siswa_rombel ON siswa_rombel.nis = siswa.nis
        INNER JOIN rombel ON rombel.id_rombel=siswa_rombel.id_rombel 
        WHERE rombel.id_kelas='$prog' AND rombel.tapel='$tapel' AND rombel.semester='$semester'");
    $sql->execute();
    $data = $sql->fetchAll();

    foreach($data as $siswa){
?>
<tr>
    <td><?= $no=$no+1;?></td>
    <td><?= $siswa['nis'];?></td>
    <td><?= $siswa['nama_siswa'];?></td>
    <td><a href="pages/rapor/cetak.php?nis=<?= $siswa['nis'] ?>&tapel=<?= $tapel ?>&semester=<?= $semester ?>" target="_blank" class="btn btn-primary" role="button" title="Cetak Data"><i class="fa fa-print"></i> Cetak Raport</a></td>
</tr>
<?php } ?>