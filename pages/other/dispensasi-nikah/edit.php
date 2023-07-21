<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM rdn r
    join masyarakat m on r.id_msy = m.id_msy 
    join pelayanan p on r.id_pelayanan = p.id_pelayanan  WHERE id_rdn = '$id'");
    $data = $query->fetch_array();



?>

    <div class="container-fluid px-2 px-md-2">
        <div class="card card-body mx-3 mx-md-2 mt-3 bg-info ">
            <div class="row gx-4 justify-content-center">
                <div class="col-auto my-auto ">
                    <div class=" h-100 ">
                        <h5 class=" mb-1 text-white">
                            Edit Data Rekomendasi Dispensasi Nikah
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
                                        <input type="hidden" class="form-control" name="id_msy" id="id_msy" required value="<?= $data['id_msy'] ?>">
                                        <div class="card-body">
                                            <p class="text-uppercase text-sm">Informasi Pegawai</p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Nama :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" type="text" name="nama" value="<?= $data['nama'] ?>" readonly />
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="hidden" class="form-control" name="id_pelayanan" id="id_pelayanan" required value="<?= $data['id_pelayanan'] ?>">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Pelayanan :
                                                        </label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" type="text" value=" <?= $data['j_pelayanan'] ?> " readonly />
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-dynamic">
                                                        <label class="text-bold">Tanggal Pengajuan :</label>
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <input class="form-control" aria-label="Tanggal" type="date" name="tgl" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required value="<?= $data['tgl'] ?>">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 text-center me-7 mt-4">
                                                    <?php
                                                    if (!empty($data['ktp_p'])) {
                                                        echo "<img src='../img/" . $data['ktp_p'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                    <div class="input-group input-group-dynamic ">
                                                        <label class="text-bold">Foto KTP Pemohon :</label>
                                                        <div class="input-group input-group-dynamic ">
                                                            <input class="form-control" aria-label="Foto KTP Pemohon :" type="file" name="ktp" data-minlength="4" data-error="Tidak Boleh Kurang dari 4">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="ktp_lama" value="<?= $data['ktp_p'] ?>">
                                                </div>
                                                <div class="col-md-5 text-center me-7 mt-4">
                                                    <?php
                                                    if (!empty($data['kk_p'])) {
                                                        echo "<img src='../img/" . $data['kk_p'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                    <div class="input-group input-group-dynamic ">
                                                        <label class="text-bold">Foto Kartu Keluarga :</label>
                                                        <div class="input-group input-group-dynamic ">
                                                            <input class="form-control" aria-label="Foto Kartu Keluarga :" type="file" name="kk" data-minlength="4" data-error="Tidak Boleh Kurang dari 4">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="kk_lama" value="<?= $data['kk_p'] ?>">
                                                </div>
                                                <div class="col-md-5 me-7 mt-4">
                                                    <div class="input-group input-group-dynamic ">
                                                        <label class="text-bold">Surat Pengantar Dari KUA
                                                            :</label>
                                                        <div class="input-group input-group-dynamic mb-2">
                                                            <input class="form-control" aria-label="Berkas" type="file" name="s_kua" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                        <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                            (PDF, maksimal 2Mb)</em>
                                                        <input name="s_kua_lama" type="hidden" class="form-control input-sm" value="<?= $data['s_kua'] ?>">
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
        $id_msy = $_POST['id_msy'];
        $id_pelayanan = $_POST['id_pelayanan'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadedKtpFile = $_FILES['ktp'];
            $uploadedKkFile = $_FILES['kk'];

            $uploadedsKuaFile = $_FILES['s_kua'];

            $ktp_lama = $_POST['ktp_lama'];
            $kk_lama = $_POST['kk_lama'];
            $s_kua_lama = $_POST['s_kua_lama'];


            if ($uploadedKtpFile['error'] === 4) {
                $ktp = $ktp_lama;
            } else {
                $uploadedKtpFilePath = upload($uploadedKtpFile, '../img/imgpelayanan/');
                if ($uploadedKtpFilePath) {
                    $ktp = $uploadedKtpFilePath;
                } else {
                    echo "Gagal mengunggah file foto KTP.";
                }
            }

            if ($uploadedKkFile['error'] === 4) {
                $kk = $kk_lama;
            } else {
                $uploadedKkFilePath = upload($uploadedKkFile, '../img/imgpelayanan/');
                if ($uploadedKkFilePath) {
                    $kk = $uploadedKkFilePath;
                } else {
                    echo "Gagal mengunggah file foto KK.";
                }
            }

            if ($uploadedsKuaFile['error'] === 4) {
                $s_kua = $s_kua_lama;
            } else {
                $uploadedsKuaFilePath = upload($uploadedsKuaFile, '../pdf/pelayanan/');
                if ($uploadedsKuaFilePath) {
                    $s_kua = $uploadedsKuaFilePath;
                } else {
                    echo "Gagal mengunggah file surat_sktm.";
                }
            }


            echo "Data berhasil diperbarui.";
        }


        $tgl = $_POST['tgl'];



        $edit = $link->query("UPDATE rdn SET 
id_msy = '$id_msy',
id_pelayanan = '$id_pelayanan',
ktp_p = '$ktp',
kk_p = '$kk',
s_kua = '$s_kua',
tgl = '$tgl'


WHERE id_rdn = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataDispensasiNikah'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editDispensasiNikah'>";
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