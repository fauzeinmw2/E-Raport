<?php
    include "koneksi.php";
    error_reporting(0);
    $tapel = $eraport->prepare("SELECT * FROM tapel");
    $tapel->execute();
    $datat = $tapel->fetchAll();

    $semester = $eraport->prepare("SELECT * FROM semester");
    $semester->execute();
    $datas = $semester->fetchAll();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Nilai</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pilih Rombel</li>
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
    <form action="index.php?page=datanilai" method="POST">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tahun Pelajaran</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="tapel">
                    <option value="">-- Pilih Tahun Pelajaran --</option>

                    <?php 
                        foreach ($datat as $tapel) {
                    ?>

                    <option value="<?= $tapel['id_tapel'] ?>"><?= $tapel['tapel'] ?></option>

                    <?php } ?>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Semester</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="semester">
                    <option value="">-- Pilih Semester --</option>

                    <?php 
                        foreach ($datas as $semester) {
                    ?>

                    <option value="<?= $semester['id_semester'] ?>"><?= $semester['semester'] ?></option>

                    <?php } ?>

                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12 col-md-12">
                <button type="submit" class="pull-right btn btn-primary">Lanjut</button>
            </div>
        </div>
        
    </form>					
</div>
<!-- Default Basic Forms End -->