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
                        <h3 class=" text-white text-capitalize text-center py-1 ">Masukan Data</h3>
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

                                                    <h5> Data Pribadi</h5>
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>

                                                    <div class="col-md-7">
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
                                                    <div class="col-md-5">
                                                        <label class="form-label">Tanggal lahir</label>
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Tanggal Lahir"
                                                                    type="date" name="tgl_lhr" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Nama Lengkap</label>
                                                                <input class="form-control" aria-label="Nama Lengkap"
                                                                    type="text" name="nama" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">No KTP</label>
                                                                <input class="form-control" aria-label="no_ktp"
                                                                    type="text" name="no_ktp" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <!-- <label class="form-label">Jenis Kelamin</label> -->
                                                                <select name="jk" class="form-control">
                                                                    <option>-- Jenis Kelamin --</option>
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Tempat Lahir</label>
                                                                <input class="form-control" aria-label="Tempat Lahir"
                                                                    type="text" name="tmpt_lhr" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
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
                                                    <div class="col-md-3">
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
                                                    <div class="col-md-12">
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
        $noKtp = $_POST['no_ktp'];
        $namaMasyarakat = $_POST['nama'];
        $tmptLahir = $_POST['tmpt_lhr'];
        $tglLahir = $_POST['tgl_lhr'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $jk = $_POST['jk'];
        $no_tlp = $_POST['no_tlp'];



        $simpan = $link->query("INSERT INTO masyarakat VALUES (
            '', 
            '$id_user',
            '$noKtp',
            '$namaMasyarakat',
            '$tmptLahir',
            '$tglLahir',
            '$alamat',
            '$agama',
            '$jk',
            '$no_tlp'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataMasyarakat'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahmasyarakat'>";
        }
    }
}

?>