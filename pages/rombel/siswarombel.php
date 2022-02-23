<?php 
    include "koneksi.php";

    $sr = $eraport->prepare("SELECT * FROM siswa_rombel
        LEFT JOIN siswa ON siswa.nis = siswa_rombel.nis
        where id_rombel = '$_GET[idrombel]'");
    $sr->execute();
    $datasr = $sr->fetchAll();

    $rombel = $eraport->prepare("SELECT rombel.*, semester.semester, semester.kode_semester, semester.id_semester, tapel.tapel, tapel.id_tapel, kelas.nama_kelas
        FROM rombel 
        INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas 
        INNER JOIN tapel ON tapel.id_tapel=rombel.tapel 
        INNER JOIN semester ON semester.id_semester=rombel.semester 
        WHERE id_rombel='$_GET[idrombel]'");
    $rombel->execute();
    $datar = $rombel->fetch();

    $siswa = $eraport->prepare("SELECT siswa_rombel.nis AS nisrombel, siswa_rombel.id_rombel, siswa_rombel.id_siswa_rombel, siswa.*, rombel.tapel, rombel.semester
    FROM siswa_rombel
    RIGHT JOIN siswa ON siswa.nis = siswa_rombel.nis
    LEFT JOIN rombel ON rombel.id_rombel=siswa_rombel.id_rombel
    WHERE id_jurusan='$_GET[idjurusan]'");
    $siswa->execute();
    $datas = $siswa->fetchAll();
?>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Siswa Rombel</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Siswa Rombel</li>
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

    <form action="proses.php?act=kelolaSiswaRombel" method="post">
        <input type="hidden" name="rombel" value="<?= $_GET['idrombel'] ?>">
        <input type="hidden" name="tapel" value="<?= $datar['id_tapel'] ?>">
        <input type="hidden" name="semester" value="<?= $datar['id_semester'] ?>">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Pilih</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-warning text-center">
                    <td colspan="4">Siswa Dipilih</td>
                </tr>
                <?php 
                    // echo $gm->rowCount();
                    // if($sr->rowCount() > 0){
                        $no=0;
                        $nisterpilih = ["nol"];
                        // array_push($nisterpilih, $sr['nis']);
                        foreach ($datasr as $sr) {
                            array_push($nisterpilih, $sr['nis']);
                ?>
                <tr class="text-center">
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td>
                        <?= $sr['nis'] ?>
                    </td>
                    <td>
                        <?= $sr['nama_siswa'] ?>
                    </td>

                    <td>
                        <input type="checkbox" checked name="pilih[]" value="<?= $sr['nis'] ?>">
                    </td>
                    
                </tr>
                <?php } ?>

                <tr class="table-warning text-center">
                    <td colspan="4">Siswa Belum Terpilih</td>
                </tr>

                <?php 
                    $no=0;
                    foreach ($datas as $siswa) {
                        $cari = array_search($siswa['nis'], $nisterpilih);
                        if($siswa['id_rombel'] != $_GET['idrombel'] && $cari == null && $siswa['status'] == 'aktif'){  
                ?>
                <tr class="text-center">
                    <th scope="row"><?= $no=$no+1;?></th>
                    <td>
                        <!-- <input type="hidden" name="id_siswa_rombel[]" value=""> -->
                        <!-- <input type="hidden" name="nispilih[]" value=""> -->

                        <?= $siswa['nis'] ?>
                    </td>
                    <td>
                        <?= $siswa['nama_siswa'] ?>
                    </td>

                    <td>
                        <input type="checkbox" name="pilih1[]" value="<?= $siswa['nis'] ?>">
                    </td>
                    
                </tr>
                <?php 
                        }else{
                            
                        } 
                    }
                ?>
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