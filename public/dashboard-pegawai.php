<?php

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
        Data Entry Masuk Pada Dashboard ..
        <!-- <a href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard ">this link</a> -->
    </h6>
    <div class="row mt-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
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
        <div class="col-lg-4 col-md-10">
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
    type: 'doughnut',
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