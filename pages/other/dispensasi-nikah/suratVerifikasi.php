<?php

include "../../../db/koneksi.php";


$id = $_GET['id'];
$query = $link->query("SELECT * FROM rdn r
join masyarakat m on r.id_msy = m.id_msy 
join pelayanan p on r.id_pelayanan = p.id_pelayanan  WHERE id_rdn = '$id'  ");
$label = 'SURAT BALASAN DARI KECAMATAN';



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

        .roww h4 {
            text-align: justify;
            padding-left: 70px;
        }
    </style>

    <link rel="icon" type="image/png" href="<?php echo "../../../image/bjm.png" ?>">
    <title>Surat Balasan Legalisasi Proposal </title>
</head>

<body>
    <img src="../../../image/bjm.png" alt="Logo" align="left" width="90" height="120">
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
    <div class="col-sm-10">
        <div class=" card-box table-responsive">
            <table border="0" cellspacing="0" cellpadding="6" width="100%">
                <thead style="background-color: #0000 ">
                    <?php $data = $query->fetch_array(); { ?>
                        <tr>
                            <div class="roww col-md-10">
                                <h4 align="justify">Berdasarkan Hasil Pemeriksaan berkas untuk keperluan
                                    <i><?php echo $data['j_pelayanan']; ?></i>, Dengan surat ini, Kecamatan menerangkan
                                    dengan
                                    sebenarnya Bahwa :
                                </h4>
                            </div>
                            <th style="padding-left: 90px; text-align: left; font-size: 15px; ">
                                Nama Pemohon
                                &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                :&emsp;<?php echo $data['nama']; ?>
                                <br>
                                <br>
                                Tanggal Permohonan &emsp;&emsp;&emsp; :&emsp;<?= tgl($data['tgl']) ?>
                                <br>
                                <br>
                                Status Permohonan
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;:&emsp;<?php echo $data['status']; ?>
                            </th>
                        </tr>
                </thead>
            </table>
            <div class="roww col-md-12">
                <h4 align="justify">Bahwa nama tersebut diatas telah melakukan pemeriksaan pemberkasan untuk keperluan
                    layanan Kecamatan
                    Banjarmasin Timur, sesuai atas
                    permintaan yang
                    bersangkutan.</h4>
                <h4 align="justify">Demikian surat ini diberikan untuk dapat dipergunakan sebagaimana mestinya
                    dan
                    apabila terdapat kekeliruan dikemudian hari, ini dinyatakan tidak berlaku lagi.</h4>
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
            <?php echo "<a><img src='../../../img/{$data['qrCode']}' width='70' height='70'  /></a>"; ?><br><br>
            <u><b>Drs. Hj. Rusdiana, M.AP </b></u><br>
            <b>NIP. 196709071990 2 001</b><br>
        </h5>
    </div>

<?php } ?>

</body>

</html>