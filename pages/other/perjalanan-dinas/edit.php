<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM perjalanan_dinas pd join pegawai p on pd.id_pegawai = p.id_pegawai  WHERE idPerjalananDinas = '$id'");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 bg-info ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 text-white">
                        Edit Data Perjalanan Dinas
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
                                    <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai" required
                                        value="<?= $data['id_pegawai'] ?>">
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Informasi Pegawai</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Nama Pegawai :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nm_pegawai"
                                                            value="<?= $data['nm_pegawai'] ?>" readonly />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">NIP :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text"
                                                            value=" <?= $data['nip'] ?> " readonly />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-uppercase text-sm">Informasi Perjalanan Dinas</p>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Tanggal Pergi :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pulang"
                                                            type="date" name="tanggalPergi" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tanggalPergi'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Tanggal Pulang :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pergi"
                                                            type="date" name="tanggalPulang" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tanggalPulang'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="text-bold">Keterangan :</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <textarea class="form-control" name="keterangan" id="keterangan"
                                                            cols="20" rows="10" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            required><?= $data['keterangan'] ?> </textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
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
        $id_pegawai = $_POST['id_pegawai'];
        $tanggalPergi = $_POST['tanggalPergi'];
        $tanggalPulang = $_POST['tanggalPulang'];
        $keterangan = $_POST['keterangan'];


        $edit = $link->query("UPDATE perjalanan_dinas SET 
id_pegawai = '$id_pegawai',
tanggalPergi = '$tanggalPergi',
tanggalPulang = '$tanggalPulang',
keterangan = '$keterangan'

WHERE idPerjalananDinas = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataPerjalananDinas'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editPerjalananDinas'>";
        }
    }
}
    ?>