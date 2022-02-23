<?php 
    include "koneksi.php";

    $sql = $eraport->prepare("SELECT * FROM jurusan WHERE id_jurusan='$_GET[id]'");
    $sql->execute();
    $jurusan = $sql->fetch();
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
                    <li class="breadcrumb-item active" aria-current="page"><?= $jurusan['nama_jurusan'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <a href="index.php?page=tambah_mapel&id=<?= $_GET['id'] ?>" class="btn btn-primary">Tambah Mapel</a>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Kelompok</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $no=0;
                    $sql = $eraport->prepare("SELECT * FROM mapel WHERE id_jurusan='$_GET[id]' ORDER BY kelompok ASC");
                    $sql->execute();
                    $data = $sql->fetchAll();

                    foreach($data as $mapel){
                ?>
                <tr>
                    <td class="table-plus"><?= $no=$no+1;?></td>
                    <td><?= $mapel['nama_mapel'] ?></td>
                    <td><?= $mapel['kelompok'] ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="index.php?page=edit_mapel&id_mapel=<?= $mapel['id_mapel'] ?>&id=<?= $_GET['id'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus Data ini?')" href="proses.php?act=hapusMapel&id_mapel=<?=$mapel['id_mapel']?>&id=<?= $_GET['id'] ?>" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>