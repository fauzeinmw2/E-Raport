<?php
    include "koneksi.php";
    // error_reporting(0);
    $sql = $eraport->prepare("SELECT * FROM jurusan WHERE id_jurusan=$_GET[id]");
    $sql->execute();
    $data = $sql->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Jurusan</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Jurusan</li>
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
    <form action="proses.php?act=editJurusan" method="post">
        <input type="hidden" name="id_jurusan" value="<?= $_GET['id'] ?>">

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nama Jurusan</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="nama_jurusan" type="text" value="<?= $data['nama_jurusan'] ?>">
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