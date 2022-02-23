<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="assets/vendors/images/Logo-Famuwa-Soft.png" alt="" width="350"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="assets/vendors/images/banner-img.png" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back <div class="weight-600 font-30 text-blue"><?= $_SESSION['nama'] ?>!</div>
            </h4>
            <p class="font-18 max-width-600">Semoga Hari-mu Menyenangkan...</p>
        </div>
    </div>
</div>

<?php 
    if($_SESSION['status'] == "admin"){

        include "koneksi.php";
        error_reporting(0);
        $jurusan = $eraport->prepare("SELECT * FROM jurusan");
        $jurusan->execute();
        $jmljurusan = $jurusan->rowCount();

        $kelas = $eraport->prepare("SELECT * FROM kelas");
        $kelas->execute();
        $jmlkelas = $kelas->rowCount();

        $guru = $eraport->prepare("SELECT * FROM guru");
        $guru->execute();
        $jmlguru = $guru->rowCount();

        $siswa = $eraport->prepare("SELECT * FROM siswa");
        $siswa->execute();
        $jmlsiswa = $siswa->rowCount();
?>
<div class="row pb-10">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?= $jmljurusan ?></div>
                    <div class="font-14 text-secondary weight-500">Jurusan</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf"><i class="icon-copy fi-results"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?= $jmlkelas ?></div>
                    <div class="font-14 text-secondary weight-500">Kelas</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-billboard"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?= $jmlsiswa ?></div>
                    <div class="font-14 text-secondary weight-500">Siswa</div>
                </div>
                <div class="widget-icon">
                    <div class="icon"><i class="icon-copy fa fa-graduation-cap" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark"><?= $jmlguru ?></div>
                    <div class="font-14 text-secondary weight-500">Guru</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06"><i class="icon-copy fi-torso-business" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    }
?>