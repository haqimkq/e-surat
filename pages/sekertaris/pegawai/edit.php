<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM pegawai p 
    join jabatan j on j.id_jabatan = p.id_jabatan 
     WHERE id_pegawai = '$id'");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 ">
                        Edit Data Pegawai
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
                                    <input type="hidden" class="form-control" name="id_user" id="id_user" required
                                        value="<?= $data['id_user'] ?>">
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Informasi Lengkap</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Nama Lengkap :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nm_pegawai"
                                                            value="<?= $data['nm_pegawai'] ?>" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">NIP :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nip"
                                                            value=" <?= $data['nip'] ?> " />
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
                                            
                                            <div class="col-md-3">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Jabatan :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <select class="form-control " aria-label="Jabatan"
                                                            name="id_jabatan" required>
                                                            <?php $q = $link->query("SELECT * FROM jabatan ");
                                                                while ($d =
                                                                    $q->fetch_array()
                                                                ) {
                                                                    if ($d['id_jabatan'] == $data['id_jabatan']) { ?>
                                                            <option value="<?= $d['id_jabatan']; ?>"
                                                                selected="<?= $d['id_jabatan']; ?>">
                                                                <?= $d['nm_jabatan'] ?></option>
                                                            <?php
                                                                    } else {
                                                                    ?>
                                                            <option value="<?= $d['id_jabatan'] ?>">
                                                                <?= $d['nm_jabatan'] ?></option>
                                                            <?php }
                                                                } ?>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Status :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="status"
                                                            value="<?= $data['status'] ?>" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Agama :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="agama"
                                                            value="<?= $data['agama'] ?>" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['foto'])) {
                                                        echo "<img src='../img/" . $data['foto'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic m-5">
                                                    <label class="text-bold">Foto Pegawai :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto Pegawai :"
                                                            type="file" name="foto" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="foto_lama" value="<?= $data['foto'] ?>">
                                            </div>
                                            <br>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Tanggal Lahir :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Lahir"
                                                            type="date" name="tgl_lahir" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tgl_lahir'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Tempat Lahir :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="tmpt_lahir"
                                                            value="<?= $data['tmpt_lahir'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <hr class="horizontal dark"> -->
                                        <p class="text-uppercase text-sm">Contact Information</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Alamat Lengkap</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="alamat"
                                                            value="<?= $data['alamat'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">No Telepon</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="no_tlp"
                                                            value="<?= $data['no_tlp'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Email</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="email"
                                                            value="<?= $data['email'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Instagram</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="instagram"
                                                            value="<?= $data['instagram'] ?> " />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
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
        $id_user = $_POST['id_user'];
        $jabatan = $_POST['id_jabatan'];
        $namaPegawai = $_POST['nm_pegawai'];
        $nip = $_POST['nip'];
        $tempatLahir = $_POST['tmpt_lahir'];
        $tglLahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $jenisKelamin = $_POST['jk'];
        $stts = $_POST['status'];
        $agama = $_POST['agama'];
        $noTelepon = $_POST['no_tlp'];

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




        $instagram = $_POST['instagram'];
        $email = $_POST['email'];




        $edit = $link->query("UPDATE pegawai SET 
id_user = '$id_user',
id_jabatan = '$jabatan',
nm_pegawai = '$namaPegawai', 
nip = '$nip', 
tmpt_lahir = '$tempatLahir',
tgl_lahir = '$tglLahir',
alamat = '$alamat',
jk = '$jenisKelamin',
status = '$stts',
agama = '$agama',
no_tlp = '$noTelepon',
foto = '$foto',
instagram = '$instagram',
email = '$email'

WHERE id_pegawai = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataPegawai'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editPegawai'>";
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