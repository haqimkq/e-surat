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
                            <h3 class=" text-white text-capitalize text-center py-1 ">Tambah Data Pegawai</h3>
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
                                                        <!-- START MODAL -->
                                                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Pilih
                                                                            Username</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table id="example1" class="table table-bordered">
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
                                                                                                <button class="btn btn-xs btn-success" id="select" data-id_user="<?= $row['id_user'] ?>" data-username="<?= $row['username'] ?>">
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

                                                        <h5> Data Kepegawaian</h5>
                                                        <!-- <hr class="horizontal dark"> -->
                                                        <br>
                                                        <br>
                                                        <input type="hidden" class="form-control" name="id_user" id="id_user" required>

                                                        <div class="col-md-12">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <select class="form-control" aria-label="Username" type="text" name="id_user" required>
                                                                        <option>-- PILIH USERNAME -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM  users WHERE id_user = '$id'");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['id_user']; ?>">
                                                                                <?php echo
                                                                                $data['username']; ?>
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
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Nama Lengkap</label>
                                                                    <input class="form-control" aria-label="Nama Lengkap" type="text" name="nm_pegawai" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">NIP</label>
                                                                    <input class="form-control" aria-label="NIP" type="text" name="nip" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <select class="form-control" aria-label="golongan" type="text" name="id_golongan" required>
                                                                        <option>-- PILIH GOLONGAN -- </option>
                                                                        <?php
                                                                        $sql = ("SELECT * FROM  golongan");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['id_golongan']; ?>">
                                                                                <?php echo
                                                                                $data['nm_golongan']; ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <select class="form-control" aria-label="Jabatan" type="text" name="id_jabatan" required>
                                                                        <option>-- PILIH JABATAN -- </option>
                                                                        <?php
                                                                        $id = $_SESSION['id_user'];
                                                                        $sql = ("SELECT * FROM  jabatan");
                                                                        $hasil = mysqli_query($link, $sql);
                                                                        $no = 0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                            $no++;
                                                                        ?>
                                                                            <option value="<?php echo
                                                                                            $data['id_jabatan']; ?>">
                                                                                <?php echo
                                                                                $data['nm_jabatan']; ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <h5> Data Pribadi</h5>
                                                        <br>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label class="form-label">Tanggal lahir</label>
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Tanggal Lahir" type="date" name="tgl_lahir" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Jenis Kelamin</label>
                                                                    <input class="form-control" aria-label="Jenis Kelamin" type="text" name="jk" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Tempat Lahir</label>
                                                                    <input class="form-control" aria-label="Tempat Lahir" type="text" name="tmpt_lahir" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Status</label>
                                                                    <input class="form-control" aria-label="Status" type="text" name="status" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Alamat</label>
                                                                    <input class="form-control" aria-label="Alamat" type="text" name="alamat" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Agama</label>
                                                                    <input class="form-control" aria-label="Agama" type="text" name="agama" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">No Telepon</label>
                                                                    <input class="form-control" aria-label="No Telepon" type="text" name="no_tlp" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <h5> Data Tambahan</h5>
                                                        <br>
                                                        <br>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Instagram</label>
                                                                    <input class="form-control" aria-label="Instagram" type="text" name="instagram" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <label class="form-label">Email</label>
                                                                    <input class="form-control" aria-label="Email" type="text" name="email" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group-dynamic">
                                                                <label>Foto Pegawai</label>
                                                                <div class="input-group input-group-dynamic mb-4">
                                                                    <input class="form-control" aria-label="Foto Pegawai" type="file" name="foto" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
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
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <!-- JAVASCRIPT MODAL -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var id_user = $(this).data('id_user');
                var username = $(this).data('username');
                $('#id_user').val(id_user);
                $('#username').val(username);
                $('#modal').modal('hide');
            });
        })
    </script>

<?php
    if (isset($_POST['simpan'])) {
        $id_user = $_POST['id_user'];
        $id_jabatan = $_POST['id_jabatan'];
        $id_golongan = $_POST['id_golongan'];
        $nm_pegawai = $_POST['nm_pegawai'];
        $nip = $_POST['nip'];
        $tmpt_lahir = $_POST['tmpt_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];
        $status = $_POST['status'];
        $agama = $_POST['agama'];
        $no_tlp = $_POST['no_tlp'];
        $foto = upload();
        if (!$foto) {
            echo "<script>alert('Gagal Upload foto ')</script>";
            return false;
        }
        $instagram = $_POST['instagram'];
        $email = $_POST['email'];


        $simpan = $link->query("INSERT INTO pegawai VALUES (
            '', 
            '$id_user',
            '$id_jabatan',
            '$id_golongan',
            '$nm_pegawai',
            '$nip',
            '$tmpt_lahir',
            '$tgl_lahir',
            '$alamat',
            '$jk',
            '$status',
            '$agama',
            '$no_tlp',
            '$foto',
            '$instagram',
            '$email'
            )");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dataPegawai'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambahPegawai'>";
        }
    }
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    $ekstensiGambarValid1 = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));



    if ($ukuranFile > 5000000) {
        echo "<script>alert('ukuran gambar terlalu besar')</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../bpkad/img/' . $namaFileBaru);

    return $namaFileBaru;
}

?>