<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_SESSION['id_user'];
    $query = mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
    $data = $query->fetch_array();

?>

<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1611063158871-7dd3ed4a2ac8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80');">
        <span class="mask  bg-gradient-aev  opacity-3"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $data['nm_pegawai'] ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Sekretaris
                    </p>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                role="tab" aria-selected="true">
                                <i class="material-icons text-lg position-relative">home</i>
                                <span class="ms-1">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                aria-selected="false">
                                <i class="material-icons text-lg position-relative">email</i>
                                <span class="ms-1">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                aria-selected="false">
                                <i class="material-icons text-lg position-relative">settings</i>
                                <span class="ms-1">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="col-lg-4 ms-sm-auto  mt-4">
                        <div class="nav-wrapper position-relative end-7">
                            <ul class="nav  nav-pills nav-fill p-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">people</i>
                                        <span class="ms-1">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="ta" href="javascript:;"
                                        role="ta" aria-selected="false">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Informasi Lengkap</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Nama Lengkap :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['nm_pegawai'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">NIP : </label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value=" " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Jabatan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Golongan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tanggal Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="date" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tempat Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Username :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['nm_pegawai'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Password :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="1q22W$#@ER45&" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="horizontal dark"> -->
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Alamat Lengkap</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">No Telepon</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Email</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Golongan</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">About me</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">About me</label>
                                    <input class="form-control" type="text"
                                        value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="/aev/image/art.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="../assets/img/bruce-mars.jpg"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">22</span>
                                        <span class="text-sm opacity-8">Friends</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">10</span>
                                        <span class="text-sm opacity-8">Photos</span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">89</span>
                                        <span class="text-sm opacity-8">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                Mark Davis<span class="font-weight-light">, 35</span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim
                                Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>