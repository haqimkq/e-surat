<?php

include "../../db/koneksi.php";


$id = $_GET['id'];
$query = $link->query("SELECT * FROM qrcode qr join pelayanan p on qr.id_pelayanan = p.id_pelayanan WHERE idCode = '$id'  ");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo "../../image/bjm.png" ?>">
    <title>VERIFIKASI PELAYANAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2Fb%2Fbd%2FCheckmark_green.svg%2F1200px-Checkmark_green.svg.png&f=1&nofb=1&ipt=6a8d69535048b3c81f63ec06473ec3568f780d0f46ebaa4710647a430aae16d3&ipo=images" alt="" width="90" height="75">
                            <h5 class="mt-3"><strong><u>QR-CODE BERHASIL TERVERIFIKASI</u></strong></h5>
                        </div>
                        <div class="card-body">
                            <?php
                            $no = 1;
                            $data = $query->fetch_array(); { ?>
                                <div class="table-responsive">
                                    <table class="table ">
                                        <tr>
                                            <th>Penandatangan/Sebagai</th>
                                            <td>:</td>
                                            <td><?php echo $data['namaTtd']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>NIP</th>
                                            <td>:</td>
                                            <td><?php echo $data['nip']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Masyarakat</th>
                                            <td>:</td>
                                            <td><?php echo $data['namaMsy']; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Keperluan</th>
                                            <td>:</td>
                                            <td><?php echo $data['j_pelayanan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ditandatangi Tanggal</th>
                                            <td>:</td>
                                            <td><?= tgl($data['tanggalTtd']) ?></td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>