<?php 
    include "koneksi.php";

    $gm = $eraport->prepare("SELECT * FROM guru_mapel
        LEFT JOIN mapel ON guru_mapel.id_mapel = mapel.id_mapel
        LEFT JOIN guru ON guru_mapel.nik = guru.nik 
        where id_rombel = '$_GET[idrombel]'");
    $gm->execute();
    $datagm = $gm->fetchAll();

    $rombel = $eraport->prepare("SELECT rombel.*, semester.semester, semester.kode_semester, semester.id_semester, tapel.tapel, tapel.id_tapel, kelas.nama_kelas
        FROM rombel 
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas 
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel 
        INNER JOIN semester ON semester.id_semester=rombel.semester 
        WHERE id_rombel='$_GET[idrombel]'");
    $rombel->execute();
    $datar = $rombel->fetch();

    if($datar['semester'] == "1"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND a>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }else if($datar['semester'] == "2"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND b>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }else if($datar['semester'] == "3"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND c>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }else if($datar['semester'] == "4"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND d>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }else if($datar['semester'] == "5"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND e>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }else if($datar['semester'] == "6"){
        $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[idjurusan]' AND f>0");
        $mapel->execute();
        $datam = $mapel->fetchAll();
    }

    

    
    // var_dump($datam);

    $guru = $eraport->prepare("SELECT * FROM guru");
    $guru->execute();
    $datag = $guru->fetchAll();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Guru Mata Pelajaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Guru Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <table>
                <tr>
                    <td>Kelas</td>
                    <td>: <?= $datar['nama_kelas'] ?></td>
                </tr>
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
        <!-- <div class="pull-right">
            <a href="#" class="btn btn-primary">Tambah Data Rombel</a>
        </div> -->
    </div>

    <form action="proses.php?act=kelolaGuruMapel" method="post">
        <input type="hidden" name="rombel" value="<?= $_GET['idrombel'] ?>">
        <input type="hidden" name="tapel" value="<?= $datar['id_tapel'] ?>">
        <input type="hidden" name="semester" value="<?= $datar['id_semester'] ?>">

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Nama Guru</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // echo $gm->rowCount();
                    if($gm->rowCount() > 0){
                        $no=0;
                        foreach ($datagm as $gm) {
                ?>
                <tr>
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td>
                        <input type="hidden" name="id_guru_mapel[]" value="<?= $gm['id_guru_mapel'] ?>">
                        <input type="hidden" name="mapel[]" value="<?= $gm['id_mapel'] ?>">

                        <?= $gm['nama_mapel'] ?>
                    </td>

                    <td>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="guru[]">
                                <option value="<?= $gm["nik"] ?>"><?= $gm["nama_guru"] ?></option>
                                
                                <?php 
                                    foreach ($datag as $guru) {
                                ?>

                                <option value="<?= $guru['nik'] ?>"><?= $guru['nama_guru'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </td>
                    
                </tr>
                <?php 
                        }
                    }else{
                        // echo "45";
                        $no=0;
                        foreach ($datam as $mapel) {
                ?>

                <tr>
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td>
                        <input type="hidden" name="mapel[]" value="<?= $mapel['id_mapel'] ?>">

                        <?= $mapel['nama_mapel'] ?>
                    </td>

                    <td>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="guru[]">
                                <option value="">-- Pilih Guru --</option>
                                
                                <?php 
                                    foreach ($datag as $guru) {
                                ?>

                                <option value="<?= $guru['nik'] ?>"><?= $guru['nama_guru'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </td>
                    
                </tr>

                <?php }} ?>
            </tbody>
        </table>
    </div>
    <div class="form-group row">
        <div class="col-sm-12 col-md-12">
            <button type="submit" class="pull-right btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
</div>
<!-- Responsive tables End -->