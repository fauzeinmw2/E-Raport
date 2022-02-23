<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.php">
            <!-- <img src="assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> -->
            <img src="assets/src/images/SMKN-2-Padang.png" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>

    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="index.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>

                <?php 
                    if($_SESSION['status']=="admin"){
                ?>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-group"></span><span class="mtext">Rombel</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="index.php?page=rombel">Rombel</a></li>
                        <li><a href="index.php?page=semester">Semester</a></li>
                        <li><a href="index.php?page=tapel">Tahun Pelajaran</a></li>

                    </ul>
                </li>
                <li>
                    <a href="index.php?page=guru" class="dropdown-toggle no-arrow">
                        <i class="micon fi-torso-business"></i><span class="mtext">Guru</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=jursiswa" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-graduation-cap" aria-hidden="true"></i><span class="mtext">Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=jurmapel" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-book" aria-hidden="true"></i><span class="mtext">Mapel</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=jurusan" class="dropdown-toggle no-arrow">
                        <i class="micon fi-results"></i><span class="mtext">Jurusan</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=kelas" class="dropdown-toggle no-arrow">
                        <i class="micon dw dw-billboard"></i><span class="mtext">Kelas</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>

                <li>
                    <div class="sidebar-small-cap">Nilai</div>
                </li>

                <li>
                    <a href="index.php?page=rapor" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-print" aria-hidden="true"></i>
                        <span class="mtext">Cetak Raport</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=leger" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-file-excel-o" aria-hidden="true"></i>
                        <span class="mtext">Leger Nilai</span>
                    </a>
                </li>

                <?php } else if($_SESSION['status']=="guru"){ ?>

                <li>
                    <a href="index.php?page=nilai" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span class="mtext">Nilai Siswa</span>
                    </a>
                </li>

                <?php }else if($_SESSION['status']=="siswa"){ ?>

                <li>
                    <a href="index.php?page=raporsiswa" class="dropdown-toggle no-arrow">
                        <i class="micon fa fa-print" aria-hidden="true"></i>
                        <span class="mtext">Cetak Raport</span>
                    </a>
                </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>