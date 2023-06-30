<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {
    // $id = $_SESSION['id_user'];
    // $query = mysqli_query($link, "SELECT * FROM  WHERE id_msy = '$id'");
    // $data = $query->fetch_array();
?>


<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="d-flex">
                    <div
                        class="icon icon-shape icon-lg bg-gradient-warning shadow text-center border-radius-lg mt-n3 ms-3">
                        <i class="material-icons opacity-10" aria-hidden="true">people</i>
                    </div>
                </div>
                <div class=" p-0 position-relative mt-n6 mx-4 z-index-4 ps-6">
                    <div class="bg-gradient-warning shadow border-radius-lg pt-3 pb-3 ">
                        <h6 class="text-white text-capitalize ps-3">Data Pengajuan Surat Dispensasi Nikah</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-1">
                    <div class="col-2">
                        <a href="?page=tambahSuratDispensasiNikah" class="btn btn-warning">Tambah Data</a>
                    </div>
                    <!-- <hr class="horizontal dark"> -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-2">
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
                                                Nama Pemohon</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Tanggal Nikah</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Detail Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $id = $_SESSION['id_user'];
                                            $query = mysqli_query($link, "SELECT * FROM suratdispensasinikah s
                                            join masyarakat m on s.id_msy = m.id_msy 
                                            join pelayanan p on s.id_pelayanan = p.id_pelayanan 
                                            where id_user='$id'");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <td class="w-3">
                                                <div class="mt-3">
                                                    <button type="button"
                                                        class="btn btn-warning dropdown-toggle border-radius-lg px-3 py-1 "
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                                        role="menu">
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                href="?page=editSuratDispensasiNikah&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-edit"></i>
                                                                Edit Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapusSuratDispensasiNikah&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="w-3" align="left"><?= $i++ ?></td>
                                            <td class="w-25"><?= $row['nama']; ?></td>
                                            <td class="w-20"><?= $row['tglNikah']; ?></td>
                                            <td align="left">
                                                <?php {
                                                            echo "<a class='badge bg-gradient-success' target='_blank' href='../pages/other/surat-dispensasi-nikah/suratDispensasi.php?id={$row[0]}'><i class='fa fa-edit'></i> Print</a>";
                                                        }
                                                        ?>
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