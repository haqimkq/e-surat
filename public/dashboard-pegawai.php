<?php


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
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h6 align="center">Data Penilaian Kinerja Pelayanan Dari Masyarakat</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1"> Total : <?php echo $hitungskpkec['total'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 ">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Input
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nilai Kinerja
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Keterangan Kinerja
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                               

                            </tbody>

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

    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card mt-3">
                <div class="card-header mb-xl- pb-0">
                    <div class="row">
                        <h6 align="center">Grafik Penilaian Kinerja Pelayanan Pada Kecamatan Banjarmasin Timur</h6>
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
                                        <div style="width: 100% ">
                                            <canvas id="chartId"></canvas>
                                        </div>
                                    </strong></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-1">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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