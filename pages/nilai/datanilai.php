<?php 
    include "koneksi.php";

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
                <h4>Nilai</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pilih Rombel</li>
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
                <tr>
                    <td>Semester</td>
                    <td>: <?= $datas['semester'] ?> (<?= $datas['kode_semester'] ?>)</td>
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
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     
                    $no=0;

                    $sql = $eraport->prepare("SELECT * FROM mapel 
                        INNER JOIN guru_mapel ON mapel.id_mapel = guru_mapel.id_mapel 
                        INNER JOIN rombel ON rombel.id_rombel=guru_mapel.id_rombel 
                        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas
                        WHERE guru_mapel.nik='$_SESSION[nik]' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]'");
                    $sql->execute();
                    $data = $sql->fetchAll();

                    foreach($data as $mapel){
                ?>
                    
                    <tr class="text-center">
                        <th scope="row"><?= $no=$no+1;?></th>
                        <td><?= $mapel['nama_kelas'] ?></td>
                        <td><?= $mapel['nama_mapel'] ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="index.php?page=kelolanilai&idrombel=<?= $mapel['id_rombel'] ?>&idmapel=<?= $mapel['id_mapel'] ?>"><i class="dw dw-edit2"></i> Kelola Nilai</a>
                                    <a href="pages/nilai/cetak.php?rombel=<?= $mapel['id_rombel'] ?>&mapel=<?= $mapel['id_mapel'] ?>&nik=<?= $_SESSION['nik'] ?>" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Cetak Nilai</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Responsive tables End -->