<?php
    include "koneksi.php";
    error_reporting(0);
    $sql = $eraport->prepare("SELECT * FROM jurusan");
    $sql->execute();
    $data = $sql->fetchAll();

    $kelas = $eraport->prepare("SELECT * FROM kelas 
        INNER JOIN jurusan ON jurusan.id_jurusan=kelas.id_jurusan WHERE id_kelas=$_GET[id]");
    $kelas->execute();
    $datak = $kelas->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Kelas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <!-- <h4 class="text-blue h4"></h4>
            <br> -->
        </div>
    </div>
    <form action="proses.php?act=editKelas" method="post">
        <input type="hidden" name="id_kelas" value="<?= $datak["id_kelas"] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Kelas</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="nama_kelas" type="text" value="<?= $datak["nama_kelas"] ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="jurusan">
                    <option value="<?= $datak["id_jurusan"] ?>"><?= $datak["nama_jurusan"] ?></option>
                    
                    <?php 
                        foreach ($data as $jurusan) {
                    ?>

                    <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>

                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tingkat</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="tingkat">
                    <option value="<?= $datak['tingkat'] ?>"><?= $datak['tingkat'] ?></option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
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