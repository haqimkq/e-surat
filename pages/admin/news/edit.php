<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM news WHERE idNews = '$id' ");
    $data = $query->fetch_array();



?>

<div class="container-fluid py-4">
    <div class="row mt-4 justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class=" position-relative mt-n4 mx-3 ps-0  ">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h3 class=" text-white text-capitalize text-center py-1 ">Edit Data Portal Berita</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!-- <hr class="horizontal dark"> -->
                    <div class="content-wrapper">
                        <section>
                            <div class="container py-4">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto d-flex justify-content-center flex-column">
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
                                                    <h5 class="pb-3">Edit Berita</h5>
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label class="text-bold">Judul Berita :</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" type="text" name="title"
                                                                    value="<?= $data['title'] ?>" />
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label class="text-bold">Tanggal Upload</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Tanggal Lahir"
                                                                    type="date" name="tanggal" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required
                                                                    value="<?= $data['tanggal'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="text-bold">Isi Berita :</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <textarea class="form-control" name="newsText"
                                                                    id="newsText" cols="20" rows="10" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4"
                                                                    required><?= $data['newsText'] ?> </textarea>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 text-end mt-3 ">
                                                        <?php
                                                            if (!empty($data['foto'])) {
                                                                echo "<img src='../img/" . $data['foto'] . "' width='250' height='250' style='border-radius: 10%;'>";
                                                            }
                                                            ?>
                                                        <div class="input-group input-group-dynamic m-5 mt-5">
                                                            <label class="text-bold">Foto Cover Berita :</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <input class="form-control" aria-label="Foto Cover :"
                                                                    type="file" name="foto" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="foto_lama"
                                                            value="<?= $data['foto'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col ms-4">
                                                    <input type="submit" class="btn btn-primary" value="Edit"
                                                        name="edit">
                                                    <input type="reset" class="btn btn-danger" value="Reset"
                                                        name="reset">
                                                </div>
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
    if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $newsText = $_POST['newsText'];

        // Proses pembaruan data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Menerima data form
            $uploadedFile = $_FILES['foto'];
            // $foto = $_FILES['foto']['name'];
            $foto_lama = $_POST['foto_lama'];

            // Cek apakah pengguna mengunggah foto baru
            if ($uploadedFile['error'] === 4) {
                // Tidak ada file foto baru yang diunggah, gunakan foto lama
                $foto = $foto_lama;
            } else {
                // Ada file foto baru yang diunggah, proses unggah foto
                $uploadedFilePath = upload($uploadedFile);
                if ($uploadedFilePath) {
                    // File berhasil diunggah
                    $foto = $uploadedFilePath;
                } else {
                    // Gagal mengunggah file
                    echo "Gagal mengunggah file.";
                    // Lakukan tindakan yang sesuai jika gagal mengunggah file, seperti menampilkan pesan error atau menghentikan pembaruan data.
                    // Misalnya: die("Gagal mengunggah file. Pembaruan data dibatalkan.");
                }
            }

            echo "Data berhasil diperbarui.";
        }


        $tanggal = $_POST['tanggal'];



        $edit = $link->query("UPDATE news SET 
title = '$title',
newsText = '$newsText', 
foto = '$foto',
tanggal = '$tanggal'

WHERE idNews = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_berita'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_berita'>";
        }
    }
}



function upload($file)
{
    // Tentukan folder penyimpanan file
    $targetDir = '../img/imgnews/';

    // Mendapatkan nama file asli
    $fileName = basename($file['name']);

    // Mendapatkan path file tujuan
    $targetPath = $targetDir . $fileName;

    // Mendapatkan ekstensi file
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);

    // Daftar ekstensi file yang diperbolehkan
    $allowedExtensions = array('jpg', 'jpeg', 'png');

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