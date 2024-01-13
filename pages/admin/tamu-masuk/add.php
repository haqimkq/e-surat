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
                            <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Keperluan Tamu Masuk</h3>
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
                                                                    <select class="form-control" aria-label="Tamu" type="text" name="idTamu" required>
                                                                        <option>-- PILIH Tamu -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM  tamu");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['idTamu']; ?>">
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
                                                                    <select class="form-control" aria-label="Keperluan" type="text" name="id_keperluan" required>
                                                                        <option>-- PILIH Keperluan -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM keperluan");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['id_keperluan']; ?>">
                                                                                <?php echo
                                                                                $data['jns_keperluan']; ?>
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
                                                            <label class="form-label">Tanggal</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal" type="date" name="tanggal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Jam</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Jam" type="time" name="jam" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Keterangan</label>
                                                                    <input class="form-control" aria-label="Keterangan" type="text" name="keterangan" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Foto KTP TAMU</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto KTP Tamu" type="file" name="ktp" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
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
        $idTamu = $_POST['idTamu'];
        $idKeperluan = $_POST['idKeperluan'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedFile = $_FILES['ktp'];
            $ktp_lama = $_POST['ktp_lama'];
            if ($uploadedFile['error'] === 4) {
                $ktp = $ktp_lama;
            } else {
                $uploadedFilePath = upload($uploadedFile);
                if ($uploadedFilePath) {
                    $ktp = $uploadedFilePath;
                } else {
                    echo "Gagal mengunggah file.";
                }
            }
            echo "Data berhasil diperbarui.";
        }
        $keterangan = $_POST['keterangan'];

        $simpan = $link->query("INSERT INTO tamu_masuk VALUES (
            '', 
            '$idTamu',
            '$idKeperluan',
            '$tanggal',
            '$jam',
            '$ktp',
            '$keterangan'
            )");
        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_tamuMasuk'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_tamuMasuk'>";
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