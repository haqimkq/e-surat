<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM suratdispensasinikah s
    join masyarakat m on s.id_msy = m.id_msy 
    join pelayanan p on s.id_pelayanan = p.id_pelayanan  WHERE idSurat = '$id'");
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
                                                    <label class="text-bold">Tanggal Pernihakan :</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal" type="date"
                                                            name="tglNikah" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tglNikah'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="mt-4 mb-3"> Data Lengkap Pria</h5>
                                            <div class="col-md-4">
                                                <label class="form-label">Nama Lengkap Pria</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="namaPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['namaPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tempat Lahir</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="tempatLahirPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tempatLahirPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="date" name="tglLahirPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tglLahirPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Pekerjaan</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="pekerjaanPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['pekerjaanPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Kewarganegaraan</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="kewarganegaraanPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['kewarganegaraanPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tempat Tinggal Pria</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="tempatTinggalPria" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tempatTinggalPria'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="mt-5 mb-3"> Data Lengkap Wanita</h5>
                                            <div class="col-md-4">
                                                <label class="form-label">Nama Lengkap Wanita</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="namaWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['namaWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tempat Lahir</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="tempatLahirWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tempatLahirWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="date" name="tglLahirWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tglLahirWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Pekerjaan</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="pekerjaanWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['pekerjaanWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Kewarganegaraan</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="kewarganegaraanWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['kewarganegaraanWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Tempat Tinggal Wanita</label>
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Pengajuan"
                                                            type="text" name="tempatTinggalWanita" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required
                                                            value="<?= $data['tempatLahirWanita'] ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
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


        $edit = $link->query("UPDATE suratdispensasinikah SET 
id_pelayanan = '$id_pelayanan',
id_msy = '$id_msy',
namaPria = '$namaPria',
namaWanita = '$namaWanita',
tempatLahirPria = '$tempatLahirPria',
tempatLahirWanita = '$tempatLahirWanita',
pekerjaanPria = '$pekerjaanPria',
pekerjaanWanita = '$pekerjaanWanita',
tglLahirPria = '$tglLahirPria',
tglLahirWanita = '$tglLahirWanita',
kewarganegaraanPria = '$kewarganegaraanPria',
kewarganegaraanWanita = '$kewarganegaraanWanita',
tempatTinggalPria = '$tempatTinggalPria',
tempatTinggalWanita = '$tempatTinggalWanita',
tglNikah = '$tglNikah'

WHERE idSurat = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataSuratDispensasiNikah'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=editSuratDispensasiNikah'>";
        }
    }
}

    ?>