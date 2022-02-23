<?php 
    include "koneksi.php";

    $tapel = $eraport->prepare("SELECT * FROM tapel WHERE id_tapel='$_REQUEST[tapel]'");
    $tapel->execute();
    $datat = $tapel->fetch();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Leger Nilai Siswa</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pilih Kelas dan Semester</li>
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
                    <td>Tahun Pelajaran</td>
                    <td>: <?= $datat['tapel'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=0;
                    $sqlr = $eraport->prepare("SELECT 
                        kelas.nama_kelas, kelas.id_kelas,
                        semester.semester, semester.kode_semester, semester.id_semester
                        FROM kelas
                        INNER JOIN rombel ON kelas.id_kelas=rombel.id_kelas 
                        INNER JOIN semester ON semester.id_semester=rombel.semester
                        WHERE kelas.id_jurusan='$_REQUEST[jurusan]' AND rombel.tapel='$_REQUEST[tapel]' ORDER BY semester.semester ASC");
                    $sqlr->execute();
                    $datak = $sqlr->fetchAll();

                    foreach ($datak as $kelas) {
                ?>
                
                <tr class="text-center">
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td><?= $kelas['nama_kelas'] ?></td>
                    <td><?= $kelas['semester'] ?> (<?= $kelas['kode_semester'] ?>)</td>
                    <td><a class="dropdown-item" href="pages/leger/cetak.php?kelas=<?= $kelas['id_kelas'] ?>&tapel=<?= $_REQUEST['tapel'] ?>&semester=<?= $kelas['id_semester'] ?>" target="_blank"><i class="fa fa-print"></i></a></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Responsive tables End -->