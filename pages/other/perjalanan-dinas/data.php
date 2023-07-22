<?php
session_start();
include "../db/koneksi.php";
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0);
    return $hasil_rupiah;
}

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
                        <div class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg mt-n3 ms-3">
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
                                                <!-- <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                    Aksi</th> -->
                                                <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                    No.
                                                </th>
                                                <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                    Nama </th>
                                                <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                    NIK</th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Tanggal <br> Pergi</th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Tanggal <br> Kembali</th>
                                                <th class=" text-secondary text-s font-weight-bolder opacity-7">
                                                    Tujuan</th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Budget <br> Transportasi</th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Budget <br> Penginapan</th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Perihal </th>
                                                <th class=" text-secondary text-center text-s font-weight-bolder opacity-7">
                                                    Detail Surat </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $id = $_SESSION['id_user'];
                                            $query = mysqli_query($link, "SELECT * FROM surat_perjalanan_dinas  spd 
                                            join pegawai p on spd.id_pegawai = p.id_pegawai 
                                            where id_user='$id'");
                                            $i = 1;
                                            while ($row = $query->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td align="left"><?= $i++ ?></td>
                                                    <td><?= $row['nm_pegawai']; ?></td>
                                                    <td><?= $row['nip']; ?></td>
                                                    <td class=""><?= $row['tglPergi']; ?></td>
                                                    <td class=""><?= $row['tglPulang']; ?></td>
                                                    <td class=""><?= $row['tujuan']; ?></td>
                                                    <td align="center"><?php echo rupiah($row['budgetTransportasi']);  ?></td>
                                                    <td align="center"><?php echo rupiah($row['budgetPenginapan']);  ?></td>
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