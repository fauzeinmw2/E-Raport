<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Kelas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelas</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <a href="index.php?page=tambah_kelas" class="btn btn-primary">Tambah Kelas</a>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Tingkat</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php"; 
                    $no=0;
                    $sql = $eraport->prepare("SELECT * FROM kelas 
                    INNER JOIN jurusan ON jurusan.id_jurusan=kelas.id_jurusan ORDER BY jurusan.nama_jurusan ASC");
                    $sql->execute();
                    $data = $sql->fetchAll();

                    foreach($data as $kelas){
                ?>
                <tr>
                    <td class="table-plus"><?= $no=$no+1;?></td>
                    <td><?= $kelas['nama_kelas'] ?></td>
                    <td><?= $kelas['nama_jurusan'] ?></td>
                    <td><?= $kelas['tingkat'] ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="index.php?page=edit_kelas&id=<?= $kelas['id_kelas'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus Data ini?')" href="proses.php?act=hapusKelas&id=<?=$kelas['id_kelas']?>" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>