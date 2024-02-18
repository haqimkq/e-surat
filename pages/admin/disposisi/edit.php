<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT d.*, sm.*, tm.idTamuMasuk, t.nama, p.nm_pegawai
    FROM disposisi d
    JOIN surat_masuk sm ON sm.idSuratMasuk = d.idSuratMasuk
    JOIN tamu_masuk tm ON tm.idTamuMasuk = sm.idTamuMasuk
    JOIN tamu t ON t.idTamu = tm.idTamu
    JOIN pegawai p ON p.id_pegawai = d.idPegawai WHERE idDisposisi = '$id'");
    $data = $query->fetch_array();


?>

    <div class="container-fluid px-2 px-md-2">
        <div class="card card-body mx-3 mx-md-2 mt-3 ">
            <div class="row gx-4 justify-content-center">
                <div class="col-auto my-auto ">
                    <div class=" h-100 ">
                        <h5 class=" mb-1 ">
                            Edit Data Disposisi Surat
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
                                                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                            <i class="material-icons text-lg position-relative">people</i>
                                                            <span class="ms-1">DISPOSISI</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="ta" href="javascript:;" role="ta" aria-selected="false"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" name="idSuratMasuk" value="<?= $data['idSuratMasuk'] ?>" required readonly>
                                        <div class="card-body">
                                            <p class="text-uppercase text-sm">Informasi Tamu</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nama Tamu</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Nama Tamu" type="text" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['nama'] ?>" readonly>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Nomor Surat</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Perihal" type="text" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['noSurat'] ?>" readonly>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Perihal</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Tanggal" type="text" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['perihal'] ?>" readonly>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Pegawai :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control" aria-label="Pegawai" name="idPegawai" required>
                                                                <?php
                                                                $q = $link->query("SELECT p.id_pegawai, p.nm_pegawai
                                                                                FROM pegawai p");
                                                                while ($d = $q->fetch_array()) {
                                                                    if ($d['id_pegawai'] == $data['idPegawai']) {
                                                                ?>
                                                                        <option value="<?= $d['id_pegawai']; ?>" selected><?= $d['nm_pegawai'] ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?= $d['id_pegawai'] ?>"><?= $d['nm_pegawai'] ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Tanggal</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Tanggal" type="date" name="tanggal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['tanggal'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">keterangan</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="keterangan" type="text" name="keterangan" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['keterangan'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
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
        $idSuratMasuk = $_POST['idSuratMasuk'];
        $idPegawai = $_POST['idPegawai'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $verifikasi = $_POST['verifikasi'];


        $edit = $link->query("UPDATE disposisi SET 
idSuratMasuk = '$idSuratMasuk',
idPegawai = '$idPegawai', 
tanggal = '$tanggal', 
keterangan = '$keterangan',
verifikasi = '$verifikasi'

WHERE idDisposisi = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_disposisi'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_disposisi'>";
        }
    }
}
    ?>