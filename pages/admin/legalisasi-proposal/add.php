<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {
?>
    <div class="container-fluid py-4">
        <div class="row mt-4 justify-content-center">
            <div class="col-10">
                <div class="card mb-4">
                    <div class=" position-relative mt-n4 mx-3 ps-0  ">
                        <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                            <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Data Pelayanan</h3>
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


                                                        <h5> Data Pengajuan Layanan</h5>
                                                        <h6> <i> Legalisasi Proposal</i> </h6>
                                                        <!-- <hr class="horizontal dark"> -->
                                                        <br>
                                                        <br>
                                                        <input type="hidden" class="form-control" name="id_user" id="id_user" required>

                                                        <div class="col-md-4">
                                                            <?php
                                                            $id = $_SESSION['id_user'];
                                                            $sql = ("SELECT * FROM  masyarakat WHERE id_user = '$id'");
                                                            $hasil = mysqli_query($link, $sql);
                                                            $no = 0;
                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;
                                                            ?>
                                                                <label class="form-label">Nama :</label>
                                                                <div class="input-group input-group-dynamic">
                                                                    <div class="input-group input-group-dynamic mb-4">
                                                                        <input type="hidden" class="form-control" name="id_msy" id="id_msy" value="<?= $data['id_msy'] ?>" required>
                                                                        <input type="text" class="form-control" readonly value="<?= $data['nama'] ?>">
                                                                    <?php
                                                                }
                                                                    ?>
                                                                    <div class="help-block with-errors"></div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <input type="hidden" class="form-control" name="id_pelayanan" id="id_pelayanan" required>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Pilih Jenis Pelayanan</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input type="text" class="form-control" id="j_pelayanan" required readonly>
                                                                    <span class="input-group-append">
                                                                        <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-info btn-flat mb-1"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label">Tanggal Pengajuan</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal Pengajuan" type="date" name="tgl" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Surat Permohonan yang sudah ditanda tangani <br>
                                                                    Ketua RT atau Lurah : </label>
                                                                <div class="input-group input-group-dynamic  mb-4">
                                                                    <input class="form-control" aria-label="Foto " type="file" name="s_permohonan" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <em class="text-danger text-sm text-italic">*Upload
                                                                    berkas pendukung (PDF, maksimal 2Mb)</em>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Surat yang menyatakan bahwa pengurus dari
                                                                    institusi/Yayasan/Perusahaan atau badan hukum yang
                                                                    lainnya :</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto " type="file" name="s_pernyataan" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                                <em class="text-danger text-sm text-italic">*Upload
                                                                    berkas pendukung (PDF, maksimal 2Mb)</em>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pt-5">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Foto KTP Pemohon</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto" type="file" name="ktp_p" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <div class="input-group input-group-dynamic">
                                                                <!-- <label>Status</label> -->
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto" type="hidden" name="status" value="Proses" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
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

        <!-- START MODAL -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih
                            Jenis Pelayanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead class="bg-lightblue">
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Jenis Pelayanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data = $link->query("SELECT * FROM pelayanan ");
                                    while ($row = $data->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td align="center" width="5%">
                                                <?= $no++ ?></td>
                                            <td><?= $row['j_pelayanan'] ?></td>
                                            <td align="center" width="18%">
                                                <button class="btn btn-xs btn-success" class="close" data-dismiss="modal" aria-label="Close" id="select1" data-id_pelayanan="<?= $row['id_pelayanan'] ?>" data-j_pelayanan="<?= $row['j_pelayanan'] ?>">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>


        <!-- JAVASCRIPT MODAL -->
        <script>
            $(document).on('click', '#select1', function() {
                var id_pelayanan = $(this).data('id_pelayanan');
                var j_pelayanan = $(this).data('j_pelayanan');
                $('#id_pelayanan').val(id_pelayanan);
                $('#j_pelayanan').val(j_pelayanan);
                $('#modal').modal('hide'); // Menutup modal secara otomatis
            });
        </script>

    <?php
    if (isset($_POST['simpan'])) {
        $id_msy = $_POST['id_msy'];
        $id_pelayanan = $_POST['id_pelayanan'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Menerima data form
            // $uploadedKtpFile = $_FILES['ktp'];
            $uploadedSuratPernyataanFile = $_FILES['s_pernyataan'];
            $uploadedSuratPermohonanFile = $_FILES['s_permohonan'];
            $uploadedKtpFile = $_FILES['ktp_p'];



            // Cek apakah pengguna mengunggah file surat_pernyataan
            if ($uploadedSuratPernyataanFile['error'] === 4) {
                // Tidak ada file surat_pernyataan baru yang diunggah
                $s_pernyataan = '';
            } else {
                // Ada file surat_pernyataan baru yang diunggah, proses unggah surat_pernyataan
                $uploadedSuratPernyataanFilePath = upload($uploadedSuratPernyataanFile, '../pdf/pelayanan/');
                if ($uploadedSuratPernyataanFilePath) {
                    // File surat_pernyataan berhasil diunggah
                    $s_pernyataan = $uploadedSuratPernyataanFilePath;
                } else {
                    // Gagal mengunggah file surat_pernyataan
                    echo "Gagal mengunggah file surat_pernyataan.";
                    // Lakukan tindakan yang sesuai jika gagal mengunggah file, seperti menampilkan pesan error atau menghentikan pembaruan data.
                    // Misalnya: die("Gagal mengunggah file surat_pernyataan. Pembaruan data dibatalkan.");
                }
            }
            // Cek apakah pengguna mengunggah file surat_sktm
            if ($uploadedSuratPermohonanFile['error'] === 4) {
                // Tidak ada file surat_sktm baru yang diunggah
                $s_permohonan = '';
            } else {
                // Ada file surat_sktm baru yang diunggah, proses unggah surat_sktm
                $uploadedSuratPermohonanFilePath = upload($uploadedSuratPermohonanFile, '../pdf/pelayanan/');
                if ($uploadedSuratPermohonanFilePath) {
                    // File surat_permohonan berhasil diunggah
                    $s_permohonan = $uploadedSuratPermohonanFilePath;
                } else {
                    // Gagal mengunggah file surat_sktm
                    echo "Gagal mengunggah file surat_permohonan.";
                    // Lakukan tindakan yang sesuai jika gagal mengunggah file, seperti menampilkan pesan error atau menghentikan pembaruan data.
                    // Misalnya: die("Gagal mengunggah file surat_sktm. Pembaruan data dibatalkan.");
                }
            }

            // Cek apakah pengguna mengunggah foto KTP baru
            if ($uploadedKtpFile['error'] === 4) {
                // Tidak ada file foto KTP baru yang diunggah, gunakan foto lama
                $ktp = $foto_lama;
            } else {
                // Ada file foto KTP baru yang diunggah, proses unggah foto KTP
                $uploadedKtpFilePath = upload($uploadedKtpFile, '../img/imgpelayanan/');
                if ($uploadedKtpFilePath) {
                    // File foto KTP berhasil diunggah
                    $ktp = $uploadedKtpFilePath;
                } else {
                    // Gagal mengunggah file foto KTP
                    echo "Gagal mengunggah file foto KTP.";
                    // Lakukan tindakan yang sesuai jika gagal mengunggah file, seperti menampilkan pesan error atau menghentikan pembaruan data.
                    // Misalnya: die("Gagal mengunggah file foto KTP. Pembaruan data dibatalkan.");
                }
            }
            echo "Data berhasil diperbarui.";
        }
        $tgl = $_POST['tgl'];
        $status = $_POST['status'];


        $simpan = $link->query("INSERT INTO proposal VALUES (
            '', 
            '$id_msy',
            '$id_pelayanan', 
            '$s_pernyataan',
            '$s_permohonan',
            '$ktp',
            '$tgl',
            '$status'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataProposal'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahProposal'>";
        }
    }
}



function upload($file, $targetDir)
{
    // Mendapatkan nama file asli
    $fileName = basename($file['name']);

    // Mendapatkan path file tujuan
    $targetPath = $targetDir . $fileName;

    // Mendapatkan ekstensi file
    $fileExtension = pathinfo($targetPath, PATHINFO_EXTENSION);

    // Daftar ekstensi file yang diperbolehkan
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf');

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