<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
} else {
    $id = $_GET['id'];
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

                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Username</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Username"
                                                                    type="text" name="username" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required
                                                                    value="<?= $data['username'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Password</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="Password"
                                                                    type="password" name="password" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-primary" value="Edit"
                                                            name="edit">
                                                        <input type="reset" class="btn btn-danger" value="Reset"
                                                            name="reset">
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
    if (isset($_POST['edit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = md5($password);


        $edit = $link->query("UPDATE users SET 
        username = '$username', 
        password = '$pass'
        WHERE id_user = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=datauser'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edituser'>";
        }
    }
}
?>