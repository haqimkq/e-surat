<?php


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
    <div class="row py-3">
        <div class="col-xl-4 col-sm-4 mt-2 mb-3">
            <div class="card ">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Susunan Keluarga</p>
                        <h4 class="mb-0"> <a href="?page=data_susunanKeluarga"><?php echo $hitungsk['total'] ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-3 mt-2">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success  text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"> Data Surat Pengantar Nikah</p>
                        <h4 class="mb-0"><a href="?page=data_pengantarNikah"><?php echo $hitungspn['total']; ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-2 mt-2 ">
            <div class="card">
                <div class="card-header p-3 pt-2 ">
                    <div class="icon icon-lg icon-shape  bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Legalisasi Surat Keterangan Tidak Mampu</p>
                        <h4 class="mb-0"><a href="?page=data_sktm"><?php echo $hitungsktm['total'] ?></a></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
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
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
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
    </div>
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
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Input
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nilai Kinerja
                                    </th>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
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

    <div class="card mt-3">
        <div class="card-header mb-xl- pb-0">
            <div class="row">
                <h6>Grafik Penilaian Kinerja Pelayanan</h6>
                <div class="col-sm-8">
                    <div class="control-panel">
                        <style>
                            canvas {
                                -moz-user-select: none;
                                -webkit-user-select: none;
                                -ms-user-select: none;
                            }
                        </style>
                        <center><strong>
                                <div style="width: 40%">
                                    <canvas id="myChart"></canvas>
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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                'Sangat Baik',
                'Baik',
                'Cukup',
                'Kurang ',
                'Buruk ',
            ],
            datasets: [{
                label: 'Akumulasi Jumlah data penilaian',
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
                hoverOffset: 4
            }]
        },

    });
</script>