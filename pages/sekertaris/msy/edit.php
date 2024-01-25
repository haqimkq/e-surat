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

<div class="container-fluid px-2 px-md-2 col-md-11">
    <div class="card card-body mx-3 mx-md-2 mt-3 ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 ">
                        Edit Data Masyarakat
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
                            <div class="card ">
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Informasi Lengkap</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">Nama Lengkap :</label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" type="text" name="nama"
                                                        data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                                        required value="<?= $data['nama'] ?>" />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">NIK : </label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" type="text" name="no_ktp"
                                                        data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                                        required value=" <?= $data['no_ktp'] ?> " />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">Tanggal Lahir :</label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" aria-label="Tanggal Lahir" type="date"
                                                        name="tgl_lhr" data-minlength="4"
                                                        data-error="Tidak Boleh Kurang dari 4" required
                                                        value="<?= $data['tgl_lhr'] ?>">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">Tempat Lahir :</label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" type="text" name="tmpt_lhr"
                                                        data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                                        required value="<?= $data['tmpt_lhr'] ?> " />
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
                                        <div class="col-md-4">
                                            <label class="text-bold">Agama :</label>
                                            <div class="input-group input-group-dynamic">
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" aria-label="agama" type="text"
                                                        name="agama" data-minlength="4"
                                                        data-error="Tidak Boleh Kurang dari 4"
                                                        value="<?= $data['agama'] ?>" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">No Telepon</label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" type="text" name="no_tlp"
                                                        data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                                        required value="<?= $data['no_tlp'] ?> " />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-dynamic">
                                                <label class="text-bold">Alamat:</label>
                                                <div class="input-group input-group-dynamic mb-4">
                                                    <input class="form-control" aria-label="alamat" type="text"
                                                        name="alamat" data-minlength="4"
                                                        data-error="Tidak Boleh Kurang dari 4" required
                                                        value="<?= $data['alamat'] ?>">
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
                </form>
            </div>
        </section>
    </div>

    <?php
    if (isset($_POST['edit'])) {
        $noKtp = $_POST['no_ktp'];
        $namaMsy = $_POST['nama'];
        $tempatLahir = $_POST['tmpt_lhr'];
        $tglLahir = $_POST['tgl_lhr'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $jenisKelamin = $_POST['jk'];
        $noTelepon = $_POST['no_tlp'];


        $edit = $link->query("UPDATE masyarakat SET 
no_ktp = '$noKtp', 
nama = '$namaMsy', 
tmpt_lhr = '$tempatLahir',
tgl_lhr = '$tglLahir',
alamat = '$alamat',
agama = '$agama',
jk = '$jenisKelamin',
no_tlp = '$noTelepon'

WHERE id_msy = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataMasyarakat'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editMasyarakat'>";
        }
    }
}

    ?>