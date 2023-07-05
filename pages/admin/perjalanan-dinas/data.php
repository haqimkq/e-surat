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
                        class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg mt-n3 ms-3">
                        <i class="material-icons opacity-10" aria-hidden="true">people</i>
                    </div>
                </div>
                <div class=" p-0 position-relative mt-n6 mx-4 z-index-4 ps-6">
                    <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                        <h6 class="text-white text-capitalize ps-3">Data Perjalanan Dinas</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-1">
                    <!-- <div class="col-2">
                            <a href="?page=tambahPerjalananDinas" class="btn btn-info">Tambah Data</a>
                        </div> -->
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
                                                Nama Pegawai </th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Tanggal Pergi</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Tanggal Kembali</th>
                                            <!-- <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Lama Kegiatan</th> -->
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $query = mysqli_query($link, "SELECT * FROM perjalanan_dinas  pd 
                                            join pegawai p on pd.id_pegawai = p.id_pegawai 
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
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapus_perjalananDinas&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="" align="left"><?= $i++ ?></td>
                                            <td class=""><?= $row['nm_pegawai']; ?></td>
                                            <td class=""><?= $row['tanggalPergi']; ?></td>
                                            <td class=""><?= $row['tanggalPulang']; ?></td>
                                            <!--  <td><?php
                                                                $pergi = new DateTimeImmutable($row['tanggalPergi']);
                                                                $pulang = new DateTimeImmutable($row['tanggalPulang']);
                                                                $interval = $pergi->diff($pulang);
                                                                echo $interval->format('%a Hari');
                                                                ?> </td> -->
                                            <td class=""><?php
                                                                    $keterangan = $row['keterangan'];
                                                                    $maxLength = 75; // Tentukan panjang maksimum yang diinginkan
                                                                    if (strlen($keterangan) > $maxLength) {
                                                                        $trimmedText = substr($keterangan, 0, $maxLength) . ' ...';
                                                                        echo $trimmedText;
                                                                    } else {
                                                                        echo $keterangan;
                                                                    }
                                                                    ?></td>

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