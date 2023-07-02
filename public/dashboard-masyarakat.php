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

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<div class="container-fluid py-2">
    <h4 class="text-center">
        Halaman Dashboard Aplikasi Kecamatan Banjarmasin Timur
    </h4>
    <div class="row mt-2">
        <div class="row mt-2">
            <div class="border-radius-lg col-lg-8">
                <div class="card z-index-2">
                    <div class="card-header pb-0 mb-3">
                        <h6 class="text-center">Kegiatan Terbaru Kecamatan Banjarmasin Timur</h6>
                        <p class="text-sm ">
                            <i></i>
                            <!-- <span class="font-weight-bold">4% more</span> in 2021 -->
                        </p>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <?php
                    $no = 1;
                    $query = mysqli_query($link, "SELECT * FROM news order by tanggal DESC LIMIT 4 ");
                    $i = 1;
                    while ($row = $query->fetch_array()) {

                    ?>
                        <div class="col-lg-4 mb-lg-0 mb-4">
                            <div class="card z-index-2 mt-4">
                                <div class="card-body mt-n5 px-2">
                                    <div class=" border-radius-lg py-2 pe-1 mb-3">

                                        <div class="text-center chart-canvas border-radius-lg   mt-n4  ">
                                            <?php echo "<img src='../aev/$row[foto]' width='230' height='160' style='border-radius: 5%; box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14),0 7px 10px -5px rgba(64, 64, 64, 0.4) ; ' />"; ?>
                                        </div>

                                    </div>
                                    <h6 class="ms-2 mt-4 mb-0 px-1"><?php
                                                                    $newsText = $row['title'];
                                                                    $maxtitle = 10; // Tentukan panjang maksimum yang diinginkan
                                                                    if (strlen($newsText) > $maxtitle) {
                                                                        $trimmedText = substr($newsText, 0, $maxtitle) . ' ...';
                                                                        echo $trimmedText;
                                                                    } else {
                                                                        echo $newsText;
                                                                    }
                                                                    ?></h6>
                                    <p class="text-sm ms-2 px=1">
                                        <span class="date"><?= tgl($row['tanggal']) ?></span>

                                    </p>
                                    <p class="px-1 text-justify"> <?php
                                                                    $newsText = $row['newsText'];
                                                                    $maxLength = 89; // Tentukan panjang maksimum yang diinginkan
                                                                    if (strlen($newsText) > $maxLength) {
                                                                        $trimmedText = substr($newsText, 0, $maxLength) . ' ...';
                                                                        echo $trimmedText;
                                                                    } else {
                                                                        echo $newsText;
                                                                    }
                                                                    ?>.</p>

                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
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
    </div>