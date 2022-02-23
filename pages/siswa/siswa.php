<script src="pages/siswa/ajaxroom.js"></script>

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
                <h4>Siswa</h4>
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
        <a href="index.php?page=tambah_siswa&id=<?= $_GET['id'] ?>" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Aktif</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=0;
                    $sql = $eraport->prepare("SELECT * FROM siswa WHERE id_jurusan='$_GET[id]' ORDER BY nama_siswa ASC");
                    $sql->execute();
                    $data = $sql->fetchAll();
                    foreach($data as $key => $siswa){
                ?>
                <tr>
                    <td class="table-plus"><?= $no=$no+1;?></td>
                    <td><?= $siswa['nis'] ?></td>
                    <td><?= $siswa['nama_siswa'] ?></td>
                    <td><input type="checkbox" 
                        <?php 
                            if($siswa['status'] == "aktif") {
                                echo "checked";
                            } 
                            $nis = $siswa['nis'];
                        ?>
                        onchange="cekstatus('<?= $nis ?>', this)" class="switch-btn" data-color="#0059b2"></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="index.php?page=edit_siswa&nis=<?= $siswa['nis'] ?>&id=<?= $_GET['id'] ?>"><i class="dw dw-edit2"></i> Edit</a>
                                <a onclick="return confirm('Yakin ingin menghapus Data ini?')" href="proses.php?act=hapusSiswa&nis=<?=$siswa['nis']?>&id=<?= $_GET['id'] ?>" class="dropdown-item"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <script>
    function cekStatus(id_siswa, status_checked) {
        if (status_checked.checked) {
            axios.post("{{ url('siswa/terdaftar') }}", {
                'id_siswa': id_siswa,
                'nama_siswa': nama_siswa,
            }).then(function(res) {
                var id = res.data
                toastr.info('Sukses.. Siswa Terdaftar')
                // toastr.info('Sukses.. Barang Di Set Tidak Laku')
                // $(".cek_menipis").prop("checked", true);
            }).catch(function(err) {
                console.log(err)
                toastr.warning('ERROR..')
                // $(".cek_menipis").prop("checked", false);
            })
        } else {
            axios.post("{{ url('siswa/tdk_terdaftar') }}", {
                'id_siswa': id_siswa
            }).then(function(res) {
                var data = res.data
                toastr.warning('Siswa Belum Terdaftar')
                // toastr.info('Sukses.. Barang Di Set Laku')
            }).catch(function(err) {
                toastr.warning('ERROR..')
            })
        }
    }
</script> -->