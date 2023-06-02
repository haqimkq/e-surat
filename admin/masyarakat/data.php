<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {
    // $id = $_SESSION['id_user'];WHERE id_msy = '$id'
    $query = mysqli_query($link, "SELECT * FROM masyarakat  ");
    $data = $query->fetch_array();
?>


<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="d-flex">
                    <div
                        class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg mt-n3 ms-3">
                        <i class="material-icons opacity-10" aria-hidden="true">people</i>
                    </div>
                </div>
                <div class=" p-0 position-relative mt-n6 mx-4 z-index-4 ps-6">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h6 class="text-white text-capitalize ps-3">Data Masyarakat</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-3">
                    <!-- <div class="col-2 ">
                            <a href="?page=tambah_pegawai" class="btn btn-info">Tambah Data</a>
                        </div> -->
                    <!-- <hr class="horizontal dark"> -->
                    <div class="row">
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
                                                NIK</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Nama Lengkap</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Tempat Lahir</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Tanggal Lahir</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query = mysqli_query($link, "SELECT * FROM masyarakat");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <td>
                                                <div class=" mt-3">
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle border-radius-lg px-3 py-1 "
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                                        role="menu">
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                href="?page=edit_masyarakat&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-edit"></i>
                                                                Edit Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapusPegawai&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td align="left"><?= $i++ ?></td>
                                            <td><?= $row['no_ktp']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['tmpt_lhr']; ?></td>
                                            <td><?= $row['tgl_lhr']; ?></td>
                                            <td align="left">
                                                <a href="?page=detail_masyarakat&id=<?= $row[0]; ?>"
                                                    class="btn btn-sm btn-success" title="Detail">Detail</a>
                                            </td>
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
    </div>
</div>

<?php
}
?>