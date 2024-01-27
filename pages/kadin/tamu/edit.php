<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM tamu WHERE idTamu = '$id'");
    $data = $query->fetch_array();

?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 ">
                        Edit Data Tamu
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class=" container-fluid py-4"> -->
    <div class="container py-3 ">
        <section>
            <div class="col-lg-12 mx-auto d-flex justify-content-center flex-column">
                <form data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <?php
                                if ($status) {
                                ?>

                            <div class="alert alert-danger alert-dismissible">
                                <button class="close" type="button" data-dismiss="alert" ariahidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-close">Gagal! </i></h4>
                                <?php echo $status; ?>
                            </div>
                            <?php
                                }
                                ?>
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="col-lg-4 ms-sm-auto  mt-4">
                                        <div class="nav-wrapper position-relative end-7">
                                            <ul class="nav  nav-pills nav-fill p-2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab"
                                                        href="javascript:;" role="tab" aria-selected="true">
                                                        <i class="material-icons text-lg position-relative">people</i>
                                                        <span class="ms-1">Profile</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="ta"
                                                        href="javascript:;" role="ta" aria-selected="false"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Informasi Tamu</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Nama Lengkap :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nama"
                                                            value="<?= $data['nama'] ?>" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">NIK :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nik"
                                                            value=" <?= $data['nik'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Alamat :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="alamat"
                                                            value=" <?= $data['alamat'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Telepon :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="tlp"
                                                            value=" <?= $data['tlp'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Jenis Kelamin :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <select name="jk" class="form-control">
                                                            <option value="Laki-Laki" <?php if ($data['jk'] == 'Laki-Laki') {
                                                                                                echo "selected";
                                                                                            } ?>>Laki-Laki
                                                            </option>
                                                            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') {
                                                                                                echo "selected";
                                                                                            } ?>>Perempuan
                                                            </option>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary" value="Edit" name="edit">
                                                <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <?php
    if (isset($_POST['edit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];
        $tlp = $_POST['tlp'];


        $edit = $link->query("UPDATE tamu SET 
nik = '$nik', 
nama = '$nama', 
alamat = '$alamat',
jk = '$jk',
tlp = '$tlp'

WHERE idTamu = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=datatamu'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edittamu'>";
        }
    }
}


    ?>