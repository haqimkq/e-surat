<?php

include "../../../db/koneksi.php";


$id = $_GET['id'];
$query = $link->query("SELECT * FROM suratdispensasinikah  WHERE idSurat = '$id'  ");
$label = 'SURAT KETERANGAN DISPENSASI ';


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

    <h5>
        <center>
            <?php echo $label ?>
        </center>
    </h5>
    <div class="col-sm-10">
        <div class=" card-box table-responsive">
            <table border="0" cellspacing="0" cellpadding="6" width="100%">
                <thead style="background-color: #0000 ">
                    <?php $data = $query->fetch_array(); { ?>
                        <tr>
                            <div class="roww col-md-10">
                                <h6 align="justify">Berdasarkan pasal 3 ayat 3 Peraturan Pemerintah Nomor 9 Tahun 1975, Yang
                                    bertanda
                                    tangan
                                    di bawah ini CAMAT BANJARMASIN TIMUR atas nama WALIKOTA Banjarmasin, menerangakan dengan
                                    sebenarnya
                                    Bahwa :</h6>
                            </div>
                            <th style="padding-left: 90px; text-align: left; font-size: 10px; ">
                                Nama Pria
                                &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                :&emsp;<?php echo $data['namaPria']; ?>
                                <br>
                                <br>
                                Tempat, Tanggal Lahir
                                &emsp;:&emsp;<?php echo $data['tempatLahirPria']; ?>,<?= tgl($data['tglLahirPria']) ?>
                                <br>
                                <br>
                                Pekerjaan
                                &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['pekerjaanPria']; ?>
                                <br>
                                <br>
                                Kewarganegaraan
                                &emsp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['kewarganegaraanPria']; ?>
                                <br>
                                <br>
                                Tempat Tinggal
                                &emsp;&ensp;&ensp;&ensp;&emsp;&ensp;:&emsp;<?php echo $data['tempatTinggalPria']; ?>
                            </th>
                        </tr>
                </thead>
            </table>
            <br>

            <table border="0" cellspacing="0" cellpadding="6" width="100%">
                <thead style="background-color: #0000 ">
                    <tr>
                        <th style="padding-left: 90px; text-align: left; font-size: 10px; ">
                            Nama Wanita
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['namaWanita']; ?>
                            <br>
                            <br>
                            Tempat, Tanggal Lahir
                            &emsp;:&emsp;<?php echo $data['tempatLahirWanita']; ?>,<?= tgl($data['tglLahirWanita']) ?>
                            <br>
                            <br>
                            Pekerjaan
                            &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['pekerjaanWanita']; ?>
                            <br>
                            <br>
                            Kewarganegaraan
                            &emsp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['kewarganegaraanWanita']; ?>
                            <br>
                            <br>
                            Tempat Tinggal
                            &emsp;&ensp;&ensp;&ensp;&emsp;&ensp;:&emsp;<?php echo $data['tempatTinggalWanita']; ?>
                        </th>
                    </tr>
                <?php } ?>
                </thead>
            </table>

            <div class="roww col-md-12">
                <h6 align="justify">Bahwa nama-nama tersebut diatas akan melangsungkan akan Akad Nikah Pada hari
                    <?= namaHari($data['tglNikah']) ?> Tanggal <?= tgl($data['tglNikah']) ?>, Jam 08.00 wita di KUA
                    Banjarmasin Timur, sesuai atas
                    permintaan yang
                    bersangkutan.</h6>
                <h6 align="justify">Mengingat batas yang ditetapkan menurut undang-undang perkawinan ( UU No.1 Tahun
                    1974 ) Pasal 12 Peraturan pemerintah No.9 Tahun 1975 bab II pasal 3 tidak terpenuhi di sebabkan
                </h6>
                <h6 align="justify">1. Kesepakatan Keluarga
                </h6>
                <h6 align="justify">2. .....................
                </h6>
                <h6 align="justify">Bahwa kami tidak berkeberatan pernikahan akan dilaksankan dalam waktu kurang dari
                    sepuluh(10) hari kerja.
                </h6>
                <h6 align="justify">Demikian dispensasi ini diberikan untuk dapat dipergunakan sebagaimana mestinya dan
                    apabila terdalam kekeliruan dikemudian hari, ini dinyatakan tidak berlaku lagi.
                </h6>
            </div>
        </div>
    </div>
    <div style="text-align: center; display: inline-block; float: right;">
        <h6>
            Banjarmasin, <?php echo date('d') . ' ' . $bln[date('m')] . ' ' . date('Y') ?><br>
            Mengetahui,<br>
            Camat<br>
            <br><br>
            <br><br>

        </h6>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
</body>

</html>