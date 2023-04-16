<?php
session_start();



if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../pelayanan/index.php'>";
} else {

?>
<!-- ini untuk konten -->
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="content-wrapper">
                <section>
                    <div class="container py-4">
                        <div class="row">
                            <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                                <h3 class="text-center">Form Tambah Data Users</h3>
                                <br>
                                <form data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
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
                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <label class="form-label">Username</label>
                                                        <input class="form-control" aria-label="Username" type="text"
                                                            name="username" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <label class="form-label">Password</label>
                                                        <input class="form-control" aria-label="Password" type="text"
                                                            name="password" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-12">
                                        <div class="input-group input-group-dynamic">
                                            <div class="input-group input-group-dynamic mb-4">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" aria-label="Email" type="text" name="email" data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div> -->

                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <label class="form-label">NIP</label>
                                                        <input class="form-control" aria-label="NIP" type="text"
                                                            name="nik" data-minlength="4"
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
                                                            type="text" name="nm_pegawai" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label>Tanggal Lahir</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <input class="form-control" aria-label="Tanggal Lahir"
                                                            type="date" name="tgl_lahir" data-minlength="4"
                                                            data-error="Tidak Boleh Kurang dari 4" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label>Jenis Kelamin</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <select name="jk" class="form-control" required>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="input-group input-group-dynamic">
                                                    <label>Sebagai</label>
                                                    <div class="input-group input-group-dynamic mb-4">
                                                        <select name="level" class="form-control" required>
                                                            <option value="0">Pegawai</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Petugas</option>
                                                            <option value="3">Atasan</option>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group"> -->
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary" value="Simpan"
                                                    name="simpan">
                                                <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                                            </div>
                                            <!-- </div> -->


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

<?php
    if (isset($_POST['simpan'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        /* $email = $_POST['email']; */
        $nip = $_POST['nik'];
        $nama_lengkap = $_POST['nm_pegawai'];
        $tanggal_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jk'];

        $result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert ('username sudah terdaftar!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_user'>";
            return false;
        }
        $pass = md5($password);


        $simpan = $link->query("INSERT INTO users (username, password, level, nik, nm_pegawai, tgl_lahir, jk) VALUES ('$username', '$pass', '$level', '$nip', '$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin')");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_user'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_user'>";
        }
    }
}

?>