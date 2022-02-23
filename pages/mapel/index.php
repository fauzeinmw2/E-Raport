<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Mata Pelajaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pilih Jurusan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap" id="myTable">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">No</th>
                    <th>Jurusan</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        include "koneksi.php"; 
                        $no=0;
                        $sql = $eraport->prepare("SELECT * FROM jurusan ORDER BY nama_jurusan ASC");
                        $sql->execute();
                        $data = $sql->fetchAll();

                        foreach($data as $jurusan){
                    ?>
                <tr>
                    <td class="table-plus"><?= $no=$no+1;?></td>
                    <td><?= $jurusan['nama_jurusan'] ?></td>
                    <td>
                        <a class="dropdown-item" href="index.php?page=mapel&id=<?= $jurusan['id_jurusan'] ?>"><i class="dw dw-eye"></i> View</a>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>