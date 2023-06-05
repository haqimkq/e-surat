<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM masyarakat WHERE id_msy = '$id'");
    $data = $query->fetch_array();


?>

<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://i.ytimg.com/vi/bd4ENPsn8BI/maxresdefault.jpg');">
        <span class="mask  bg-gradient-aev  opacity-3"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="<?php echo "../image/bjm.png" ?>" alt="profile_image" class="w-100 pt-3">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $data['nama'] ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">Masyarakat
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
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
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Nama Lengkap :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="<?= $data['nama'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">NIK : </label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value=" <?= $data['no_ktp'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tanggal Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" readonly value="<?= $data['tgl_lhr'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tempat Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['tmpt_lhr'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Jenis Kelamin :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly value="<?= $data['jk'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">agama :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['agama'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">No Telepon</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['no_tlp'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Alamat Lengkap</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['alamat'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
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