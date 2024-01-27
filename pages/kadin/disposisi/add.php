<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {

?>

    <div class="container-fluid py-4">
        <div class="row mt-4 justify-content-center">
            <div class="col-10">
                <div class="card mb-4">
                    <div class=" position-relative mt-n4 mx-3 ps-0  ">
                        <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                            <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Dispensasi Surat </h3>
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
                                                       
                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Pilih Nama Tamu</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input placeholder="Disabled" type="text" class="form-control" id="nama" required readonly>
                                                                    <span class="input-group-append">
                                                                        <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-info btn-flat mb-1"><i class="fa fa-search"></i></button>
                                                                    </span>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control" name="idSuratMasuk" id="idsuratmasuk" required readonly>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Nomor Surat</label>
                                                                <div class="input-group input-group-dynamic ">
                                                                    <input placeholder="Disabled" class="form-control" id="nosurat" aria-label="noSurat" type="text" readonly>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Perihal</label>
                                                                <div class="input-group input-group-dynamic">
                                                                    <input placeholder="Disabled" class="form-control" id="perihal" aria-label="perihal" type="text"  readonly>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <select class="form-control" aria-label="Tamu" type="text" name="idPegawai" required>
                                                                        <option>-- PILIH Pegawai -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM pegawai");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['id_pegawai']; ?>">
                                                                                <?php echo
                                                                                $data['nm_pegawai']; ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Tanggal Disposisi</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal" type="date" name="tanggal" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Keterangan</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal" type="text" name="keterangan" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col ms-4">
                                            <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                                            <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                                        </div>

                                        <!-- MODAL START -->
                                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-lg " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Nama Tamu</h5>
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
                                                                        <th>Nama </th>
                                                                        <th>Nomor Surat</th>
                                                                        <th>Perihal</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php
                                                                    $no = 1;
                                                                    $sql = ("SELECT sm.*, tm.*, t.nama
                                                                            FROM surat_masuk sm
                                                                            JOIN tamu_masuk tm ON tm.idTamuMasuk = sm.idTamuMasuk
                                                                            JOIN tamu t ON t.idTamu = tm.idTamu ");
                                                                    $hasil = $link->query($sql);
                                                                    while ($row = $hasil->fetch_array()) {
                                                                    ?>
                                                                        <tr>
                                                                            <td align="center" width="5%"><?= $no++ ?></td>
                                                                            <td><?= $row['nama'] ?></td>
                                                                            <td><?= $row['noSurat'] ?></td>
                                                                            <td><?= $row['perihal'] ?></td>
                                                                            <td align="center" width="18%">
                                                                                <button class="btn btn-xs btn-success" class="close" aria-label="Close" data-dismiss="modal" id="select" 
                                                                                data-idsuratmasuk="<?= $row['idSuratMasuk'] ?>" 
                                                                                data-nama="<?= $row['nama'] ?>" 
                                                                                data-nosurat="<?= $row['noSurat'] ?>" 
                                                                                data-perihal="<?= $row['perihal'] ?>">
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
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '#select', function() {

                    var idSuratMasuk = $(this).data('idsuratmasuk');
                    var nama = $(this).data('nama');
                    var noSurat = $(this).data('nosurat');
                    var perihal = $(this).data('perihal');

                    // Memperbarui nilai input dengan ID yang sesuai
                    $('#idsuratmasuk').val(idSuratMasuk);
                    $('#nama').val(nama);
                    $('#nosurat').val(noSurat);
                    $('#perihal').val(perihal);
                    
                    $('#modal').modal('hide');
                });
            });
        </script>


    <?php
    if (isset($_POST['simpan'])) {
        $idSuratMasuk = $_POST['idSuratMasuk'];
        $idPegawai = $_POST['idPegawai'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];

        $simpan = $link->query("INSERT INTO disposisi VALUES (
            '', 
            '$idSuratMasuk',
            '$idPegawai',
            '$tanggal',
            '$keterangan'
            )");
        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=datadisposisi'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahdisposisi'>";
        }
    }
}

    ?>