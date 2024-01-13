<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM keperluan WHERE idKeperluan = '$id'");
    $data = $query->fetch_array();



?>
<div class="container py-5 ">
    <div class="row mt-4 ">
        <div class="container-fluid px-2 px-md-2 col-md-5 ">
            <div class="col-12 justify-content-center">
                <div class="card mb-4">
                    <div class=" mt-n3 mx-3 z-index-2 ps-1">
                        <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                            <h6 class="text-white text-center text-capitalize ">Edit Data Keperluan</h6>
                        </div>
                    </div>
                    <div class="card-body p-3 mt-3 ">
                        <section>
                            <div class="container py-4 ">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto d-flex  flex-column">
                                        <form data-toggle="validator" action="" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <?php
                                                        if ($status) {
                                                        ?>
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button class="close" type="button" data-dismiss="alert"
                                                            ariahidden="true">&times;
                                                        </button>
                                                        <h4><i class="icon fa fa-close">Gagal! </i></h4>
                                                        <?php echo $status; ?>
                                                    </div>
                                                    <?php
                                                        }
                                                        ?>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Jenis Keperluan</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Jenis Keperluan"
                                                                    type="text" name="jns_keperluan" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4"
                                                                    value="<?= $data['jns_keperluan'] ?>" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ms-4">
                                                <input type="submit" class="btn btn-primary" value="Edit" name="edit">
                                                <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['edit'])) {
        $jns_keperluan = $_POST['jns_keperluan'];


        $edit = $link->query("UPDATE keperluan SET jns_keperluan = '$jns_keperluan' WHERE idKeperluan = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_keperluan'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_keperluan'>";
        }
    }
}

    ?>