<?php 
    include "koneksi.php";

    $tapel = $eraport->prepare("SELECT * FROM tapel WHERE id_tapel='$_GET[tapel]'");
    $tapel->execute();
    $datat = $tapel->fetch();

    $semester = $eraport->prepare("SELECT * FROM semester WHERE id_semester='$_GET[semester]'");
    $semester->execute();
    $datas = $semester->fetch();

    $smt = $_GET['semester'];

    if($smt == "1" || $smt == "2"){
        $tingkat = "X";
    }else if($smt == "3" || $smt == "4"){
        $tingkat = "XI";
    }else if($smt == "5" || $smt == "6"){
        $tingkat = "XII";
    }

    $kelas = $eraport->prepare("SELECT * FROM kelas WHERE tingkat='$tingkat' ORDER BY id_kelas ASC");
    $kelas->execute();
    $datak = $kelas->fetchAll();

    $guru = $eraport->prepare("SELECT * FROM guru WHERE status='aktif' ORDER BY nik ASC");
    $guru->execute();
    $datag = $guru->fetchAll();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Rombongan Belajar</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Rombongan Belajar</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <table>
                <tr>
                    <td>Tahun Pelajaran</td>
                    <td>: <?= $datat['tapel'] ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>: <?= $datas['semester'] ?> (<?= $datas['kode_semester'] ?>)</td>
                </tr>
            </table>
        </div>
    </div>

    <hr>

    <form action="proses.php?act=simpanRombel" method="post">

        <input type="hidden" name="tapel" value="<?= $_GET['tapel'] ?>">
        <input type="hidden" name="semester" value="<?= $_GET['semester'] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="kelas">
                    <option value="">-- Pilih Kelas --</option>
                    
                    <?php 
                        foreach ($datak as $kelas) {
                    ?>
                        <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Wali Kelas</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="guru_kelas">
                    <option value="">-- Pilih Wali Kelas --</option>
                    
                    <?php 
                        foreach ($datag as $guru) {
                    ?>
                        <option value="<?= $guru['nik'] ?>"><?= $guru['nama_guru'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Guru BK</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="guru_bk">
                    <option value="">-- Pilih Wali Kelas --</option>
                    
                    <?php 
                        foreach ($datag as $guru) {
                    ?>
                        <option value="<?= $guru['nik'] ?>"><?= $guru['nama_guru'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="submit" class="pull-right btn btn-primary">Simpan</button>
            </div>
        </div>
        
    </form>					
</div>
<!-- Default Basic Forms End -->