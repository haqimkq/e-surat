<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../aev/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo "image/bjm.png" ?>">
    <title>
        Dashboard Pelayanan
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../aev/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../aev/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../../aev/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('https://images.unsplash.com/photo-1611063158871-7dd3ed4a2ac8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80');">
                                <span class="mask bg-gradient-dark border-radius-lg opacity-3"></span>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">

                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Masukkan data diri dengan benar</p>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="input-group input-group-outline mb-3">
                                            <input name="nm_lengkap" type="text" class="form-control"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input name="username" type="text" class="form-control"
                                                placeholder="Username">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input name="konfirmasi" type="password" class="form-control"
                                                placeholder="Konfirmasi Password">
                                        </div>
                                        <input type="hidden" name="level" class="form-control" value="1" required />
                                        <div class="text-center">
                                            <button name="register" type="submit"
                                                class="btn btn-lg bg-gradient-danger btn-lg w-100 mt-4 mb-0">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="/aev/index-login.php"
                                            class="text-warning text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../aev/assets/js/core/popper.min.js"></script>
    <script src="../aev/assets/js/core/bootstrap.min.js"></script>
    <script src="../aev/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../aev/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../aev/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>

<?php
include '../db/koneksi.php';

if (isset($_POST['register'])) {
    $nm_lengkap = $_POST['nm_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['konfirmasi'];
    $level = $_POST['level'];
    $result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert ('username sudah terdaftar!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=signup-pegawai.php'>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
            </script>";
        echo "<meta http-equiv='refresh' content='0; url=signup-pegawai.php'>";
        return false;
    }
    $pass = md5($password);


    $simpan = $link->query("INSERT INTO users (nm_lengkap, username, password, level) VALUES ('$nm_lengkap','$username', '$pass', '$level')");

    if ($simpan) {
        echo "<script>alert('Data berhasil disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=signup-pegawai.php'>";
    }
}
?>