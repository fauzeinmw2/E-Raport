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
                <h4>Rombongan Belajar</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Rombongan Belajar</li>
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
        <div class="pull-right">
            <a href="index.php?page=createrombel&tapel=<?= $_REQUEST['tapel'] ?>&semester=<?= $_REQUEST['semester'] ?>" class="btn btn-primary">Tambah Data Rombel</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Siswa</th>
                    <th scope="col">Wali Kelas</th>
                    <th scope="col">Guru BK</th>
                    <th scope="col">Guru Mapel</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                     
                    $no=0;
                    $sql = $eraport->prepare("SELECT * FROM jurusan ORDER BY nama_jurusan ASC");
                    $sql->execute();
                    $data = $sql->fetchAll();

                    $smt = $_REQUEST['semester'];

                    if($smt == "1" || $smt == "2"){
                        $tingkat = "X";
                    }else if($smt == "3" || $smt == "4"){
                        $tingkat = "XI";
                    }else if($smt == "5" || $smt == "6"){
                        $tingkat = "XII";
                    }

                    foreach($data as $jurusan){
                ?>

                    <tr class="table-warning text-center">
                        <td colspan="7"><?= $jurusan['nama_jurusan'] ?></td>
                    </tr>

                    <?php 
                        $sqlr = $eraport->prepare("SELECT * FROM rombel
                            INNER JOIN kelas ON kelas.id_kelas=rombel.id_kelas 
                            WHERE kelas.id_jurusan='$jurusan[id_jurusan]' AND kelas.tingkat='$tingkat' AND rombel.tapel='$_REQUEST[tapel]' AND rombel.semester='$_REQUEST[semester]' ORDER BY kelas.nama_kelas ASC");
                        $sqlr->execute();
                        $datar = $sqlr->fetchAll();

                        foreach($datar as $rombel){
                            $gurukelas = $eraport->prepare("SELECT * FROM guru WHERE nik='$rombel[guru_kelas]'");
                            $gurukelas->execute();
                            $datagk = $gurukelas->fetch();

                            $gurubk = $eraport->prepare("SELECT * FROM guru WHERE nik='$rombel[guru_bk]'");
                            $gurubk->execute();
                            $datagb = $gurubk->fetch();
                    ?>
                    
                    <tr class="text-center">
                        <th scope="row"><?= $no=$no+1;?></th>
                        <td><?= $rombel['nama_kelas'] ?></td>
                        <td><a class="dropdown-item" href="index.php?page=siswarombel&idrombel=<?= $rombel['id_rombel'] ?>&idjurusan=<?= $rombel['id_jurusan'] ?>"><i class="dw dw-eye"></i></a></td>
                        <td><?= $datagk['nama_guru'] ?></td>
                        <td><?= $datagb['nama_guru'] ?></td>
                        <td><a class="dropdown-item" href="index.php?page=gurumapel&idrombel=<?= $rombel['id_rombel'] ?>&idjurusan=<?= $rombel['id_jurusan'] ?>"><i class="dw dw-edit2"></i></a></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="index.php?page=edit_rombel&id=<?= $rombel['id_rombel'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus Data ini?')" href="proses.php?act=hapusRombel&id=<?=$rombel['id_rombel']?>&tapel=<?=$rombel['tapel']?>&semester=<?=$rombel['semester']?>" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                <?php }} ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Responsive tables End -->