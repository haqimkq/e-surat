<?php

$sbp = mysqli_query($link, "SELECT COUNT(*) AS total FROM skp where nilai_prestasi_kerja between  80 and 100   ");
$hitungsbp = mysqli_fetch_array($sbp);

$bp = mysqli_query($link, "SELECT COUNT(*) AS total FROM skp where nilai_prestasi_kerja between   70 and 79  ");
$hitungbp = mysqli_fetch_array($bp);

$cp = mysqli_query($link, "SELECT COUNT(*) AS total FROM skp where nilai_prestasi_kerja between   60 and 69  ");
$hitungc = mysqli_fetch_array($cp);

$kp = mysqli_query($link, "SELECT COUNT(*) AS total FROM skp where nilai_prestasi_kerja between   40 and 59  ");
$hitungkp = mysqli_fetch_array($kp);

$brkp = mysqli_query($link, "SELECT COUNT(*) AS total FROM skp where nilai_prestasi_kerja between   0 and 39  ");
$hitungbrkp = mysqli_fetch_array($brkp);

$skpkec = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan ");
$hitungskpkec = mysqli_fetch_array($skpkec);

$spn = mysqli_query($link, "SELECT COUNT(*) AS total FROM spn ");
$hitungspn = mysqli_fetch_array($spn);

$sktm = mysqli_query($link, "SELECT COUNT(*) AS total FROM sktm ");
$hitungsktm = mysqli_fetch_array($sktm);

$sk = mysqli_query($link, "SELECT COUNT(*) AS total FROM s_keluarga ");
$hitungsk = mysqli_fetch_array($sk);

$rdn = mysqli_query($link, "SELECT COUNT(*) AS total FROM rdn ");
$hitungrdn = mysqli_fetch_array($rdn);

$lp = mysqli_query($link, "SELECT COUNT(*) AS total FROM proposal ");
$hitunglp = mysqli_fetch_array($lp);

$sb = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan where nilai_prestasi_kerja between  80 and 100   ");
$hitungsb = mysqli_fetch_array($sb);

$b = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan where nilai_prestasi_kerja between   70 and 79  ");
$hitungb = mysqli_fetch_array($b);

$c = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan where nilai_prestasi_kerja between   60 and 69  ");
$hitungc = mysqli_fetch_array($c);

$k = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan where nilai_prestasi_kerja between   40 and 59  ");
$hitungk = mysqli_fetch_array($k);

$brk = mysqli_query($link, "SELECT COUNT(*) AS total FROM skpkecamatan where nilai_prestasi_kerja between   0 and 39  ");
$hitungbrk = mysqli_fetch_array($brk);


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
                                <?php
                                $i = 1;
                                $query = mysqli_query($link, "SELECT * FROM  skpkecamatan s 
                                join masyarakat m on s.id_msy = m.id_msy order by tgl_kinerja DESC LIMIT 6 
                                ");

                                while ($row = $query->fetch_array()) {
                                ?>
                                <tr>
                                    <td class="w-3" align="center"><?= $i++ ?></td>
                                    <td align="left"><?= $row['nama']; ?></td>
                                    <td align="center"><?= tgl($row['tgl_kinerja']) ?></td>
                                    <td class="w-5" align="center"><?= $row['nilai_prestasi_kerja']; ?></td>
                                    <td align=" center">
                                        <?php

                                            if ($row['nilai_prestasi_kerja'] >= 80 && $row['nilai_prestasi_kerja'] <= 100) {
                                                echo "Sangat Baik";
                                            } else if ($row['nilai_prestasi_kerja'] >= 70 && $row['nilai_prestasi_kerja'] <= 80) {
                                                echo "Baik";
                                            } else if ($row['nilai_prestasi_kerja'] >= 60 && $row['nilai_prestasi_kerja'] <= 70) {
                                                echo "Cukup";
                                            } else if ($row['nilai_prestasi_kerja'] >= 40 && $row['nilai_prestasi_kerja'] <= 60) {
                                                echo "Kurang";
                                            } else if ($row['nilai_prestasi_kerja'] >= 0 && $row['nilai_prestasi_kerja'] <= 39) {
                                                echo "Buruk";
                                            }

                                            ?>
                                </tr>

                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-10">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6 align="center">PELAYANAN ADMINISTRASI TERPADU KECAMATAN BANJARMASIN TIMUR</h6>

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
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pelayanan Prima Dan
                                    Berkualitas Bagi Publik.</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-2 ">
                            <span class="timeline-step ">
                                <i class="material-icons text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Misi</h6>
                                <p align="justify" class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    1.Meningkatkan Kualitas Pelayanan Yang Berorientasi Publik. <br><br>
                                    2.Meningkatkan Kualitas Prasarana Dan Sarana Ruang Pelayanan. <br><br>
                                    3.Mengembangkan Sistem Pelayanan Berbasis Informasi Teknologi. <br><br>
                                    4.Meningkatkan Kualitas Serta Kemampuan Problem Solving Petugas ( PATEN ) Dalam
                                    Memberikan Pelayanan.
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