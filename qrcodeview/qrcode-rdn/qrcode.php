<?php

include "../../db/koneksi.php";

$id = $_GET['id'];

$query = $link->query("SELECT * FROM qrcode qr join pelayanan p on qr.id_pelayanan = p.id_pelayanan WHERE idCode = '$id'");



$label = 'VERIFIKASI QR CODE';

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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo "../../image/bjm.png" ?>">
    <title>QRCode Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <style type="text/css">
        body {
            /*background: orange;*/
        }

        h2,
        h3 {
            text-align: center;
        }

        .kotak {
            width: 300px;
            border: 1px dashed black;
            margin: 10px auto;
            padding: 20px;
            text-align: center;
        }

        .hasil {
            text-align: center;
        }
    </style>

    <h1 class="mt-5" align="center">Klik Tombol Untuk Mendapatakan QRCODE</h1>


    <div class="kota">
        <form method="GET" action="qrcode.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- <input type="submit" value="Buat QR Code"> -->
        </form>
    </div>

    <div class="hasil">
        <?php
        if (isset($_GET['id'])) {
            // isi qrcode yang ingin dibuat. akan muncul saat di scan
            $isi = $_GET['id'];
            $idData = urlencode($isi);
            $generatedUrl = "http://localhost/aev/qrcodeview/qrcode-rdn/qrcodeview.php?id={$idData}";

            // memanggil library php qrcode
            include "../../phpqrcode/qrlib.php";

            // nama folder tempat penyimpanan file qrcode
            $penyimpanan = "../../img/imgqrcode/";

            // membuat folder dengan nama "temp"
            if (!file_exists($penyimpanan))
                mkdir($penyimpanan);

            // perintah untuk membuat qrcode dan menyimpannya dalam folder temp
            // atur level pemulihan datanya dengan QR_ECLEVEL_L | QR_ECLEVEL_M | QR_ECLEVEL_Q | QR_ECLEVEL_H
            // atur pixel qrcode pada parameter ke 4
            // atur jarak frame pada parameter ke 5
            QRcode::png($generatedUrl, $penyimpanan . 'hasil_qrcode.png', QR_ECLEVEL_L, 10, 5);

            // menampilkan qrcode
            echo '<img src="' . $penyimpanan . 'hasil_qrcode.png">';
            // tombol download qrcode
            echo '<br><br>';
            echo '<a class="btn btn-success" href="' . $penyimpanan . 'hasil_qrcode.png" download>Download QR Code</a>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>