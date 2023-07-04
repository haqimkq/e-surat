<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {



    function tgl($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
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
                        <h6 class="text-white text-capitalize ps-3">Data Penilaian Kinerja Pelayanan Kecamatan</h6>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="col-2 ">
                        <a href="?page=tambahKinerjaKecamatan" class="btn btn-info">Tambah Data</a>
                    </div>
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
                                                No KTP</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Nama Masyrakat</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Tanggal Pemberian <br> Kinerja </th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Nilai Kinerja </th>
                                            <th
                                                class=" text-secondary w-5 text-center text-s font-weight-bolder opacity-7">
                                                Keterangan <br> Kinerja </th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Detail Kinerja <br> Kecamatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $id = $_SESSION['id_user'];
                                            $query = mysqli_query($link, "SELECT * FROM skpkecamatan s 
                                            join masyarakat m on s.id_msy = m.id_msy where id_user='$id'
                                            ");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <td class="w-5">
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle border-radius-lg px-3 py-1 "
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                                        role="menu">
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                href="?page=editKinerjaKecamatan&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-edit"></i>
                                                                Edit Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapusKinerjaKecamatan&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="w-2" align="center"><?= $i++ ?></td>
                                            <td class="w-7"><?= $row['no_ktp']; ?></td>
                                            <td class="w-15"><?= $row['nama']; ?></td>
                                            <td class="w-5" align="center"><?= tgl($row['tgl_kinerja']); ?></td>
                                            <td class="w-5" align="center"><?= $row['nilai_prestasi_kerja']; ?></td>
                                            <td align=" center">
                                                <?php

                                                        if ($row['nilai_prestasi_kerja'] >= 80 && $row['nilai_prestasi_kerja'] <= 100) {
                                                            echo "Sangat Baik";
                                                        } else if ($row['nilai_prestasi_kerja'] >= 70 && $row['nilai_prestasi_kerja'] <= 80) {
                                                            echo "Baik";
                                                        } else if ($row['nilai_prestasi_kerja'] >= 60 && $row['nilai_prestasi_kerja'] <= 70) {
                                                            echo "Cukup";
                                                        } else if ($row['nilai_prestasi_kerja'] >= 40 && $row['nilai_prestasi_kerja'] <= 60) {
                                                            echo "Kurang";
                                                        } else if ($row['nilai_prestasi_kerja'] >= 0 && $row['nilai_prestasi_kerja'] <= 39) {
                                                            echo "Buruk";
                                                        }

                                                        ?>
                                            <td class="w-5" align="center">
                                                <?php {
                                                            echo "<a class='badge bg-gradient-success' target='_blank' href='../pages/other/kinerja-kecamatan/detail.php?id={$row[0]}'>Detail</a>";
                                                        }
                                                        ?>
                                            </td>
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