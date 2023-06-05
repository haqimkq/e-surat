<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM pegawai p join jabatan j on j.id_jabatan = p.id_jabatan join golongan g on p.id_golongan = g.id_golongan WHERE id_pegawai = '$id'");
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
                        <?= $data['nm_pegawai'] ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <?= $data['nm_jabatan'] ?>
                    </p>
                </div>
            </div>
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
                                        <input class="form-control" type="text" readonly
                                            value=" <?= $data['nip'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Golongan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['nm_golongan'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Jabatan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value=" <?= $data['nm_jabatan'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tanggal Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" readonly value="<?= $data['tgl_lahir'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tempat Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['tmpt_lahir'] ?> " />
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
                                    <label class="text-bold">Status :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['status'] ?> " />
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
                                            value="<?= $data['alamat'] ?> " />
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
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Email</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['email'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Instagram</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" readonly
                                            value="<?= $data['instagram'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="https://i.pinimg.com/originals/6c/2d/fb/6c2dfbaad8570f79f7f3ee4ab13fe42a.jpg"
                        alt="Image placeholder" class="card-img-top ">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="<?php echo "../img/$data[foto]" ?>"
                                        class="rounded-circle img-fluid border border-2 border-white ">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                <?= $data['nm_pegawai'] ?> <span class="font-weight-light">,<?php $lahir = new DateTime($data['tgl_lahir']);
                                                                                                $today = new DateTime();
                                                                                                $umur = $today->diff($lahir);
                                                                                                echo $umur->y;
                                                                                                echo " Tahun. ";
                                                                                                ?>
                                </span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <span class="font-weight-light"><?= $data['alamat'] ?> </span>
                            </div>
                            <div class="h6 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i> <?= $data['email'] ?> -
                                <?= $data['instagram'] ?>
                            </div>
                            <div>
                                <i class="text-bold"></i>PELAYANAN ADMINISTRASI TERPADU KECAMATAN
                                BANJARMASIN TIMUR
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