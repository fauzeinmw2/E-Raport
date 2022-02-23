<script src="pages/guru/ajaxromguru.js"></script>

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Guru</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Guru</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <a href="index.php?page=tambah_guru" class="btn btn-primary">Tambah Guru</a>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>NIK</th>
                    <th>Nama Guru</th>
                    <th>Aktif</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        include "koneksi.php"; 
                        $no=0;
                        $sql = $eraport->prepare("SELECT * FROM guru ORDER BY nama_guru ASC");
                        $sql->execute();
                        $data = $sql->fetchAll();

                        foreach($data as $guru){
                    ?>
                <tr>
                    <td class="table-plus"><?= $no=$no+1;?></td>
                    <td><?= $guru['nik'] ?></td>
                    <td><?= $guru['nama_guru'] ?></td>
                    <td><input type="checkbox" 
                        <?php 
                            if($guru['status'] == "aktif") {
                                echo "checked";
                            } 
                            $nik = $guru['nik'];
                        ?>
                        onchange="cekstatus('<?= $nik ?>', this)" class="switch-btn" data-color="#0059b2">
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="index.php?page=edit_guru&nik=<?= $guru['nik'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus Data ini?')" href="proses.php?act=hapusGuru&nik=<?=$guru['nik']?>" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>