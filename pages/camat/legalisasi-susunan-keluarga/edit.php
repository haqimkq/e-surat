<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM s_keluarga  sk 
    join masyarakat m on sk.id_msy = m.id_msy 
    join pelayanan p on sk.id_pelayanan = p.id_pelayanan  WHERE id_sk = '$id'");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 bg-info ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 text-white">
                        Edit Data Pengajuan Legalisasi Susunan Keluarga
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
                                    <input type="hidden" class="form-control" name="id_msy" id="id_msy" required
                                        value="<?= $data['id_msy'] ?>">
                                    <div class="card-body">
                                        <p class="text-uppercase text-sm">Informasi Pegawai</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Nama :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text" name="nama"
                                                            value="<?= $data['nama'] ?>" readonly />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="hidden" class="form-control" name="id_pelayanan"
                                                    id="id_pelayanan" required value="<?= $data['id_pelayanan'] ?>">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Pelayanan :
                                                    </label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text"
                                                            value=" <?= $data['j_pelayanan'] ?> " readonly />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Tanggal Pengajuan :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal" type="date"
                                                            name="tgl" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tgl'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['p_ktp'])) {
                                                        echo "<img src='../img/" . $data['p_ktp'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic ">
                                                    <label class="text-bold">Foto KTP Pemhoon :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto KTP Pemohon :"
                                                            type="file" name="p_ktp" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ktp_lama" value="<?= $data['p_ktp'] ?>">
                                            </div>
                                            <div class="col-md-3 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['p_kk'])) {
                                                        echo "<img src='../img/" . $data['p_kk'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic ">
                                                    <label class="text-bold">Foto Kartu Keluarga :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto Kartu Keluarga :"
                                                            type="file" name="p_kk" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="kk_lama" value="<?= $data['p_kk'] ?>">
                                            </div>
                                            <div class="col-md-3 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['ktp_k'])) {
                                                        echo "<img src='../img/" . $data['ktp_k'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic ">
                                                    <label class="text-bold">Foto KTP Kepala Keluarga :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto  :" type="file"
                                                            name="ktp_k" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ktp_k_lama" value="<?= $data['ktp_k'] ?>">
                                            </div>
                                            <div class="col-md-5 text-center me-7 mt-6">
                                                <?php
                                                    if (!empty($data['qrCode'])) {
                                                        echo "<img src='../img/" . $data['qrCode'] . "' width='170' height='170' style='border-radius: 0%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic ">
                                                    <label class="text-bold">QrCode TTD Camat:</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="TTD Camat :" type="file"
                                                            name="qrCode" data-minlength="4" require
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="qrcode_lama" value="<?= $data['qrCode'] ?>">
                                            </div>
                                            <div class="col-md-4 mt-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Status :</label>
                                                    <div class="input-group input-group-dynamic mb-4 ">
                                                        <select name="statusCamat" class="form-control ">
                                                            <option value="Proses" <?php if ($data['statusCamat'] == 'Proses') {
                                                                                            echo "selected";
                                                                                        } ?>>Proses
                                                            </option>
                                                            <option value="Diterima" <?php if ($data['statusCamat'] == 'Diterima') {
                                                                                                echo "selected";
                                                                                            } ?>>Diterima
                                                            </option>
                                                            <option value="Ditolak" <?php if ($data['statusCamat'] == 'Ditolak') {
                                                                                            echo "selected";
                                                                                        } ?>>Ditolak
                                                            </option>
                                                        </select>
                                                        <em class="text-danger text-sm text-italic"> <br> *Pilih
                                                            Status</em>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary" value="Verifikasi"
                                                        name="edit">
                                                    <input type="reset" class="btn btn-danger" value="Reset"
                                                        name="reset">
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
            $uploadedKtpFile = $_FILES['p_ktp'];
            $uploadedKkFile = $_FILES['p_kk'];
            $uploadedKtpKFile = $_FILES['ktp_k'];
            $uploadedQrcodeFile = $_FILES['qrCode'];


            $ktp_lama = $_POST['ktp_lama'];
            $kk_lama = $_POST['kk_lama'];
            $ktp_k_lama = $_POST['ktp_k_lama'];
            $qrcode_lama = $_POST['qrcode_lama'];

            if ($uploadedKtpFile['error'] === 4) {
                $p_ktp = $ktp_lama;
            } else {
                $uploadedKtpFilePath = upload($uploadedKtpFile);
                if ($uploadedKtpFilePath) {
                    $p_ktp = $uploadedKtpFilePath;
                } else {
                    echo "Gagal mengunggah file foto KTP.";
                }
            }

            if ($uploadedKkFile['error'] === 4) {
                $p_kk = $kk_lama;
            } else {
                $uploadedKkFilePath = upload($uploadedKkFile);
                if ($uploadedKkFilePath) {
                    $p_kk = $uploadedKkFilePath;
                } else {
                    echo "Gagal mengunggah file foto KK.";
                }
            }

            if ($uploadedKtpKFile['error'] === 4) {
                $ktp_k = $ktp_k_lama;
            } else {
                $uploadedKtpKFilePath = upload($uploadedKtpKFile);
                if ($uploadedKtpKFilePath) {
                    $ktp_k = $uploadedKtpKFilePath;
                } else {
                    echo "Gagal mengunggah file foto KTP pemohon.";
                }
            }

            if ($uploadedQrcodeFile['error'] === 4) {
                $qrcode = $qrcode_lama;
            } else {
                $uploadedQrcodeFilePath = upload($uploadedQrcodeFile, '../img/imgpelayanan/');
                if ($uploadedQrcodeFilePath) {
                    $qrcode = $uploadedQrcodeFilePath;
                } else {
                    echo "Gagal mengunggah file Qrcode.";
                }
            }

            echo "Data berhasil diperbarui.";
        }

        $tgl = $_POST['tgl'];
        $statusCamat = $_POST['statusCamat'];


        $edit = $link->query("UPDATE s_keluarga SET 
id_msy = '$id_msy',
id_pelayanan = '$id_pelayanan',
p_ktp = '$p_ktp',
p_kk = '$p_kk',
ktp_k = '$ktp_k',
tgl = '$tgl',
statusCamat = '$statusCamat',
qrcode = '$qrcode'

WHERE id_sk = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dSusunanKeluarga'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=eSusunanKeluarga'>";
        }
    }
}


function upload($file)
{
    $targetDir = '../img/imgpelayanan/';
    $fileName = basename($file['name']);
    $targetPath = $targetDir . $fileName;
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);
    $allowedExtensions = array('jpg', 'jpeg', 'JPG', 'png');
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