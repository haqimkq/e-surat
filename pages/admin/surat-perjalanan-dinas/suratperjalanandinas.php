<?php

include "../../../db/koneksi.php";


$id = $_GET['id'];
$query = $link->query("SELECT * FROM surat_perjalanan_dinas  spd 
join pegawai p on spd.id_pegawai = p.id_pegawai WHERE idSuratPerjalanan = '$id'  ");
$label = 'SURAT PERINTAH TUGAS ';


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
    <title>Surat Perintah Tugas</title>
</head>

<body>

    <img src="../../../image/bjm.png" alt="Logo" align="left" width="90" height="120">
    <p align="center"><b>
            <br>
            <font size="6">Pemerintah Kota Banjarmasin <br> Kecamatan Banjarmasin Timur </font><br>
            <font size="3">Jl. Manggis No.20, Kuripan, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan
                70236, Indonesia </font><br>
            <br>
            <hr size="2px" color="black">
        </b></p>

    <h2>
        <center>
            <?php echo $label ?>
        </center>
    </h2>
    <div class="col-sm-10">
        <div class=" card-box table-responsive">
            <table border="0" cellspacing="0" cellpadding="6" width="100%">
                <thead style="background-color: #0000 ">
                    <?php $data = $query->fetch_array(); { ?>
                        <tr>
                            <div class="roww col-md-10">
                                <h2 align="justify">MEMERINTAHKAN :</h2>
                            </div>
                            <th style="padding-left: 90px; text-align: left; font-size: 25px; ">
                                Nama Pegawai
                                &emsp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['nm_pegawai']; ?>
                                <br>
                                <br>
                                NIP
                                &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp; &ensp;
                                :&emsp;<?php echo $data['nip']; ?>
                                <br>
                                <br>
                                Tanggal Pergi
                                &emsp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?= tgl($data['tglPergi']) ?>
                                <br>
                                <br>
                                Tanggal Pulang
                                &emsp;&ensp;&ensp; :&emsp;<?= tgl($data['tglPulang']) ?>
                                <br>
                                <br>
                                Keterangan
                                &emsp;&ensp;&ensp;&ensp;&ensp;&ensp; :&emsp;<?php echo $data['perihal']; ?>
                            </th>
                        </tr>
                    <?php } ?>
                </thead>
            </table>
        </div>
    </div>
    <div style="text-align: center; display: inline-block; float: right;">
        <h3>
            Banjarmasin, <?php echo date('d') . ' ' . $bln[date('m')] . ' ' . date('Y') ?><br>
            Mengetahui,<br>
            Camat<br>
            <br><br>
            <br><br>

            <u><b>Drs. Hj. Rusdiana, M.AP </b></u><br>
            <b>NIP. 196709071990 2 001</b><br>
        </h3>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>

</html>