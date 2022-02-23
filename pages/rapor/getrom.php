<?php 
    $tapel = isset($_GET['tapel'])?$_GET['tapel']:""; 
    $semester = isset($_GET['semester'])?$_GET['semester']:""; 
?>

<select name="kelas" class="form-control" id="kelas" onChange="getromk(this.value, <?= $tapel ?>, <?= $semester ?>)" >
<!-- onChange="getromk(this.value)" -->
    <option value="0">--- Pilih Kelas ---</option>
    
    <?php include "../../koneksi.php";; 

    $prog = isset($_GET['prog'])?$_GET['prog']:""; 
    if($prog!="") {
        $queryjj = $eraport->prepare("SELECT * FROM kelas WHERE id_jurusan='$prog' ORDER BY nama_kelas ASC");
        $queryjj->execute();
        $datajj = $queryjj->fetchAll();
        foreach ($datajj as $valuejj):
    ?>

    <option value="<?php echo $valuejj['id_kelas'];?>"><?php echo $valuejj['nama_kelas'];?></option>
        <?php endforeach; ?>
</select>
 <?php } ?>