<?php
    include "koneksi.php";
    // error_reporting(0);
    $sql = $eraport->prepare("SELECT * FROM jurusan WHERE id_jurusan=$_GET[id]");
    $sql->execute();
    $data = $sql->fetch();

    $mapel = $eraport->prepare("SELECT * FROM mapel WHERE id_mapel=$_GET[id_mapel]");
    $mapel->execute();
    $datam = $mapel->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Mata Pelajaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Default Basic Forms Start -->
<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4"><?= $data['nama_jurusan'] ?></h4>
            <br>
        </div>
    </div>
    <form action="proses.php?act=editMapel" method="post">
        <input type="hidden" name="id_jurusan" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="id_mapel" value="<?= $datam['id_mapel'] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Mata Pelajaran</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="nama_mapel" type="text" value="<?= $datam['nama_mapel'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Singkatan Mata Pelajaran</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="singkatan" type="text" value="<?= $datam['singkatan'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kelompok</label>
            <div class="col-sm-12 col-md-10">
                <select name="kelompok" class="custom-select col-12">
                    <option value="<?= $datam['kelompok'] ?>">
                        <?php 
                            if($datam['kelompok'] == "A"){
                               echo "Kelompok Umum"; 
                            }else if($datam['kelompok'] == "B"){
                                echo "Muatan Lokal"; 
                            }else if($datam['kelompok'] == "C"){
                                echo "Kelompok Kejuruan"; 
                            }
                        ?>
                    </option>
                    <option value="A">Kelompok Umum</option>
                    <option value="B">Muatan Lokal</option>
                    <option value="C">Kelompok Kejuruan</option>
                </select>
            </div>
        </div>

        <br>
        <div class="clearfix text-center col-sm-12 col-md-12">
            <div class="pull-center">
                <p class="breadcrumb-item active">Jumlah Jam Pelajaran</p>
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 1</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="a" value="<?= $datam['a'] ?>" type="number">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 2</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="b" value="<?= $datam['b'] ?>" type="number">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 3</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="c" value="<?= $datam['c'] ?>" type="number">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 4</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="d" value="<?= $datam['d'] ?>" type="number">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 5</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="e" value="<?= $datam['e'] ?>" type="number">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester 6</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="f" value="<?= $datam['f'] ?>" type="number">
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