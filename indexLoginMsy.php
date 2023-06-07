<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="apple-touch-icon" sizes="76x76" href="../aev/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../aev/assets/image/">

    <title>AEVAR TECH</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="../aev/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../aev/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />

    <!-- CSS Files -->

    <link id="pagestyle" href="/aev/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://i.pinimg.com/originals/59/53/2b/59532bc48a22c946029bd5a7b7b0f555.jpg');">

            <span class="mask bg-gradient-dark opacity-6"></span>
            <nav class="social">
                <ul>
                    <li><a target="_blank" href="https://twitter.com/f_besar"> Twitter <i class="fa fa-twitter "></i>
                        </a></li>
                    <li><a target="_blank" href="https://instagram.com">Instagram <i class=" fa fa-instagram"></i></a>
                    </li>
                    <li><a target="_blank" href="https://google.com">Gmail <i class="fa fa-google"></i></a></li>
                </ul>
            </nav>
            <div class="container my-auto">

                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="cardd z-index-0 fadeIn3 fadeInBottom">
                            <div class=" p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-info border-radius-lg py-3 pe-1">
                                    <div style="text-align: center;">
                                        <img src="<?php echo "image/bjm.png" ?>" width="150px" height="170px"
                                            alt="Logo">
                                    </div>
                                    <div class="row mt-0 text-center">
                                        <h4 class="text-white font-weight-bolder text-center mt-3 ">
                                            Pelayanan Terpadu </h4>
                                        <h6 class="text-white font-weight-bolder text-center ">Kecamatan
                                            Banjarmasin Timur</h6>
                                        <!-- <h6 class="text-white font-weight-bolder text-center mt-2 mb-0"> DASHBOARD FOR YOUR BUSINESS </h6> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="text-white font-weight-bolder text-center mt-2 mb-0 text-uppercase">LOGIN
                                </h6>
                                <form action="db/cek_login.php" method="post">
                                    <div class=" input-group input-group-outline my-3">
                                        <input name="username" type="text " class="form-control text-light"
                                            placeholder="Username">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input name="password" type="password" class="form-control text-light"
                                            placeholder="Password">
                                    </div>

                                    <div class="text-center">
                                        <button name="log" type="submit"
                                            class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                    <p class="text-white mt-4 text-sm text-center">
                                        <a href="index.php" class="text-warning text-gradient font-weight-bold">Kembali
                                            Ke Portal Berita</a>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                document.write(new Date().getFullYear())
                                </script></i> by.
                                AEVAR | Your patner DevTech.
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="" class="nav-link text-white" target="_blank">Let's build your ideas
                                        together with us.</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../dashfix/assets/js/core/popper.min.js"></script>
    <script src="../dashfix/assets/js/core/bootstrap.min.js"></script>
    <script src="../dashfix/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../dashfix/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="../dashfix/assets/js/material-dashboard.min.js?v=3.0.4"></script>


</body>

</html>