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
                        <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Data Perjalanan Dinas</h3>
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
                                                    <!-- START MODAL -->
                                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Pilih
                                                                        Username</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive">
                                                                        <table id="example1"
                                                                            class="table table-bordered">
                                                                            <thead class="bg-lightblue">
                                                                                <tr align="center">
                                                                                    <th>No</th>
                                                                                    <th>Username</th>
                                                                                    <th>Aksi</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <?php
                                                                                    $no = 1;
                                                                                    $data = $link->query("SELECT * FROM users WHERE id_user = '$id'  ");
                                                                                    while ($row = $data->fetch_array()) {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td align="center" width="5%">
                                                                                        <?= $no++ ?></td>
                                                                                    <td><?= $row['username'] ?></td>
                                                                                    <td align="center" width="18%">
                                                                                        <button
                                                                                            class="btn btn-xs btn-success"
                                                                                            id="select"
                                                                                            data-id_user="<?= $row['id_user'] ?>"
                                                                                            data-username="<?= $row['username'] ?>">
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

                                                    <h5> Data Pegawai</h5>
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>
                                                    <!-- <input type="hidden" class="form-control" name="id_pegawai"
                                                        id="id_pegawai" required> -->
                                                    <div class="col-md-6">
                                                        <?php
                                                            $id = $_SESSION['id_user'];
                                                            $sql = ("SELECT * FROM pegawai WHERE id_user = '$id'");
                                                            $hasil = mysqli_query($link, $sql);
                                                            $no = 0;
                                                            while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;
                                                            ?>
                                                        <label class="form-label">Nama Pegawai</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="hidden" class="form-control"
                                                                    name="id_pegawai" id="id_pegawai"
                                                                    value="<?= $data['id_pegawai'] ?>" required>
                                                                <input type="text" class="form-control" readonly
                                                                    value="<?= $data['nm_pegawai'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">NIP</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input type="text" class="form-control" readonly
                                                                    value="<?= $data['nip'] ?>">
                                                                <?php
                                                            }
                                                                ?>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h5> Data Perjalanan Dinas</h5>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tanggal Pergi</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Tanggal Pergi"
                                                                    type="date" name="tanggalPergi" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tanggal Kembali</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Tanggal Kembali"
                                                                    type="date" name="tanggalPulang" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Keterangan :</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <textarea class="form-control"
                                                                    placeholder="Masukan Keterangan .. *300 Kata"
                                                                    name="keterangan" id="keterangan" cols="20" rows="7"
                                                                    data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4"
                                                                    required></textarea>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <input type="submit" class="btn btn-primary" value="Simpan"
                                                        name="simpan">
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
    if (isset($_POST['simpan'])) {
        $id_pegawai = $_POST['id_pegawai'];
        $tanggalPergi = $_POST['tanggalPergi'];
        $tanggalPulang = $_POST['tanggalPulang'];
        $keterangan = $_POST['keterangan'];


        $simpan = $link->query("INSERT INTO perjalanan_dinas VALUES (
            '', 
            '$id_pegawai',
            '$tanggalPergi',
            '$tanggalPulang',
            '$keterangan'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataPerjalananDinas'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahPerjalananDinas'>";
        }
    }
}

?>