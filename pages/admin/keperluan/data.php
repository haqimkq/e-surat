<?php
session_start();

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {
    $id = $_SESSION['id_user'];
    $query = mysqli_query($link, "SELECT * FROM keperluan WHERE idKeperluan = '$id' ");
    $data = $query->fetch_array();
?>


<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-6">
            <div class="card mb-4">
                <div class="d-flex">
                    <div
                        class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg mt-n3 ms-3">
                        <i class="material-icons opacity-10" aria-hidden="true">people</i>
                    </div>
                </div>
                <div class=" p-0 position-relative mt-n6 mx-4 z-index-4 ps-6">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h6 class="text-white text-center text-capitalize ">Data Keperluan</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-3">
                    <!-- <div class="col-4 ">
                        <a href="?page=tambah_user" class="btn btn-info">Tambah Data</a>
                    </div> -->
                    <!-- <hr class="horizontal dark"> -->
                    <div class="row ">
                        <div class="col-lg-12 col-md-12">
                            <table id="example" class="table align-items-center">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Aksi</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                No.
                                            </th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Jenis Keperluan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query = mysqli_query($link, "SELECT * FROM keperluan");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <td class="w-5">
                                                <div class=" mt-3 ">
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle border-radius-lg px-3 py-1 "
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                                        role="menu">
                                                        <li><a class="dropdown-item border-radius-md"
                                                                href="?page=edit_keperluan&id=<?= $row[0]; ?>"><i
                                                                    class="fa fa-edit"></i> Edit Data</a></li>
                                                        <li><a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapus_keperluan&id=<?= $row[0]; ?>"><i
                                                                    class="fa fa-trash-o"></i> Hapus</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="w-5" align="left"><?= $i++ ?></td>
                                            <td><?= $row['jns_keperluan']; ?></td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card mb-4">
                <div class=" justify-content-center mt-n3 mx-3 z-index-2 ps-1">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h6 class="text-white text-center text-capitalize ">Tambah Data Keperluan</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-3">
                    <section>
                        <div class="container py-4">
                            <div class="row">
                                <div class="col-lg-7 mx-auto d-flex  flex-column">
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
                                                <div class="col-lg-12">
                                                    <div class="input-group input-group-dynamic">
                                                        <div class="input-group input-group-dynamic mb-4">
                                                            <label class="form-label">Jenis Keperluan</label>
                                                            <input class="form-control" aria-label="Jenis Keperluan"
                                                                type="text" name="jns_keperluan" data-minlength="4"
                                                                data-error="Tidak Boleh Kurang dari 4" required>
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


<?php
    if (isset($_POST['simpan'])) {

        $jns_keperluan = $_POST['jns_keperluan'];


        $result = mysqli_query($link, "SELECT * FROM keperluan WHERE jns_keperluan = '$jns_keperluan'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert ('username sudah terdaftar!')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_keperluan'>";
            return false;
        }

        $simpan = $link->query("INSERT INTO keperluan (jns_keperluan) VALUES ('$jns_keperluan')");

        if ($simpan) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_keperluan'>";
        } else {
            echo "<script>alert('Data anda gagal disimpan. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_keperluan'>";
        }
    }
}
?>