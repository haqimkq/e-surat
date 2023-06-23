<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM proposal  pr
    join masyarakat m on pr.id_msy = m.id_msy 
    join pelayanan p on pr.id_pelayanan = p.id_pelayanan  WHERE id_lp = '$id'");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 bg-info ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 text-white">
                        Edit Data Pengajuan Legalisasi Proposal
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
                                        <p class="text-uppercase text-sm">Informasi Masyrakat</p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Nama :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" type="text"
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
                                            <div class="col-md-5 me-7 ">
                                                <div class="input-group input-group-dynamic m-5">
                                                    <label class="text-bold">Surat Permohonan yang sudah ditanda tangani
                                                        <br> Ketua RT atau Lurah :</label>
                                                    <div class="input-group input-group-dynamic mb-4 pt-3">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="s_permohonan" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="s_permohonan_lama" type="hidden"
                                                        class="form-control input-sm"
                                                        value="<?= $data['s_permohonan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5 me-7 ">
                                                <div class="input-group input-group-dynamic m-5">
                                                    <label class="text-bold">Surat yang menyatakan bahwa pengurus dari
                                                        institusi/Yayasan/Perusahaan atau badan hukum yang lainnya
                                                        :</label>
                                                    <div class="input-group input-group-dynamic mb-4 pt-3">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="s_pernyataan" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="s_pernyataan_lama" type="hidden"
                                                        class="form-control input-sm"
                                                        value="<?= $data['s_pernyataan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-10 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['ktp_p'])) {
                                                        echo "<img src='../img/" . $data['ktp_p'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic m-5">
                                                    <label class="text-bold">Foto KTP Pemohon :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto KTP Pemohon :"
                                                            type="file" name="ktp_p" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ktp_lama" value="<?= $data['ktp_p'] ?>">
                                            </div>
                                            <div class="col-md-10 ">
                                                <div class="input-group input-group-dynamic">
                                                    <!-- <label>Status</label> -->
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Foto" type="hidden"
                                                            name="status" value="<?= $data['status'] ?>"
                                                            data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                                            readonly>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-5 text-center me-7 mt-4">
                                                <div class="input-group input-group-dynamic m-5">
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="TTD Camat :" type="file"
                                                            name="qrCode" data-minlength="4" require
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="qrcode_lama" value="<?= $data['qrCode'] ?>">
                                            </div> -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary" value="Edit"
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
            $uploadedSuratPernyataanFile = $_FILES['s_pernyataan'];
            $uploadedSuratPermohonanFile = $_FILES['s_permohonan'];
            $uploadedKtpFile = $_FILES['ktp_p'];
            // $uploadedQrcodeFile = $_FILES['qrCode'];

            $s_pernyataan_lama = $_POST['s_pernyataan_lama'];
            $s_permohonan_lama = $_POST['s_permohonan_lama'];
            $ktp_lama = $_POST['ktp_lama'];
            // $qrcode_lama = $_POST['qrcode_lama'];

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

            if ($uploadedSuratPermohonanFile['error'] === 4) {
                $s_permohonan = $s_permohonan_lama;
            } else {
                $uploadedSuratPermohonanFilePath = upload($uploadedSuratPermohonanFile, '../pdf/pelayanan/');
                if ($uploadedSuratPermohonanFilePath) {
                    $s_permohonan = $uploadedSuratPermohonanFilePath;
                } else {
                    echo "Gagal mengunggah file surat_sktm.";
                }
            }

            if ($uploadedSuratPernyataanFile['error'] === 4) {
                $s_pernyataan = $s_pernyataan_lama;
            } else {
                $uploadedSuratPernyataanFilePath = upload($uploadedSuratPernyataanFile, '../pdf/pelayanan/');
                if ($uploadedSuratPernyataanFilePath) {
                    $s_pernyataan = $uploadedSuratPernyataanFilePath;
                } else {
                    echo "Gagal mengunggah file surat_pernyataan.";
                }
            }

            echo "Data berhasil diperbarui.";
        }
        $tgl = $_POST['tgl'];
        $status = $_POST['status'];


        $edit = $link->query("UPDATE proposal SET 
id_msy = '$id_msy',
id_pelayanan = '$id_pelayanan',
s_permohonan = '$s_permohonan',
s_pernyataan = '$s_pernyataan',
ktp_p = '$ktp',
tgl = '$tgl',
status = '$status'


WHERE id_lp = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataProposal'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editProposal'>";
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