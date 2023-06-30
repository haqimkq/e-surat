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
                        <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Surat Dispensasi</h3>
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


                                                    <h5> Data Pengajuan Dispensasi Nikah</h5>
                                                    <!-- <h6> <i>Rekomendasi Disnpensasi Nikah</i></h6> -->
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>
                                                    <input type="hidden" class="form-control" name="id_user"
                                                        id="id_user" required>
                                                    <div class="col-md-4">
                                                        <?php
                                                            $id = $_SESSION['id_user'];
                                                            $sql = ("SELECT * FROM  masyarakat WHERE id_user = '$id'");
                                                            $hasil = mysqli_query($link, $sql);
                                                            $no = 0;
                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;
                                                            ?>
                                                        <label class="form-label">Nama Pemohon :</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="hidden" class="form-control" name="id_msy"
                                                                    id="id_msy" value="<?= $data['id_msy'] ?>" required>
                                                                <input type="text" class="form-control" readonly
                                                                    value="<?= $data['nama'] ?>">
                                                                <?php
                                                                }
                                                                    ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="id_pelayanan"
                                                        id="id_pelayanan" required>
                                                    <div class="col-md-4">
                                                        <?php
                                                            $sql = ("SELECT * FROM  pelayanan WHERE j_pelayanan = 'Rekomendasi Dispensasi Nikah'");
                                                            $hasil = mysqli_query($link, $sql);
                                                            $no = 0;
                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;
                                                            ?>
                                                        <label class="form-label">Jenis Layanan :</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="hidden" class="form-control"
                                                                    name="id_pelayanan" id="id_pelayanan"
                                                                    value="<?= $data['id_pelayanan'] ?>" required>
                                                                <input type="text" class="form-control" readonly
                                                                    value="<?= $data['j_pelayanan'] ?>">
                                                                <?php
                                                                }
                                                                    ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="form-label">Tanggal Nikah</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="date"
                                                                    name="tglNikah" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="mt-4 mb-3"> Data Lengkap Pria</h5>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Nama Lengkap Pria</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="namaPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="tempatLahirPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="date"
                                                                    name="tglLahirPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Pekerjaan</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="pekerjaanPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Kewarganegaraan</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="kewarganegaraanPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tempat Tinggal Pria</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="tempatTinggalPria" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="mt-5 mb-3"> Data Lengkap Wanita</h5>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Nama Lengkap Wanita</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="namaWanita" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="tempatLahirWanita" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="date"
                                                                    name="tglLahirWanita" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Pekerjaan</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="pekerjaanWanita" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Kewarganegaraan</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="kewarganegaraanWanita" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Tempat Tinggal Wanita</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control"
                                                                    aria-label="Tanggal Pengajuan" type="text"
                                                                    name="tempatTinggalWanita" data-minlength="4"
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



    <?php
    if (isset($_POST['simpan'])) {
        $id_pelayanan = $_POST['id_pelayanan'];
        $id_msy = $_POST['id_msy'];
        $namaPria = $_POST['namaPria'];
        $namaWanita = $_POST['namaWanita'];
        $tempatLahirPria = $_POST['tempatLahirPria'];
        $tempatLahirWanita = $_POST['tempatLahirWanita'];
        $pekerjaanPria = $_POST['pekerjaanPria'];
        $pekerjaanWanita = $_POST['pekerjaanWanita'];
        $tglLahirPria = $_POST['tglLahirPria'];
        $tglLahirWanita = $_POST['tglLahirWanita'];
        $kewarganegaraanPria = $_POST['kewarganegaraanPria'];
        $kewarganegaraanWanita = $_POST['kewarganegaraanWanita'];
        $tempatTinggalPria = $_POST['tempatTinggalPria'];
        $tempatTinggalWanita = $_POST['tempatTinggalWanita'];
        $tglNikah = $_POST['tglNikah'];




        $simpan = $link->query("INSERT INTO suratdispensasinikah VALUES (
            '', 
            '$id_pelayanan',
            '$id_msy',
            '$namaPria',
            '$namaWanita',
            '$tempatLahirPria',
            '$tempatLahirWanita',
            '$pekerjaanPria',
            '$pekerjaanWanita',
            '$tglLahirPria',
            '$tglLahirWanita',
            '$kewarganegaraanPria',
            '$kewarganegaraanWanita',
            '$tempatTinggalPria',
            '$tempatTinggalWanita',
            '$tglNikah'

            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataSuratDispensasiNikah'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahSuratDispenasiNikah'>";
        }
    }
}

    ?>