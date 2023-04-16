<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {
    $id = $_SESSION['id_user'];
    $query = mysqli_query($link, "SELECT * FROM users WHERE id_user = '$id' ");
    $data = $query->fetch_array();
?>

<div class="container-fluid py-4">
    <div class="row mt-4 justify-content-center">
        <div class="col-10">
            <div class="card mb-4">
                <div class=" position-relative mt-n4 mx-3 ps-0  ">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h3 class=" text-white text-capitalize text-center font-space-1">Form Tambah Data Users</h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <!-- <hr class="horizontal dark"> -->
                    <div class="content-wrapper">
                        <section>
                            <div class="container py-4">
                                <div class="row">
                                    <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
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

                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Username</label>
                                                                <input class="form-control" aria-label="Username"
                                                                    type="text" name="username" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-dynamic">
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <label class="form-label">Password</label>
                                                                <input class="form-control" aria-label="Password"
                                                                    type="text" name="password" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
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
                                                    <div class="col-md-12">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Sebagai</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <select name="level" class="form-control" required>
                                                                    <option>-- PILIH --</option>
                                                                    <option value="0">Admin</option>
                                                                    <option value="1">Pegawai</option>
                                                                    <option value="3">Camat</option>
                                                                </select>
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

<!-- ini untuk konten -->


<?php
    if (isset($_POST['simpan'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        $nama_lengkap = $_POST['nm_pegawai'];
        
        $result = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert ('username sudah terdaftar!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=tambah_user'>";
            return false;
        }
        $pass = md5($password);


        $simpan = $link->query("INSERT INTO users (username, password, level, nm_pegawai) VALUES ('$username', '$pass', '$level', '$nama_lengkap')");

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