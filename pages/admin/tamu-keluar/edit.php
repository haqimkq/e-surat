<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM tamu_keluar tk 
    join tamu t on t.idTamu  = tk.idTamu
    join keperluan k on k.idKeperluan  = tk.idKeperluan
    WHERE idTamuKeluar = '$id'");
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
                                                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                            <i class="material-icons text-lg position-relative">people</i>
                                                            <span class="ms-1">Profile</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="ta" href="javascript:;" role="ta" aria-selected="false"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <p class="text-uppercase text-sm">Informasi Tamu</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Nama :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control " aria-label="Tamu" name="idTamu" required>
                                                                <?php $q = $link->query("SELECT * FROM tamu ");
                                                                while ($d =
                                                                    $q->fetch_array()
                                                                ) {
                                                                    if ($d['idTamu'] == $data['idTamu']) { ?>
                                                                        <option value="<?= $d['idTamu']; ?>" selected="<?= $d['idTamu']; ?>">
                                                                            <?= $d['nama'] ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?= $d['idTamu'] ?>">
                                                                            <?= $d['nama'] ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Keperluan :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control " aria-label="Keperluan" name="idKeperluan" required>
                                                                <?php $q = $link->query("SELECT * FROM keperluan ");
                                                                while ($d =
                                                                    $q->fetch_array()
                                                                ) {
                                                                    if ($d['idKeperluan'] == $data['idKeperluan']) { ?>
                                                                        <option value="<?= $d['idKeperluan']; ?>" selected="<?= $d['idKeperluan']; ?>">
                                                                            <?= $d['jns_keperluan'] ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?= $d['idKeperluan'] ?>">
                                                                            <?= $d['jns_keperluan'] ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Keterangan :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" type="text" name="keterangan" value="<?= $data['keterangan'] ?>" />
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Tanggal :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" type="date" name="tanggal" value="<?= $data['tanggal'] ?>" />
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Jam :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" type="time" name="jam" value="<?= $data['jam'] ?>" />
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
        $idTamu = $_POST['idTamu'];
        $idKeperluan = $_POST['idKeperluan'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $keterangan = $_POST['keterangan'];


        $edit = $link->query("UPDATE tamu_keluar SET 
idTamu = '$idTamu',
idKeperluan = '$idKeperluan',
tanggal = '$tanggal', 
jam = '$jam', 
keterangan = '$keterangan'

WHERE idTamuKeluar = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_tamuKeluar'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_tamuKeluar'>";
        }
    }
}



function upload($file)
{
    // Tentukan folder penyimpanan file
    $targetDir = '../img/';

    // Mendapatkan nama file asli
    $fileName = basename($file['name']);

    // Mendapatkan path file tujuan
    $targetPath = $targetDir . $fileName;

    // Mendapatkan ekstensi file
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);

    // Daftar ekstensi file yang diperbolehkan
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'JPG');

    // Cek apakah ekstensi file valid
    if (in_array($fileExtension, $allowedExtensions)) {
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            // Jika berhasil diunggah, kembalikan path file
            return $targetPath;
        } else {
            // Jika gagal mengunggah
            return false;
        }
    } else {
        // Jika ekstensi file tidak valid
        return false;
    }
}

    ?>