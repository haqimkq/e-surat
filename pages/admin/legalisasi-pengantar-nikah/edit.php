<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM spn s 
    join masyarakat m on s.id_msy = m.id_msy 
    join pelayanan p on s.id_pelayanan = p.id_pelayanan WHERE id_spn = '$id'");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 bg-info ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 text-white">
                        Edit Data Pengajuan Legalisasi Surat Dispensasi Nikah
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
                                            <div class="col-md-5 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['ktp'])) {
                                                        echo "<img src='../img/" . $data['ktp'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Foto KTP Pemohon :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto KTP Pemohon :"
                                                            type="file" name="ktp" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="ktp_lama" value="<?= $data['ktp'] ?>">
                                            </div>
                                            <div class="col-md-5 text-center me-7 mt-4">
                                                <?php
                                                    if (!empty($data['pas_foto'])) {
                                                        echo "<img src='../img/" . $data['pas_foto'] . "' width='170' height='170' style='border-radius: 20%;'>";
                                                    }
                                                    ?>
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Foto Kartu Keluarga :</label>
                                                    <div class="input-group input-group-dynamic ">
                                                        <input class="form-control" aria-label="Foto Kartu Keluarga :"
                                                            type="file" name="pas_foto" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="pas_lama" value="<?= $data['pas_foto'] ?>">
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-md-5 me-7 mt-4">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Surat Pengantar Nikah Yang Dari Lurah
                                                        :</label>
                                                    <div class="input-group input-group-dynamic mb-1">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="spn" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="spn_lama" type="hidden" class="form-control input-sm"
                                                        value="<?= $data['spn'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5 me-7 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Akte Perceraian *(Bagi Janda/Duda Cerai
                                                        Hidup)
                                                        :</label>
                                                    <div class="input-group input-group-dynamic mb-1 ">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="akte_c" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="akte_c_lama" type="hidden"
                                                        class="form-control input-sm" value="<?= $data['akte_c'] ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                            <div class="col-md-5 me-7 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Surat Kematian *(Bagi Janda/Duda Cerai
                                                        Meninggal)</label>
                                                    <div class="input-group input-group-dynamic mb-1">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="sk" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="sk_lama" type="hidden" class="form-control input-sm"
                                                        value="<?= $data['sk'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5 me-7 mt-4 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Surat Keterangan Wali Nikah</label>
                                                    <div class="input-group input-group-dynamic mb-1">
                                                        <input class="form-control" aria-label="Berkas" type="file"
                                                            name="skwn" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4"
                                                            accept=".pdf,.PDF,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <em class="text-danger text-sm text-italic">*Upload berkas pendukung
                                                        (PDF, maksimal 2Mb)</em>
                                                    <input name="skwn_lama" type="hidden" class="form-control input-sm"
                                                        value="<?= $data['skwn'] ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-md-5 text-center me-7 mt-4">
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
                                            <div class="col-md-4 mt-7">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="text-bold">Status :</label>
                                                    <div class="input-group input-group-dynamic mb-4 ">
                                                        <select name="statusAdmin" class="form-control ">
                                                            <option value="Proses" <?php if ($data['statusAdmin'] == 'Proses') {
                                                                                            echo "selected";
                                                                                        } ?>>Proses
                                                            </option>
                                                            <option value="Diterima" <?php if ($data['statusAdmin'] == 'Diterima') {
                                                                                                echo "selected";
                                                                                            } ?>>Diterima
                                                            </option>
                                                            <option value="Ditolak" <?php if ($data['statusAdmin'] == 'Ditolak') {
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
            $uploadedKtpFile = $_FILES['ktp'];
            $uploadedpasFile = $_FILES['pas_foto'];
            $uploadedQrcodeFile = $_FILES['qrCode'];


            $uploadedspnFile = $_FILES['spn'];
            $uploadedakte_cFile = $_FILES['akte_c'];
            $uploadedskFile = $_FILES['sk'];
            $uploadedskwnFile = $_FILES['skwn'];
            $qrcode_lama = $_POST['qrcode_lama'];



            $ktp_lama = $_POST['ktp_lama'];
            $pas_lama = $_POST['pas_lama'];

            $spn_lama = $_POST['spn_lama'];
            $akte_c_lama = $_POST['akte_c_lama'];
            $sk_lama = $_POST['sk_lama'];
            $skwn_lama = $_POST['skwn_lama'];


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

            if ($uploadedpasFile['error'] === 4) {
                $pas = $pas_lama;
            } else {
                $uploadedpasFilePath = upload($uploadedpasFile, '../img/imgpelayanan/');
                if ($uploadedpasFilePath) {
                    $pas = $uploadedpasFilePath;
                } else {
                    echo "Gagal mengunggah file foto KK.";
                }
            }

            if ($uploadedspnFile['error'] === 4) {
                $spn = $spn_lama;
            } else {
                $uploadedspnFilePath = upload($uploadedspnFile, '../pdf/pelayanan/');
                if ($uploadedspnFilePath) {
                    $spn = $uploadedspnFilePath;
                } else {
                    echo "Gagal mengunggah file surat_sktm.";
                }
            }

            if ($uploadedakte_cFile['error'] === 4) {
                $akte_c = $akte_c_lama;
            } else {
                $uploadedakte_cFilePath = upload($uploadedakte_cFile, '../pdf/pelayanan/');
                if ($uploadedakte_cFilePath) {
                    $akte_c = $uploadedakte_cFilePath;
                } else {
                    echo "Gagal mengunggah file surat_pernyataan.";
                }
            }
            if ($uploadedskFile['error'] === 4) {
                $sk = $sk_lama;
            } else {
                $uploadedskFilePath = upload($uploadedskFile, '../pdf/pelayanan/');
                if ($uploadedskFilePath) {
                    $sk = $uploadedskFilePath;
                } else {
                    echo "Gagal mengunggah file surat_pernyataan.";
                }
            }
            if ($uploadedskwnFile['error'] === 4) {
                $skwn = $skwn_lama;
            } else {
                $uploadedskwnFilePath = upload($uploadedskwnFile, '../pdf/pelayanan/');
                if ($uploadedskwnFilePath) {
                    $skwn = $uploadedskwnFilePath;
                } else {
                    echo "Gagal mengunggah file surat_pernyataan.";
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
        $statusAdmin = $_POST['statusAdmin'];


        $edit = $link->query("UPDATE spn SET 
id_msy = '$id_msy',
id_pelayanan = '$id_pelayanan',
spn = '$spn',
ktp = '$ktp',
pas_foto = '$pas',
akte_c = '$akte_c',
sk = '$sk',
skwn = '$skwn',
tgl = '$tgl',
statusAdmin = '$statusAdmin',
qrCode = '$qrcode'

WHERE id_spn = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_pengantarNikah'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_pengantarNikah'>";
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