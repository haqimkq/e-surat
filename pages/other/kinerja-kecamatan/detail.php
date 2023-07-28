<?php

include "../../../db/koneksi.php";



$id = $_GET['id'];
$query = $link->query("SELECT  * FROM skpKecamatan s join masyarakat m on s.id_msy = m.id_msy where idSkpKec = '$id'");

$label = 'DETAIL PENILAI UNTUK PELAYANAN PADA KECAMATAN BANJARMASIN TIMUR ';


$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);


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

function namaHari($tanggal)
{
    $namaHari = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    $timestamp = mktime(0, 0, 0, (int)$pecahkan[1], (int)$pecahkan[0], (int)$pecahkan[2]);
    $nomorHari = date('w', $timestamp);

    return $namaHari[$nomorHari];
}
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <style>
        .container,
        .container-fluid,
        .container-sm,
        .container-md,
        .container-lg,
        .container-xl,
        .container-xxl {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            width: 87%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-right: auto;
            margin-left: auto;
        }

        .roww h6 {
            text-align: justify;
            padding-left: 70px;
        }
    </style>
    <!-- <link id="pagestyle" href="../../../../aev/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" /> -->

    <link rel="icon" type="image/png" href="<?php echo "../../../image/bjm.png" ?>">
    <title>Surat Dispensasi Nikah </title>
</head>

<body>

    <img src="../../../image/bjm.png" alt="Logo" align="left" width="70" height="100">
    <p align="center"><b>
            <br>
            <font size="5">Pemerintah Kota Banjarmasin <br> Kecamatan Banjarmasin Timur </font><br>
            <font size="2">Jl. Manggis No.20, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan
                70236, Indonesia </font><br>
            <br>
            <hr size="2px" color="black">
        </b></p>

    <h4>
        <center>
            <?php echo $label ?>
        </center>
    </h4>
    <div class=" container col-sm-12">
        <div class="card-box table-responsive">
            <table border="0" cellspacing="0" cellpadding="6" width="100%">
                <thead style="background-color: #0000">
                    <?php
                    $no = 1;
                    $data = $query->fetch_array(); { ?>

                        <tr>
                            <th style="text-align: left; font-size: 18px;">

                                No KTP &emsp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp;
                                &emsp;&emsp;&emsp;&emsp;:
                                <?php echo $data['no_ktp']; ?>
                                <br>
                                <br>
                                Nama Masyarakat &emsp;&emsp;&emsp;&ensp; &emsp; &ensp; &ensp; :
                                <?php echo $data['nama']; ?>
                                <br>
                                <br>
                                Tanggal Pemberian Kinerja &emsp; &emsp; : <?= tgl($data['tgl_kinerja']) ?>
                                <br>
                                <br>
                                Keterangan &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : <?php

                                                                                                    if ($data['nilai_prestasi_kerja'] >= 80 && $data['nilai_prestasi_kerja'] <= 100) {
                                                                                                        echo "Sangat Baik";
                                                                                                    } else if ($data['nilai_prestasi_kerja'] >= 70 && $data['nilai_prestasi_kerja'] <= 80) {
                                                                                                        echo "Baik";
                                                                                                    } else if ($data['nilai_prestasi_kerja'] >= 60 && $data['nilai_prestasi_kerja'] <= 70) {
                                                                                                        echo "Cukup";
                                                                                                    } else if ($data['nilai_prestasi_kerja'] >= 40 && $data['nilai_prestasi_kerja'] <= 60) {
                                                                                                        echo "Kurang";
                                                                                                    } else if ($data['nilai_prestasi_kerja'] >= 0 && $data['nilai_prestasi_kerja'] <= 39) {
                                                                                                        echo "Buruk";
                                                                                                    }

                                                                                                    ?>
                            </th>
                        </tr>
                </thead>
                <div class="card-box table-responsive">
                    <table border="1" align="center" cellspacing="0" cellpadding="6" width="70%">
                        <thead style="background-color: #0000">
                            <thead style="background-color: #F9F54B">
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <br>
                            <br>
                        <tbody>
                            <tr>
                                <td style=" font-size: 18px;">Nilai SKP</td>
                                <td align="center"><?= $data['nilai_skp']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Pelayanan </td>
                                <td align="center"><?= $data['orientasi_pelayanan']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Komitmen </td>
                                <td align="center"><?= $data['komitmen']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Kerjasama </td>
                                <td align="center"><?= $data['kerjasama']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Integritas </td>
                                <td align="center"><?= $data['integritas']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Disiplin </td>
                                <td align="center"><?= $data['disiplin']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Nilai Prilaku Kerja</td>
                                <td align="center"><?= $data['nilai_perilaku_kerja']; ?></td>
                            </tr>
                            <tr>
                                <td style=" font-size: 18px;">Nilai Total Kinerja</td>
                                <td align="center"><?= $data['nilai_prestasi_kerja']; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
        </div>
    </div>
    <!-- <div style="text-align: center; display: inline-block; float: right;">
        <h6>
            Banjarmasin, <?php echo date('d') . ' ' . $bln[date('m')] . ' ' . date('Y') ?><br>
            Mengetahui,<br>
            Camat<br>
            <br><br>
            <br><br>

        </h6>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>

</html>