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
                        <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Data Pegawai</h3>
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
                                                   

                                                    <h5> Data Kepegawaian</h5>
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>
                                                    <input type="hidden" class="form-control" name="id_user"
                                                        id="id_user" required>

                                                    <div class="col-md-12">
                                                        <?php
                                                            $id = $_SESSION['id_user'];
                                                            $sql = ("SELECT * FROM  users WHERE id_user = '$id'");
                                                            $hasil = mysqli_query($link, $sql);
                                                            $no = 0;
                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;
                                                            ?>
                                                        <label class="form-label">Username :</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="hidden" class="form-control" name="id_user"
                                                                    id="id_user" value="<?= $data['id_user'] ?>"
                                                                    required>
                                                                <input type="text" class="form-control" readonly
                                                                    value="<?= $data['username'] ?>">
                                                                <?php
                                                                }
                                                                    ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Nama Lengkap</label>
                                                                <input class="form-control" aria-label="Nama Lengkap"
                                                                    type="text" name="nm_pegawai" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">NIP</label>
                                                                <input class="form-control" aria-label="NIP" type="text"
                                                                    name="nip" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <select class="form-control" aria-label="Jabatan"
                                                                    type="text" name="id_jabatan" required>
                                                                    <option>-- PILIH JABATAN -- </option>
                                                                    <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM  jabatan");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                    <option value="<?php echo
                                                                                            $data['id_jabatan']; ?>">
                                                                        <?php echo
                                                                                $data['nm_jabatan']; ?>
                                                                    </option>
                                                                    <?php
                                                                        }
                                                                        ?>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h5> Data Pribadi</h5>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Tanggal lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Tanggal Lahir"
                                                                    type="date" name="tgl_lahir" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <!-- <label class="form-label">Jenis Kelamin</label> -->
                                                                <select name="jk" class="form-control">
                                                                    <option>-- PILIH --</option>
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Tempat Lahir</label>
                                                                <input class="form-control" aria-label="Tempat Lahir"
                                                                    type="text" name="tmpt_lahir" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Status</label>
                                                                <input class="form-control" aria-label="Status"
                                                                    type="text" name="status" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Alamat</label>
                                                                <input class="form-control" aria-label="Alamat"
                                                                    type="text" name="alamat" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Agama</label>
                                                                <input class="form-control" aria-label="Agama"
                                                                    type="text" name="agama" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">No Telepon</label>
                                                                <input class="form-control" aria-label="No Telepon"
                                                                    type="text" name="no_tlp" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h5> Data Tambahan</h5>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Instagram</label>
                                                                <input class="form-control" aria-label="Instagram"
                                                                    type="text" name="instagram" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Email</label>
                                                                <input class="form-control" aria-label="Email"
                                                                    type="text" name="email" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Foto Pegawai</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Foto Pegawai"
                                                                    type="file" name="foto" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ms-4">
                                                <input type="submit" class="btn btn-primary" value="Simpan"
                                                    name="simpan">
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
        $id_user = $_POST['id_user'];
        $id_jabatan = $_POST['id_jabatan'];
        $nm_pegawai = $_POST['nm_pegawai'];
        $nip = $_POST['nip'];
        $tmpt_lahir = $_POST['tmpt_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];
        $status = $_POST['status'];
        $agama = $_POST['agama'];
        $no_tlp = $_POST['no_tlp'];

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


        $simpan = $link->query("INSERT INTO pegawai VALUES (
            '', 
            '$id_user',
            '$id_jabatan',
            '$nm_pegawai',
            '$nip',
            '$tmpt_lahir',
            '$tgl_lahir',
            '$alamat',
            '$jk',
            '$status',
            '$agama',
            '$no_tlp',
            '$foto',
            '$instagram',
            '$email'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataPegawai'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahPegawai'>";
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