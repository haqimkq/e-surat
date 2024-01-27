<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM surat_keluar sk
    JOIN tamu t ON t.idTamu = sk.idTamu WHERE idSuratKeluar = '$id'");
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
                                                        <label class="text-bold">Nama Tamu :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <select class="form-control " aria-label="Tamu " name="idTamu" required>
                                                                <?php $q = $link->query("SELECT * FROM tamu");
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
                                                    <label class="form-label">Nomor Surat</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Nomor Surat" type="text" name="noSurat" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['noSurat'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Perihal</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Perihal" type="text" name="perihal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['perihal'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">Tanggal</label>
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Tanggal" type="date" name="tanggal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['tanggal'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="input-group input-group-dynamic ">
                                                        <label class="text-bold">File Surat:</label>
                                                        <div class="input-group input-group-dynamic mb-2">
                                                            <input class="form-control" aria-label="Berkas" type="file" name="file" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <input name="file_lama" type="hidden" class="form-control input-sm" value="<?= $data['file'] ?>">
                                                        <?php
                                                        $file_lama = $data['file'];
                                                        $fileName = !empty($file_lama) ? basename($file_lama) : '';
                                                        ?>
                                                        <div class="mt-2">
                                                            <?php if (!empty($fileName)) : ?>
                                                                <strong>File Saat Ini:</strong> <?= $fileName ?>
                                                                <!-- <a href="javascript:void(0)" class="text-danger" onclick="deleteFile()"><i class="ti ti-x"></i></a> -->
                                                                <input name="file_lama" type="hidden" class="form-control input-sm" value="<?= $file_lama ?>">
                                                                <input name="deleteFile" type="hidden" value="1">
                                                            <?php else : ?>
                                                                <span>Tidak ada file yang diunggah</span>
                                                                <input name="file_lama" type="hidden" class="form-control input-sm" value="">
                                                            <?php endif; ?> <br>
                                                            <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                                (PDF, maksimal 2Mb)</em>
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
        $tanggal = $_POST['tanggal'];
        $noSurat = $_POST['noSurat'];
        $perihal = $_POST['perihal'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedFile = $_FILES['file'];
            $file_lama = $_POST['file_lama'];

            if ($uploadedFile['error'] === 4) {
                $file = $file_lama;
            } else {
                $uploadedFilePath = upload($uploadedFile, '../pdf/e-surat/');
                if ($uploadedFilePath) {
                    $file = $uploadedFilePath;
                } else {
                    echo "Gagal mengunggah file surat";
                }
            }
            echo "Data berhasil diperbarui.";
        }


        $edit = $link->query("UPDATE surat_keluar SET 
idTamu = '$idTamu',
tanggal = '$tanggal', 
noSurat = '$noSurat', 
perihal = '$perihal', 
file = '$file'

WHERE idSuratKeluar = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataSuratKeluar'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editSuratKeluar'>";
        }
    }
}




function upload($file, $targetDir)
{
    $fileName = basename($file['name']);
    $targetPath = $targetDir . $fileName;
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);
    $allowedExtensions = array('jpg', 'jpeg', 'JPG', 'png', 'pdf');
    if (in_array($fileExtension, $allowedExtensions)) {
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

    ?>