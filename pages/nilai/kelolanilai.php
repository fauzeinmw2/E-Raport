<?php 
    include "koneksi.php";

    $sql = $eraport->prepare("SELECT nilai.id_nilai, nilai.id_rombel, nilai.nilai, siswa.nis, siswa.nama_siswa, mapel.nama_mapel 
        FROM nilai 
        INNER JOIN mapel ON mapel.id_mapel=nilai.id_mapel 
        INNER JOIN siswa ON siswa.nis=nilai.nis 
        WHERE nilai.id_rombel='$_GET[idrombel]' AND mapel.id_mapel='$_GET[idmapel]'");
    $sql->execute();
    $data = $sql->fetchAll();

    $rombel = $eraport->prepare("SELECT rombel.*, semester.semester, semester.kode_semester, semester.id_semester, tapel.tapel, tapel.id_tapel, kelas.nama_kelas
        FROM rombel 
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas 
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel 
        INNER JOIN semester ON semester.id_semester=rombel.semester 
        WHERE id_rombel='$_GET[idrombel]'");
    $rombel->execute();
    $datar = $rombel->fetch();

    $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_mapel='$_GET[idmapel]'");
    $mapel->execute();
    $datam = $mapel->fetch();

    $siswa = $eraport->prepare("SELECT * FROM siswa 
        INNER JOIN siswa_rombel ON siswa_rombel.nis=siswa.nis
        WHERE id_rombel='$_GET[idrombel]'");
    $siswa->execute();
    $datas = $siswa->fetchAll();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Nilai</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Nilai Siswa</li>
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
                    <td>Mata Pelajaran</td>
                    <td>: <?= $datam['nama_mapel'] ?></td>
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

    <form action="proses.php?act=kelolanilai" method="post">
        <input type="hidden" name="rombel" value="<?= $_GET['idrombel'] ?>">
        <input type="hidden" name="tapel" value="<?= $datar['id_tapel'] ?>">
        <input type="hidden" name="semester" value="<?= $datar['id_semester'] ?>">
        <input type="hidden" name="mapel" value="<?= $datam['id_mapel'] ?>">

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($sql->rowCount() > 0){
                        $no=0;
                        foreach ($data as $nilai) {
                ?>
                <tr>
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td><?= $nilai['nis'] ?></td>
                    <td>
                        <input type="hidden" name="siswa[]" value="<?= $nilai['nis'] ?>">

                        <?= $nilai['nama_siswa'] ?>
                    </td>

                    <td>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nilai[]" type="number" value="<?= $nilai['nilai'] ?>" required>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php 
                        } 
                    }else {
                        $no=0;
                        foreach ($datas as $siswa) {
                ?>

                <tr class="text-center">
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td><?= $siswa['nis'] ?></td>
                    <td>
                        <input type="hidden" name="siswa[]" value="<?= $siswa['nis'] ?>">

                        <?= $siswa['nama_siswa'] ?>
                    </td>

                    <td>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nilai[]" type="number" value="0" required>
                            </div>
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