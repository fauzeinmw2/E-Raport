<?php
    include "koneksi.php";
    // error_reporting(0);
    $sql = $eraport->prepare("SELECT * FROM semester WHERE id_semester=$_GET[id]");
    $sql->execute();
    $data = $sql->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Semester</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Semester</li>
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
    <form action="proses.php?act=editSemester" method="post">

        <input type="hidden" name="id_semester" value="<?= $data['id_semester'] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="semester">
                    <option value="<?= $data['semester'] ?>"><?= $data['semester'] ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kode Semeter</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="kode_semester" type="text" value="<?= $data['kode_semester'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jenis</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="jenis">
                    <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
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