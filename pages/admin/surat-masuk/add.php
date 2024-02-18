<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

?>

    <div class="container-fluid py-4">
        <div class="row mt-4 justify-content-center">
            <div class="col-10">
                <div class="card mb-4">
                    <div class=" position-relative mt-n4 mx-3 ps-0  ">
                        <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                            <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Surat Masuk </h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!-- <hr class="horizontal dark"> -->
                        <div class="content-wrapper">
                            <section>
                                <div class="container py-4">
                                    <div class="row">
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
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <select class="form-control" aria-label="Tamu" type="text" name="idTamuMasuk" required>
                                                                        <option>-- PILIH Tamu -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM tamu_masuk tm 
                                                                        join tamu t on t.idTamu  = tm.idTamu ");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['idTamuMasuk']; ?>">
                                                                                <?php echo
                                                                                $data['nama']; ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Nomor Surat</label>
                                                                    <input class="form-control" aria-label="Nomor Surat" type="text" name="noSurat" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Perihal</label>
                                                                    <input class="form-control" aria-label="Perihal" type="text" name="perihal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tanggal</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal" type="date" name="tanggal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>FIle Surat</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto " type="file" name="file" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <em class="text-danger text-sm text-italic">*Upload
                                                                    berkas pendukung (PDF, maksimal 2Mb)</em>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col ms-4">
                                                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
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
    </div>


<?php
    if (isset($_POST['simpan'])) {
        $idTamuMasuk = $_POST['idTamuMasuk'];
        $tanggal = $_POST['tanggal'];
        $noSurat = $_POST['noSurat'];
        $perihal = $_POST['perihal'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedsSuratFile = $_FILES['file'];

            if ($uploadedsSuratFile['error'] === 4) {
                $surat = '';
            } else {
                $uploadedsSuratFilePath = upload($uploadedsSuratFile, '../pdf/e-surat/');
                if ($uploadedsSuratFilePath) {
                    $surat = $uploadedsSuratFilePath;
                } else {
                    echo "Gagal mengunggah file surat";
                }
            }
            echo "Data berhasil diperbarui.";
        }

        $verifikasi = $_POST['verifikasi'];


        $simpan = $link->query("INSERT INTO surat_masuk VALUES (
            '', 
            '$idTamuMasuk',
            '$tanggal',
            '$noSurat',
            '$perihal',
            '$surat',
            '$verifikasi'
            )");
        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_suratMasuk'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_suratMasuk'>";
        }
    }
}


function upload($file, $targetDir)
{
    $fileName = basename($file['name']);
    $targetPath = $targetDir . $fileName;
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf', 'JPG');
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