<?php

$pegawai = mysqli_query($link, "SELECT COUNT(*) AS total FROM pegawai ");
$hitungpegawai = mysqli_fetch_array($pegawai);

$tamu = mysqli_query($link, "SELECT COUNT(*) AS total FROM tamu ");
$hitungtamu = mysqli_fetch_array($tamu);

$suratmasuk = mysqli_query($link, "SELECT COUNT(*) AS total FROM surat_masuk ");
$hitungsuratmasuk = mysqli_fetch_array($suratmasuk);

$suratkeluar = mysqli_query($link, "SELECT COUNT(*) AS total FROM surat_keluar ");
$hitungsuratkeluar = mysqli_fetch_array($suratkeluar);

$disposisi = mysqli_query($link, "SELECT COUNT(*) AS total FROM disposisi ");
$hitungdisposisi = mysqli_fetch_array($disposisi);

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
    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

?>


<div class="container-fluid py-2">
    <h6>
        Data Masuk Pada Dashboard ..
    </h6>
    <div class="row py-3">
        <div class="col-xl-6 col-sm-4 mt-2 mb-3">
            <div class="card ">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Pegawai</p>
                        <h4 class="mb-0"> <a href="?page=data_pegawai"><?php echo $hitungpegawai['total'] ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Total</span> Data</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-3 mt-2">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success  text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"> Data Tamu</p>
                        <h4 class="mb-0"><a href="?page=data_tamu"><?php echo $hitungtamu['total']; ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Total</span> Tamu</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row py-3">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Rekomendasi Dispensasi Nikah</p>
                        <h4 class="mb-0"><a href="?page=data_dispensasiNikah"><?php echo $hitungrdn['total']; ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0  mb-3">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Legalisasi Proposal</p>
                        <h4 class="mb-0"><a href="?page=data_proposal"><?php echo $hitunglp['total']; ?></a></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
    </div> -->
    

    <div class="row">
        <div class="col-12 mt-3 col-md-6">
            <div class="card ">
                <div class="card-header mb-xl- pb-0">
                    <div class="row">
                        <h6 align="center">Grafik Surat Menyurat </h6>
                        <div class="col-md-12">
                            <div class="control-panel">
                                <style>
                                    canvas {
                                        -moz-user-select: none;
                                        -webkit-user-select: none;
                                        -ms-user-select: none;
                                    }
                                </style>
                                <center><strong>
                                        <div style="width: 100%">
                                            <canvas class="mt-3 mb-2" id="myChart"></canvas>
                                        </div>
                                    </strong></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-1 ">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-3 col-md-10">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6 align="center"> DINAS PERHUBUNGAN <br> PROVINSI KALIMANTAN SELATAN</h6>

                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold"></span> Visi - Misi
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-2">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Visi</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">“Terwujudnya Pelayanan Transportasi Berkelanjutan Dan Berintegrasi Di Kalimantan Selatan Yang Aman, Nyaman dan Terjangkau””</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-2 ">
                            <span class="timeline-step ">
                                <i class="material-icons text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Misi</h6>
                                <p align="justify" class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    1.Mewujudkan Penyelenggaraan Transportasi Yang Efektif Dan Efisien Yang Berorientasi Pada Pelayanan Publik. <br><br>
                                    2.Mewujudkan Fasilitas Keselamatan Bidang Perhubungan Yang Merata Guna Mendukung Percepatan Pengembangan Ekonomi dan Sosial Budaya. <br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'Surat Masuk',
            'Surat Keluar',
            'Disposisi',
        ],


        datasets: [{
            label: 'Akumulasi Jumlah data Surat Menyurat',
            data: [<?php echo $hitungsuratmasuk['total'] ?>, <?php echo $hitungsuratkeluar['total'] ?>,
                <?php echo $hitungdisposisi['total'] ?>,
            ],
            backgroundColor: [
                'rgb(25, 205, 77)',
                'rgb(54, 162, 235)',
                'rgb(19, 17, 0)',
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: false,
    },
});
</script>
<script>
var chrt = document.getElementById("chartId").getContext("2d");
var chartId = new Chart(chrt, {
    type: 'polarArea',
    data: {
        labels: ['Sangat Baik',
            'Baik',
            'Cukup',
            'Kurang ',
            'Buruk ',
        ],
        datasets: [{
            label: "Akumulasi Jumlah data penilaian",
            data: [<?php echo $hitungsb['total'] ?>, <?php echo $hitungb['total'] ?>,
                <?php echo $hitungc['total'] ?>, <?php echo $hitungk['total'] ?>,
                <?php echo $hitungbrk['total'] ?>,
            ],
            backgroundColor: [
                'rgb(25, 205, 77)',
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
                'rgb(255, 205, 86)',
                'rgb(19, 17, 0)',
            ],
        }],
    },
    options: {
        responsive: false,
    },
});
</script>