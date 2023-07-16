<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

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
                        <h6 class="text-white text-capitalize ps-3">Data Surat Perintah Tugas Perjalanan Dinas</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-1">
                    <div class="col-2">
                        <a href="?page=tambah_suratPerjalananDinas" class="btn btn-info">Tambah Data</a>
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
                                            <th class=" text-secondary  text-s font-weight-bolder opacity-7">
                                                Nama Pegawai </th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Tanggal <br> Pergi</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Tanggal <br> Kembali</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Keterangan</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Detail Surat </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query = mysqli_query($link, "SELECT * FROM surat_perjalanan_dinas  spd 
                                            join pegawai p on spd.id_pegawai = p.id_pegawai 
                                            ");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <td class="">
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
                                                                href="?page=edit_suratPerjalananDinas&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-edit"></i>
                                                                Edit Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapus_suratPerjalananDinas&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="" align="left"><?= $i++ ?></td>
                                            <td class=""><?= $row['nm_pegawai']; ?></td>
                                            <td class=""><?= $row['tglPergi']; ?></td>
                                            <td class=""><?= $row['tglPulang']; ?></td>
                                            <td class=""><?php
                                                                    $keterangan = $row['perihal'];
                                                                    $maxLength = 75; // Tentukan panjang maksimum yang diinginkan
                                                                    if (strlen($keterangan) > $maxLength) {
                                                                        $trimmedText = substr($keterangan, 0, $maxLength) . ' ...';
                                                                        echo $trimmedText;
                                                                    } else {
                                                                        echo $keterangan;
                                                                    }
                                                                    ?></td>

                                            <td align="center">
                                                <?php {
                                                            echo "<a class='badge bg-gradient-success' target='_blank' href='../pages/admin/surat-perjalanan-dinas/suratperjalanandinas.php?id={$row[0]}'><i class='fa fa-edit'></i> Print</a>";
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