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
                                                    <!-- MODAL START -->
                                                    <div class="modal fade  " id="modal" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog  modal-lg " role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Pilih
                                                                        Nama Pegawai</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body ">
                                                                    <div class="table-responsive">
                                                                        <table id="example1"
                                                                            class="table table-bordered">
                                                                            <thead class="bg-lightblue">
                                                                                <tr align="center">
                                                                                    <th>No</th>
                                                                                    <th>Nama Pegawai</th>
                                                                                    <th>Jabatan</th>
                                                                                    <th>Aksi</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                                <?php
                                                                                    $no = 1;
                                                                                    $data = $link->query("SELECT * FROM pegawai p join jabatan j on j.id_jabatan = p.id_jabatan ");
                                                                                    while ($row = $data->fetch_array()) {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td align="center" width="5%">
                                                                                        <?= $no++ ?></td>
                                                                                    <td><?= $row['nm_pegawai'] ?></td>
                                                                                    <td><?= $row['nm_jabatan'] ?></td>
                                                                                    <td align="center" width="18%">
                                                                                        <button
                                                                                            class="btn btn-xs btn-success"
                                                                                            class="close"
                                                                                            aria-label="Close"
                                                                                            data-dismiss="modal"
                                                                                            id="select"
                                                                                            data-id_pegawai="<?= $row['id_pegawai'] ?>"
                                                                                            data-id_jabatan="<?= $row['id_jabatan'] ?>"
                                                                                            data-nm_pegawai="<?= $row['nm_pegawai'] ?>"
                                                                                            data-nip="<?= $row['nip'] ?>"
                                                                                            data-nm_jabatan="<?= $row['nm_jabatan'] ?>">
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
                                                    <!-- MODAL END -->

                                                    <h5> Data Pegawai</h5>
                                                    <!-- <hr class="horizontal dark"> -->
                                                    <br>
                                                    <br>
                                                    <!-- <input type="hidden" class="form-control" name="id_pegawai"
                                                        id="id_pegawai" required> -->
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Pilih Nama Pegawai</label>
                                                            <div class="input-group input-group-dynamic mb-4">

                                                                <input placeholder="Disabled" type="text"
                                                                    class="form-control" id="nm_pegawai" required
                                                                    readonly>
                                                                <span class="input-group-append">
                                                                    <button type="button" data-toggle="modal"
                                                                        data-target="#modal"
                                                                        class="btn btn-info btn-flat mb-1"><i
                                                                            class="fa fa-search"></i></button>
                                                                </span>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" class="form-control" name="id_jab"
                                                        id="id_jabatan" required>
                                                    <input type="hidden" class="form-control" name="id_pegawai"
                                                        id="id_pegawai" required>


                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>NIP</label>
                                                            <div class="input-group input-group-dynamic ">
                                                                <input placeholder="Disabled" class="form-control"
                                                                    id="nip" aria-label="NIP" type="text" readonly>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Jabatan</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <input placeholder="Disabled" class="form-control"
                                                                    id="nm_jabatan" aria-label="jabatan" type="text"
                                                                    name="id_jabatan" required readonly>
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
                                                                    type="date" name="tglPergi" data-minlength="4"
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
                                                                    type="date" name="tglPulang" data-minlength="4"
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
                                                                    name="perihal" id="keterangan" cols="20" rows="7"
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


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#select', function() {
        var id_pegawai = $(this).data('id_pegawai');
        var id_jabatan = $(this).data('id_jabatan');
        var nm_pegawai = $(this).data('nm_pegawai');
        var nip = $(this).data('nip');
        var nm_jabatan = $(this).data('nm_jabatan');
        $('#id_pegawai').val(id_pegawai);
        $('#id_jabatan').val(id_jabatan);
        $('#nm_pegawai').val(nm_pegawai);
        $('#nip').val(nip);
        $('#nm_jabatan').val(nm_jabatan);
        $('#modal').modal('hide');
    });
})
</script>

<?php
    if (isset($_POST['simpan'])) {
        $id_pegawai = $_POST['id_pegawai'];
        $keterangan = $_POST['perihal'];
        $tanggalPergi = $_POST['tglPergi'];
        $tanggalPulang = $_POST['tglPulang'];


        $simpan = $link->query("INSERT INTO nota_perjalanan_dinas VALUES (
            '', 
            '$id_pegawai',
            '$keterangan',
            '$tanggalPergi',
            '$tanggalPulang'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_notaPerjalananDinas'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_notaPerjalananDinas'>";
        }
    }
}

?>