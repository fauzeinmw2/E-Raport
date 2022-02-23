<?php 
    include "koneksi.php";

    $rombel = $eraport->prepare("SELECT rombel.*, semester.semester, semester.kode_semester, semester.id_semester, tapel.tapel, tapel.id_tapel, kelas.nama_kelas
        FROM rombel 
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas 
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel 
        INNER JOIN semester ON semester.id_semester=rombel.semester 
        WHERE id_rombel='$_GET[id]'");
    $rombel->execute();
    $datar = $rombel->fetch();

    $smt = $datar['semester'];

    // echo $smt;

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

    $gurukelas = $eraport->prepare("SELECT * FROM guru WHERE nik='$datar[guru_kelas]' AND status='aktif'");
    $gurukelas->execute();
    $datagk = $gurukelas->fetch();

    $gurubk = $eraport->prepare("SELECT * FROM guru WHERE nik='$datar[guru_bk]' AND status='aktif'");
    $gurubk->execute();
    $datagb = $gurubk->fetch();

    $guru = $eraport->prepare("SELECT * FROM guru WHERE status='aktif' ORDER BY nama_guru ASC");
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Rombongan Belajar</li>
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
                    <td>: <?= $datar['tapel'] ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>: <?= $datar['semester'] ?> (<?= $datar['kode_semester'] ?>)</td>
                </tr>
            </table>
        </div>
    </div>

    <hr>

    <form action="proses.php?act=editRombel" method="post">

        <input type="hidden" name="tapel" value="<?= $datar['id_tapel'] ?>">
        <input type="hidden" name="semester" value="<?= $datar['id_semester'] ?>">
        <input type="hidden" name="id_rombel" value="<?= $datar['id_rombel'] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="kelas">
                    <option value="<?= $datar['id_kelas'] ?>"><?= $datar['nama_kelas'] ?></option>
                    
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
                    <option value="<?= $datagk['nik'] ?>"><?= $datagk['nama_guru'] ?></option>
                    
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
                    <option value="<?= $datagb['nik'] ?>"><?= $datagb['nama_guru'] ?></option>
                    
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