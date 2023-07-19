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
                        <h6 class="text-white text-capitalize ps-3">Data Surat Keterangan Tidak Mampu</h6>
                    </div>
                </div>
                <div class="card-body p-3 mt-1">
                    <!-- <div class="col-2">
                        <a href="?page=tambahSktm" class="btn btn-info">Tambah Data</a>
                    </div> -->
                    <!-- <hr class="horizontal dark"> -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-2">
                            <table id="example" class="table align-items-center">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <!-- <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Aksi</th> -->
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                No.
                                            </th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Jenis layanan</th>
                                            <th
                                                class=" w-5 text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Surat Dari <br> Lurah</th>
                                            <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                Foto KTP</th>
                                            <th
                                                class="w-5 text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Foto Kartu <br> Keluarga</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Surat Dari <br> RT</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Verifikasi Admin</th>
                                            <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                Verifikasi Camat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $id = $_SESSION['id_user'];
                                            $query = mysqli_query($link, "SELECT * FROM sktm  stm 
                                            join masyarakat m on stm.id_msy = m.id_msy 
                                            join pelayanan p on stm.id_pelayanan = p.id_pelayanan 
                                            ");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                        <tr>
                                            <!-- <td>
                                                <div class="w-3 mt-3">
                                                    <button type="button"
                                                        class="btn btn-info dropdown-toggle border-radius-lg px-3 py-1 "
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu shadow-lg mt-2  dropdown-menu-end px-2 py-2 me-sm-n4"
                                                        role="menu">
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                href="?page=edit_sktm&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-edit"></i>
                                                                Edit Data</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item border-radius-md"
                                                                onclick="return confirm ('Anda yakin ingin menghapus data ?');"
                                                                href="?page=hapus_sktm&id=<?= $row[0]; ?>">
                                                                <i class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td> -->
                                            <td class="w-3" align="left"><?= $i++ ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['j_pelayanan']; ?></td>

                                            <td class="w-5" align="center">
                                                <?php
                                                        if (!empty($row['s_sktm'])) {
                                                            $pdfPath = '../pelayanan/' . $row['s_sktm'];
                                                            echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>Download</a>";
                                                        } else {
                                                            echo "File PDF tidak tersedia";
                                                        }
                                                        ?>
                                            </td>
                                            <td class="w-2" align="center">
                                                <?php echo "<img src='$row[ktp]' width='70' height='70' style='border-radius: 50%;' />"; ?>
                                            </td>
                                            <td align="center">
                                                <?php echo "<img src='$row[kk]' width='70' height='70' style='border-radius: 50%;' />"; ?>
                                            </td>
                                            <td class="w-5" align="center">
                                                <?php
                                                        if (!empty($row['s_pernyataan'])) {
                                                            $pdfPath = '../pelayanan/' . $row['s_pernyataan'];
                                                            echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>Download</a>";
                                                        } else {
                                                            echo "File PDF tidak tersedia";
                                                        }
                                                        ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                        $statusAdmin = $row['statusAdmin'];
                                                        $badgeColor = '';
                                                        switch ($statusAdmin) {
                                                            case 'Proses':
                                                                $badgeColor = 'bg-gradient-warning';
                                                                break;
                                                            case 'Diterima':
                                                                $badgeColor = 'bg-gradient-success';
                                                                break;
                                                            case 'Ditolak':
                                                                $badgeColor = 'bg-gradient-primary';
                                                                break;
                                                            default:
                                                                $badgeColor = 'bg-gradient-secondary';
                                                                break;
                                                        }
                                                        ?>
                                                <span class="badge <?= $badgeColor; ?>"><?= $statusAdmin; ?></span>
                                            </td>
                                            <td align="center">
                                                <?php
                                                        $statusCamat = $row['statusCamat'];
                                                        $badgeColor = '';
                                                        switch ($statusCamat) {
                                                            case 'Proses':
                                                                $badgeColor = 'bg-gradient-warning';
                                                                break;
                                                            case 'Diterima':
                                                                $badgeColor = 'bg-gradient-success';
                                                                break;
                                                            case 'Ditolak':
                                                                $badgeColor = 'bg-gradient-primary';
                                                                break;
                                                            default:
                                                                $badgeColor = 'bg-gradient-secondary';
                                                                break;
                                                        }
                                                        ?>
                                                <a href="?page=eSktm&id=<?= $row[0]; ?>"
                                                    class="badge <?= $badgeColor; ?>"><?= $statusCamat; ?></a>
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