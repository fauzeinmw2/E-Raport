<script src="pages/rapor/ajaxromrapor.js"></script>

<?php
    include "koneksi.php";
    // error_reporting(0);
    $jurusan = $eraport->prepare("SELECT * FROM jurusan ORDER BY nama_jurusan ASC");
    $jurusan->execute();
    $dataj = $jurusan->fetchAll();

    $tapel = $eraport->prepare("SELECT * FROM tapel WHERE id_tapel='$_REQUEST[tapel]'");
    $tapel->execute();
    $datat = $tapel->fetch();

    $semester = $eraport->prepare("SELECT * FROM semester WHERE id_semester='$_REQUEST[semester]'");
    $semester->execute();
    $datas = $semester->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Raport Siswa</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Raport Kelas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-body col-md-4">
    <div class="form-group">
        <select class="form-control" name="jurusan" id="jurusan" onChange="getrom(this.value, <?= $datat['id_tapel'] ?>, <?= $datas['id_semester'] ?>)">
            <option value="0">-- Pilih Jurusan --</option>
            <?php
                foreach($dataj as $jurusan){
            ?>
                <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group" id="dkelas">
        <select class="form-control" name="kelas" id="kelas">
            <option value="0">-- Pilih Kelas --</option>
        </select>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
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
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">#</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody id="tsiswa">
                <tr>
                    <td class="table-plus text-center" colspan="4" style="color:red;"><b>Pilih Jurusan dan Kelas Terlebih Dahulu !!!</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>