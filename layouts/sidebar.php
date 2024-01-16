<body class="g-sidenav-show bg-gray-200 ">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <?php $level = $_SESSION['level'];
        if ($level == 0) {
            $years = range(
                2000,
                strftime("%Y", time())
            ); ?>
        <div class="sidenav-header mb-4 text-center ">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand" href="" target="_blank">
                <img src="https://1.bp.blogspot.com/-x0XnjY4pIlY/W6XY0lAU3xI/AAAAAAAAD3o/JmngsUDBWVc2n_oijzaCpC8Vq1OPeLU9QCEwYBhgL/s1600/dishub%2Bpng.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class=" font-weight-bold  text-white ms-2 text-center ">
                    E - SURAT<br>
                    <i class="ms-1">
                    Dinas Perhubungan Provinsi <br> Kalimantan Selatan</i>
                </span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2 " />
        <div class="text-light text-center mb-2">
            <?php include "../db/koneksi.php";
                $id = $_SESSION['id_user'];
                $query =
                    mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
                $data =
                    $query->fetch_array(); ?>
            <span class="ms-1 text-black"><?= $data['nm_lengkap'] ?></span>
        </div>
        <hr class="horizontal light mt-0 mb-2 nav-link-text text-center ms-1" />

        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="home.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-master">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">art_track</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Master</span>
                    </a>
                    <div class="collapse" id="data-master">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="nav-link text-white" href="?page=data_user">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">people</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Users</span>
                                </a>
                                
                                <a class="nav-link text-white " href="?page=data_jabatan">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">library_books</i>
                                    </div>
                                    
                                    <span class="nav-link-text ms-1"> Jabatan</span>
                                </a>
                                <a class="nav-link text-white " href="?page=data_pegawai">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10"><span class="material-symbols-outlined">diversity_3</span></i>
                                    </div>
                                    <span class="nav-link-text ms-1"> Pegawai</span>
                                </a>
                                <a class="nav-link text-white " href="?page=data_keperluan">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">assignment_ind</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Jenis Keperluan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?page=data_tamu">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group_add</i>
                        </div>
                        <span class="nav-link-text ms-1">Tamu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-keperluan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">contacts</i>
                        </div>
                        <span class="nav-link-text ms-1">Keperluan</span>
                    </a>
                    <div class="collapse" id="data-keperluan">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="nav-link text-white " href="?page=data_tamuMasuk">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">rotate_right</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Tamu Masuk</span>
                                </a>
                                <a class="nav-link text-white " href="?page=data_tamuKeluar">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">rotate_left</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Tamu Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-pelayanan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">border_color</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Surat</span>
                    </a>
                    <div class="collapse" id="data-pelayanan">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="nav-link text-white " href="?page=data_suratMasuk">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">skip_next</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Surat Masuk</span>
                                </a>
                                <a class="nav-link text-white " href="?page=data_disposisi">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">compare_arrows</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Disposisi Surat</span>
                                </a>
                                <a class="nav-link text-white " href="?page=data_suratKeluar">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">skip_previous</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Surat Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-bs-toggle="collapse" data-bs-target="#laporan-laporan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">library_books</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                    <div class="collapse" id="laporan-laporan">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li class="nav-item">
                                <a class="nav-link text-white ">
                                    <div class="text-white me-2 d-flex " type="button" class="btn bg-gradient-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                        <i class="material-icons opacity-10">turned_in_not</i>
                                        <span class="nav-link-text ms-3">Surat Masuk</span>
                                    </div>
                                </a>
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Laporan Surat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" target="_blank" action="../laporan/l_spn.php">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label>Dari Tanggal</label>
                                                            <input type="date" class="form-control" name="tgl1"
                                                                required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Sampai Tanggal</label>
                                                            <input type="date" class="form-control" name="tgl2"
                                                                required>
                                                        </div>
                                                        <div class="col-md-4" style="margin-top: 31px;">
                                                            <button align="center" type="submit" name="cetak1"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <div class="form-group text-center">
                                                    <a href="../laporan/l_spn.php" target="_blank"
                                                        class="btn btn-info btn-md">
                                                        <i class="fa fa-print"></i>
                                                        Cetak Semua</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <main class="main-content border-radius-lg">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            index
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">index</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <ul class="navbar-nav justify-content-end">

                        <li class="nav-item d-flex align-items-center">
                            <a href="../logout.php" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-close me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                        <li class="nav-item d-flex ps-3 align-items-center">
                            <a href="?page=data_profile" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="/aev/assets/img/team-2.jpg" class="avatar avatar-sm me-3" />
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span>
                                                    from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="/aev/assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark me-3" />
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span>
                                                    by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <?php
        }
    ?>

        <!-- Bagian Pegawai -->
        <?php $level = $_SESSION['level'];
    if ($level == 1) {
        $years = range(
            2000,
            strftime("%Y", time())
        ); ?>
        <div class="sidenav-header mb-4 text-center ">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand" href="" target="_blank">
                <img src="https://1.bp.blogspot.com/-x0XnjY4pIlY/W6XY0lAU3xI/AAAAAAAAD3o/JmngsUDBWVc2n_oijzaCpC8Vq1OPeLU9QCEwYBhgL/s1600/dishub%2Bpng.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class=" font-weight-bold  text-white ms-1 text-center ">
                    E-Surat<br>
                    <i class="ms-1">
                    Dinas Perhubungan Provinsi <br> Kalimantan Selatan</i>
                </span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2 " />
        <div class="text-light text-center mb-2">
            <?php include "../db/koneksi.php";
            $id = $_SESSION['id_user'];
            $query =
                mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
            $data =
                $query->fetch_array(); ?>
            <span class="ms-1 text-black"><?= $data['nm_lengkap'] ?></span>
        </div>
        <hr class="horizontal light mt-0 mb-2 nav-link-text text-center ms-1" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="home.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-master">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">square</i>
                        </div>
                        <span class="nav-link-text ms-1">Data Kepegawaian</span>
                    </a>
                    <div class="collapse" id="data-master">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li>
                                <a class="nav-link text-white " href="?page=dataUser">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">people</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Users</span>
                                </a>
                                <a class="nav-link text-white " href="?page=dataPegawai">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">people</i>
                                    </div>
                                    <span class="nav-link-text ms-1">Data Pribadi</span>
                                </a>
                                
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- <div class="row align-items-center justify-content-start mt-8 px-3">
            <div class="col-lg-12 mb-lg-2 ">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                    document.write(new Date().getFullYear())
                    </script></i> by
                    Annisa Yuliani | Skripsi Pelayanan.
                </div>
            </div>
        </div> -->
        </aside>

        <main class="main-content border-radius-lg">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                data-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                index
                            </li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">index</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <label class="form-label">Type here...</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <ul class="navbar-nav justify-content-end">

                            <li class="nav-item d-flex align-items-center">
                                <a href="../logout.php" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-close me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Logout</span>
                                </a>
                            </li>
                            <li class="nav-item d-flex ps-3 align-items-center">
                                <a href="?page=data_profile" class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa fa-user me-sm-1"></i>
                                    <span class="d-sm-inline d-none">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="/aev/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3" />
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span>
                                                        from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="/aev/assets/img/small-logos/logo-spotify.svg"
                                                        class="avatar avatar-sm bg-gradient-dark me-3" />
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New album</span>
                                                        by Travis Scott
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        1 day
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>credit-card</title>
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(-2169.000000, -745.000000)"
                                                                fill="#FFFFFF" fill-rule="nonzero">
                                                                <g transform="translate(1716.000000, 291.000000)">
                                                                    <g transform="translate(453.000000, 454.000000)">
                                                                        <path class="color-background"
                                                                            d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                            opacity="0.593633743"></path>
                                                                        <path class="color-background"
                                                                            d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        Payment successfully completed
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0">
                                                        <i class="fa fa-clock me-1"></i>
                                                        2 days
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
    }
        ?>

            <!-- Bagian Masyarakat -->
            <?php $level = $_SESSION['level'];
        if ($level == 2) {
            $years = range(
                2000,
                strftime("%Y", time())
            ); ?>
            <div class="sidenav-header mb-2">
                <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                    aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand" href="" target="_blank">
                    <img src="<?php echo "
                    ../image/bjm.png" ?>" class="navbar-brand-img h-100" alt="main_logo" />
                    <span class=" font-weight-bold  text-white ms-3 ">
                        Pelayanan Terpadu<br>
                        <i class="ms-2">
                            Kecamatan Banjarmasin Timur</i>
                    </span>
                </a>
            </div>
            <hr class="horizontal light mt-0 mb-2 " />
            <div class="text-light text-center mb-2">
                <?php include "../db/koneksi.php";
                $id = $_SESSION['id_user'];
                $query =
                    mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
                $data =
                    $query->fetch_array(); ?>
                <span class="ms-1 text-black"><?= $data['nm_lengkap'] ?></span>
            </div>
            <hr class="horizontal light mt-0 mb-2 nav-link-text text-center ms-1" />
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="home.php">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">dashboard</i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-master">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">square</i>
                            </div>
                            <span class="nav-link-text ms-1">Permintaan Pelayanan</span>
                        </a>
                        <div class="collapse" id="data-master">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a class="nav-link text-white " href="?page=dataSusunanKeluarga">
                                        <div
                                            class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">assignment</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Legalisasi
                                            <br>
                                            Susunan Keluarga</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-white " href="?page=dataDispensasiNikah">
                                        <div
                                            class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">assignment</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Rekomendasi Dispensasi
                                            <br>
                                            Nikah</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-white " href="?page=dataSktm">
                                        <div
                                            class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">assignment</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Legalisasi Surat
                                            <br>
                                            Keterangan Tidak Mampu</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-white " href="?page=dataSuratPengantarNikah">
                                        <div
                                            class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">assignment</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Legalisasi Surat
                                            <br>
                                            Pengantar Nikah</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link text-white " href="?page=dataProposal">
                                        <div
                                            class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">assignment</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Legalisasi Proposal</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?page=dataMasyarakat">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">group_add</i>
                            </div>
                            <span class="nav-link-text ms-1">Data Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?page=dataKinerjaKecamatan">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">beenhere</i>
                            </div>
                            <span class="nav-link-text ms-1">Penilaian
                                <br>
                                Pelayanan Kecamatan</span>
                        </a>
                    </li>
                </ul>
            </div>
            </aside>

            <main class="main-content border-radius-lg">
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                    data-scroll="true">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                <li class="breadcrumb-item text-sm">
                                    <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                                </li>
                                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                    index
                                </li>
                            </ol>
                            <h6 class="font-weight-bolder mb-0">index</h6>
                        </nav>
                        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Type here...</label>
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <ul class="navbar-nav justify-content-end">

                                <li class="nav-item d-flex align-items-center">
                                    <a href="../logout.php" class="nav-link text-body font-weight-bold px-0">
                                        <i class="fa fa-close me-sm-1"></i>
                                        <span class="d-sm-inline d-none">Logout</span>
                                    </a>
                                </li>
                                <li class="nav-item d-flex ps-3 align-items-center">
                                    <a href="?page=detailMasyarakat" class="nav-link text-body font-weight-bold px-0">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item dropdown pe-2 ps-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bell cursor-pointer"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="/aev/assets/img/team-2.jpg"
                                                            class="avatar avatar-sm me-3" />
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">New message</span>
                                                            from Laur
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            13 minutes ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="/aev/assets/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm bg-gradient-dark me-3" />
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">New album</span>
                                                            by Travis Scott
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            1 day
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                        <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <title>credit-card</title>
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <g transform="translate(-2169.000000, -745.000000)"
                                                                    fill="#FFFFFF" fill-rule="nonzero">
                                                                    <g transform="translate(1716.000000, 291.000000)">
                                                                        <g
                                                                            transform="translate(453.000000, 454.000000)">
                                                                            <path class="color-background"
                                                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                                opacity="0.593633743"></path>
                                                                            <path class="color-background"
                                                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            Payment successfully completed
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            2 days
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <?php
        }
            ?>

                <!-- START DASHBOARD CAMAT -->
                <?php $level = $_SESSION['level'];
            if ($level == 3) {
                $years = range(
                    2000,
                    strftime("%Y", time())
                ); ?>
                <div class="sidenav-header mb-2">
                    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                        aria-hidden="true" id="iconSidenav"></i>
                    <a class="navbar-brand" href="" target="_blank">
                        <img src="<?php echo "
                    ../image/bjm.png" ?>" class="navbar-brand-img h-100" alt="main_logo" />
                        <span class=" font-weight-bold  text-white ms-3 ">
                            Pelayanan Terpadu<br>
                            <i class="ms-2">
                                Kecamatan Banjarmasin Timur</i>
                        </span>
                    </a>
                </div>
                <hr class="horizontal light mt-0 mb-2 " />
                <div class="text-light text-center mb-2">
                    <?php include "../db/koneksi.php";
                    $id = $_SESSION['id_user'];
                    $query =
                        mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
                    $data =
                        $query->fetch_array(); ?>
                    <span class="ms-1 text-black"><?= $data['username'] ?></span>
                </div>
                <hr class="horizontal light mt-0 mb-2 nav-link-text text-center ms-1" />

                <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">dashboard</i>
                                </div>
                                <span class="nav-link-text ms-1">Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#data-master">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">square</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Master</span>
                            </a>
                            <div class="collapse" id="data-master">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a class="nav-link text-white " href="?page=data_user">
                                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">people</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Users</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=data_golongan">
                                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Data Golongan</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=data_jabatan">
                                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Data Jabatan</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=data_pegawai">
                                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment_ind</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Data Pegawai</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="" data-bs-toggle="collapse" data-bs-target="#qrcode">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">square</i>
                                </div>
                                <span class="nav-link-text ms-1">QR CODE</span>
                            </a>
                            <div class="collapse" id="qrcode">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a class="nav-link text-white " href="?page=qrCodeProposal">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Proposal</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white " href="?page=qrCodeSktm">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi SKTM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white " href="?page=qrCodeSpn">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Pengantar Nikah</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white " href="?page=qrCodeSk">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Susunan Keluarga </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white " href="?page=qrCodeRdn">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Rekomendasi <br> Dispensasi
                                                Nikah
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="" data-bs-toggle="collapse"
                                data-bs-target="#data-pelayanan">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">announcement</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Pelayanan</span>
                            </a>
                            <div class="collapse" id="data-pelayanan">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a class="nav-link text-white " href="?page=dSusunanKeluarga">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Susunan Keluarga</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=dDispensasiNikah">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Rekomendasi Dispensasi
                                                <br>
                                                Nikah</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=dSktm">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Surat
                                                <br>
                                                Keterangan Tidak Mampu</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=dPengantarNikah">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Surat
                                                <br>
                                                Pengantar Nikah</span>
                                        </a>
                                        <a class="nav-link text-white " href="?page=dProposal">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">assignment</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Legalisasi Proposal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="" data-bs-toggle="collapse"
                                data-bs-target="#data-penilaian">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">insert_chart</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Penilaian</span>
                            </a>
                            <div class="collapse" id="data-penilaian">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a class="nav-link text-white " href="?page=dKinerjaPegawai">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">beenhere</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Penilai Kinerja Pegawai</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white " href="?page=data_kinerjaKecamatan">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">beenhere</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Penilai Kinerja Pelayanan
                                                <br>
                                                Kecamatan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="?page=data_masyarakat">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">group_add</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Masyarakat</span>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="?page=data_berita">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">fiber_new</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Portal Berita</span>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="" data-bs-toggle="collapse"
                                data-bs-target="#data-perjalanandinas">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">directions_car</i>
                                </div>
                                <span class="nav-link-text ms-1">Data Perjalanan Dinas</span>
                            </a>
                            <div class="collapse" id="data-perjalanandinas">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li>
                                        <a class="nav-link text-white " href="?page=data_suratPerjalananDinas">
                                            <div
                                                class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                                <i class="material-icons opacity-10">beenhere</i>
                                            </div>
                                            <span class="nav-link-text ms-1">Surat Perintah Tugas </span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link text-white" href="?page=data_perjalananDinas">
                                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">directions_car</i>
                                        </div>
                                        <span class="nav-link-text ms-1">Data Perjalana <br> Dinas Pegawai</span>
                                    </a>
                                </li> -->
                                </ul>
                            </div>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" data-bs-toggle="collapse"
                                data-bs-target="#laporan-laporan">
                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">book</i>
                                </div>
                                <span class="nav-link-text ms-1">Laporan-Laporan</span>
                            </a>
                            <div class="collapse" id="laporan-laporan">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal1">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Surat
                                                    <br>
                                                    Pengantar Nikah</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Surat
                                                            Pengantar
                                                            Nikah</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_spn.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak1"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_spn.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal2">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Legalisasi
                                                    <br>
                                                    Surat Keterangan Tidak
                                                    <br>
                                                    Mampu</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan
                                                            Legalisasi Surat
                                                            Keterangan Tidak Mampu</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_sktm.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak2"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_sktm.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal3">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Legalisasi
                                                    <br>
                                                    Susunan Keluarga</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan
                                                            Legalisasi
                                                            Susunan Keluarga</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_sk.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak3"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_sk.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal4">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Rekomendasi
                                                    <br>
                                                    Dispensasi Nikah</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan
                                                            Rekomendasi
                                                            Dispensasi Nikah</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_rdn.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak4"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_rdn.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal5">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Legalisasi Proposal</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan
                                                            Legalisasi
                                                            Proposal</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_lp.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak5"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_lp.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal6">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Berita
                                                    <br>
                                                    Kegiatan Kecamatan</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Berita
                                                            Kegiatan
                                                            Kecamatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_news.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak6"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_news.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex " type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal7">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Data Diri
                                                    <br>
                                                    Masyarakat</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Data
                                                            Pribadi
                                                            Masyarakat</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_msy.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex" type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal8">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Data Kinerja
                                                    <br>
                                                    Pelayanan Kecamatan</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal8" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Kinerja
                                                            Pelayanan
                                                            Kecamatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_KinerjaKec.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak8"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_KinerjaKec.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex" type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal9">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Data
                                                    <br>
                                                    Kinerja Pegawai</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal9" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan Kinerja
                                                            Pegawai
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_KinerjaPegawai.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak9"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_KinerjaPegawai.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white ">
                                            <div class="text-white me-2 d-flex" type="button"
                                                class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal10">
                                                <i class="material-icons opacity-10">print</i>
                                                <span class="nav-link-text ms-1">Laporan Data
                                                    <br>
                                                    Perjalanan Dinas</span>
                                            </div>
                                        </a>
                                        <div class="modal fade" id="exampleModal10" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabe4" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Laporan
                                                            Perjalanan DInas
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" target="_blank"
                                                            action="../laporan/l_PerjalananDinas.php">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Dari Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl1"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Sampai Tanggal</label>
                                                                    <input type="date" class="form-control" name="tgl2"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top: 31px;">
                                                                    <button align="center" type="submit" name="cetak10"
                                                                        class="btn btn-info btn-md">
                                                                        <i class="fa fa-print"></i>
                                                                        Cetak</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <div class="form-group text-center">
                                                            <a href="../laporan/l_PerjalananDinas.php" target="_blank"
                                                                class="btn btn-info btn-md">
                                                                <i class="fa fa-print"></i>
                                                                Cetak Semua</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </aside>

                <main class="main-content border-radius-lg">
                    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
                        id="navbarBlur" data-scroll="true">
                        <div class="container-fluid py-1 px-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                                    <li class="breadcrumb-item text-sm">
                                        <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                        index
                                    </li>
                                </ol>
                                <h6 class="font-weight-bolder mb-0">index</h6>
                            </nav>
                            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                        <label class="form-label">Type here...</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <ul class="navbar-nav justify-content-end">

                                    <li class="nav-item d-flex align-items-center">
                                        <a href="../logout.php" class="nav-link text-body font-weight-bold px-0">
                                            <i class="fa fa-close me-sm-1"></i>
                                            <span class="d-sm-inline d-none">Logout</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item d-flex ps-3 align-items-center">
                                        <a href="?page=data_profile" class="nav-link text-body font-weight-bold px-0">
                                            <i class="fa fa-user me-sm-1"></i>
                                            <span class="d-sm-inline d-none">Profile</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                            <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown pe-2 ps-3 d-flex align-items-center">
                                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-bell cursor-pointer"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                            aria-labelledby="dropdownMenuButton">
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                                    <div class="d-flex py-1">
                                                        <div class="my-auto">
                                                            <img src="/aev/assets/img/team-2.jpg"
                                                                class="avatar avatar-sm me-3" />
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">New message</span>
                                                                from Laur
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <i class="fa fa-clock me-1"></i>
                                                                13 minutes ago
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mb-2">
                                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                                    <div class="d-flex py-1">
                                                        <div class="my-auto">
                                                            <img src="/aev/assets/img/small-logos/logo-spotify.svg"
                                                                class="avatar avatar-sm bg-gradient-dark me-3" />
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">New album</span>
                                                                by Travis Scott
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <i class="fa fa-clock me-1"></i>
                                                                1 day
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                                    <div class="d-flex py-1">
                                                        <div
                                                            class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                            <svg width="12px" height="12px" viewBox="0 0 43 36"
                                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                <title>credit-card</title>
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <g transform="translate(-2169.000000, -745.000000)"
                                                                        fill="#FFFFFF" fill-rule="nonzero">
                                                                        <g
                                                                            transform="translate(1716.000000, 291.000000)">
                                                                            <g
                                                                                transform="translate(453.000000, 454.000000)">
                                                                                <path class="color-background"
                                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                                    opacity="0.593633743"></path>
                                                                                <path class="color-background"
                                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                                </path>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                Payment successfully completed
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <i class="fa fa-clock me-1"></i>
                                                                2 days
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                    <?php
            }
                ?>