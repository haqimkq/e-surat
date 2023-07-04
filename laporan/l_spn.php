<?php

include "../db/koneksi.php";

$no = 1;
if (isset($_POST['cetak1'])) {
    /* $kec = $_POST['jenis']; */
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];

    $sql = mysqli_query($link, "SELECT * FROM spn sn
  join masyarakat m on sn.id_msy = m.id_msy 
  join pelayanan p on sn.id_pelayanan = p.id_pelayanan WHERE sn.tgl BETWEEN '$tgl1' AND '$tgl2' ORDER BY sn.tgl ");
    $label = 'LAPORAN DATA LEGALISASI SURAT PENGANTAR NIKAH  <br> Tanggal : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
    /* $label = 'LAPORAN DATA BARANG MASUK <br> JENIS : ' . $kec; */
} else {
    $sql = mysqli_query($link, "SELECT * FROM spn sn
  join masyarakat m on sn.id_msy = m.id_msy 
  join pelayanan p on sn.id_pelayanan = p.id_pelayanan ORDER BY sn.tgl  ");
    $label = 'LAPORAN DATA LEGALISASI SURAT PENGANTAR NIKAH';
}

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
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <style>
        a {
            color: var(--bs-link-color);
            text-decoration: none;
        }

        a:hover {
            color: var(--bs-link-hover-color);
            text-decoration: none;
        }

        .badge {
            --bs-badge-padding-x: 0.9em;
            --bs-badge-padding-y: 0.55em;
            --bs-badge-font-size: 0.75em;
            --bs-badge-font-weight: 700;
            --bs-badge-color: #000;
            --bs-badge-border-radius: 0.45rem;
            display: inline-block;
            padding: var(--bs-badge-padding-y) var(--bs-badge-padding-x);
            font-size: var(--bs-badge-font-size);
            font-weight: var(--bs-badge-font-weight);
            line-height: 1;
            color: var(--bs-badge-color);
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: var(--bs-badge-border-radius);
        }

        .badge:hover {
            color: var(--bs-highlight-bg);
            text-decoration: none;
        }

        .badge:empty {
            display: none;
        }

        .btn-success,
        .btn.bg-gradient-success {
            box-shadow: 0 3px 3px 0 rgba(76, 175, 80, 0.15),
                0 3px 1px -2px rgba(76, 175, 80, 0.2), 0 1px 5px 0 rgba(76, 175, 80, 0.15);
        }

        .btn-success:hover,
        .btn.bg-gradient-success:hover {
            background-color: #4caf50;
            border-color: #4caf50;
            box-shadow: 0 14px 26px -12px rgba(76, 175, 80, 0.4),
                0 4px 23px 0 rgba(76, 175, 80, 0.15), 0 8px 10px -5px rgba(76, 175, 80, 0.2);
        }

        .btn-success .btn.bg-outline-success,
        .btn.bg-gradient-success .btn.bg-outline-success {
            border: 1px solid #4caf50;
        }

        .btn-success:not(:disabled):not(.disabled).active,
        .btn-success:not(:disabled):not(.disabled):active,
        .show>.btn-success.dropdown-toggle,
        .btn.bg-gradient-success:not(:disabled):not(.disabled).active,
        .btn.bg-gradient-success:not(:disabled):not(.disabled):active,
        .show>.btn.bg-gradient-success.dropdown-toggle {
            color: color-yiq(#4caf50);
            background-color: #4caf50;
        }

        .btn-success.focus,
        .btn-success:focus,
        .btn.bg-gradient-success.focus,
        .btn.bg-gradient-success:focus {
            color: #fff;
        }

        .btn-outline-success {
            box-shadow: none;
        }

        .btn-outline-success:hover:not(.active) {
            background-color: transparent;
            opacity: 0.75;
            box-shadow: none;
            color: #4caf50;
        }
    </style>

    <link rel="icon" type="image/png" href="<?php echo "../image/bjm.png" ?>">
    <title>Laporan Legalisasi Surat Pengantar Nikah </title>
</head>

<body>
    <img src="../image/bjm.png" alt="Logo" align="left" width="90" height="120">
    <p align="center"><b>
            <br>
            <font size="5">Pelayanan Terpadu <br> Kecamatan Banjarmasin Timur </font><br>
            <font size="2">Jl. Manggis No.20, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan
                70236, Indonesia </font><br>
            <br>
            <hr size="3px" color="black">
        </b></p>

    <h3>
        <center>
            <?php echo $label ?>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="1" cellpadding="6" width="100%">
                    <thead style="background-color: #5F9EA0">
                        <tr>
                            <th style="text-align: center; font-size: 18px;">No</th>
                            <th style="text-align: center; font-size: 18px;">Nama Masyarakat</th>
                            <th style="text-align: center; font-size: 18px; width:15%;">Jenis Pelayanan</th>
                            <th style="text-align: center; font-size: 18px; width:8%;">Surat Dari Lurah</th>
                            <th style="text-align: center; font-size: 18px; width:8%;">Akte Cerai (Meniggal)</th>
                            <th style="text-align: center; font-size: 18px; width:8%;">Akte Cerai (Hidup)</th>
                            <th style="text-align: center; font-size: 18px; width:8%;">Surat Wali Nilah</th>
                            <th style="text-align: center; font-size: 18px; width:10%;">Foto KTP</th>
                            <th style="text-align: center; font-size: 18px; width:10%;">Pas Foto</th>
                            <th style="text-align: center; font-size: 18px;">Tanggal Pengajuan</th>
                            <th style="text-align: center; font-size: 18px;">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="left"><?= $data['nama']; ?></td>
                                <td align="center"> <?= $data['j_pelayanan']; ?></td>
                                <td class="w-10" align="center">
                                    <?php
                                    if (!empty($data['spn'])) {
                                        $pdfPath = '../pelayanan/' . $data['spn'];
                                        echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>√</a>";
                                    } else {
                                        echo "File PDF tidak tersedia";
                                    }
                                    ?>
                                </td>
                                <td class="w-10" align="center">
                                    <?php
                                    if (!empty($data['akte_c'])) {
                                        $pdfPath = '../pelayanan/' . $data['akte_c'];
                                        echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>√</a>";
                                    } else {
                                        echo "File PDF tidak tersedia";
                                    }
                                    ?>
                                </td>
                                <td class="w-10" align="center">
                                    <?php
                                    if (!empty($data['sk'])) {
                                        $pdfPath = '../pelayanan/' . $data['sk'];
                                        echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>√</a>";
                                    } else {
                                        echo "File PDF tidak tersedia";
                                    }
                                    ?>
                                </td>
                                <td class="w-10" align="center">
                                    <?php
                                    if (!empty($data['skwn'])) {
                                        $pdfPath = '../pelayanan/' . $data['skwn'];
                                        echo "<a class='badge bg-gradient-success ' href='$pdfPath' download>√</a>";
                                    } else {
                                        echo "File PDF tidak tersedia";
                                    }
                                    ?>
                                </td>
                                <td class="w-7" align="center">
                                    <?php echo "<a href='$data[ktp]' download><img src='$data[ktp]' width='100' height='70' style='border-radius: 5%;' /></a>"; ?>
                                </td>
                                <td class="w-10" align="center">
                                    <?php echo "<a href='$data[pas_foto]' download><img src='$data[pas_foto]' width='100' height='70' style='border-radius: 5%;' /></a>"; ?>
                                </td>
                                <td align="center"><?= tgl($data['tgl']) ?></td>
                                <td align="center"><?= $data['status']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    * Klik ( √ ) Untuk Download Berkas
                </table>

            </div>
        </div>
    </div>
    <br>
    <br>

    <br>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Banjarmasin, <?php echo date('d') . ' ' . $bln[date('m')] . ' ' . date('Y') ?><br>
            Mengetahui,<br>
            Camat<br>
            <br><br>
            <br><br>
            <u><b>Drs. Hj. Rusdiana, M.AP </b></u><br>
            <b>NIP. 196709071990 2 001</b><br>
        </h5>
    </div>



</body>

</html>