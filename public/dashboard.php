<div class="container-fluid py-2">
    <h6>
        Data Entry Masuk Pada Dashboard ..
        <!-- <a href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard ">this link</a> -->
    </h6>
    <div class="row py-3">
        <div class="col-xl-4 col-sm-4">
            <div class="card ">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Susunan Keluarga</p>
                        <h4 class="mb-0"> <a href="?page=data_s_keluarga"><?php echo $hitungsk['total'] ?>2</a></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-3">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success  text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"> Data Rekomendasi Dispensasi Nikah</p>
                        <h4 class="mb-0"><a href="?page=data_rdn"><?php echo $hitungspn['total']; ?>7</a></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-2">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape  bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Legalisasi Surat Keterangan Tidak Mampu</p>
                        <h4 class="mb-0"><a href="?page=data_sktm"><?php echo $hitungsktm['total'] ?>7</a></h4>
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
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-3">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Rekomendasi Dispensasi Nikah</p>
                        <h4 class="mb-0"><a href="?page=data_rdn"><?php echo $hitungrdn['total']; ?>7</a></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Cek</span> Pelayanan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-3">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Data Legalisasi Proposal</p>
                        <h4 class="mb-0"><a href="?page=data_lp"><?php echo $hitunglp['total']; ?>7</a></h4>
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
                        <div class="col-lg-6 col-7">
                            <h6>Data Masyrakat</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1"> Total : <?php echo $hitungmsy['total'] ?></span>
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                            </div>
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
                                        Username
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Password
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $query = mysqli_query($link, "SELECT * FROM users order by id_user DESC LIMIT 5 
                                ");

                                while ($row = $query->fetch_array()) {
                                ?>
                                    <tr>
                                        <td align="center"><?= $i++ ?></td>
                                        <td align="left"><?= $row['username']; ?></td>
                                        <td align="left"><?= $row['password']; ?></td>
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

    <div class="row mt-4">
        <div class="col-lg-4 mb-lg-0 mb-4">
            <div class="card z-index-2 mt-4">
                <div class="card-body mt-n5 px-3">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 mb-3">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <h6 class="ms-2 mt-4 mb-0">Active Users</h6>
                    <p class="text-sm ms-2">
                        (<span class="font-weight-bolder">+11%</span>) than last week
                    </p>
                    <div class="container border-radius-lg">
                        <div class="row">
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">groups</i>
                                    </div>
                                    <p class="text-xs my-auto font-weight-bold">Users</p>
                                </div>
                                <h4 class="font-weight-bolder">42K</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">ads_click</i>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
                                </div>
                                <h4 class="font-weight-bolder">1.7m</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">receipt</i>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
                                </div>
                                <h4 class="font-weight-bolder">399$</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="material-icons opacity-10">category</i>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
                                </div>
                                <h4 class="font-weight-bolder">74</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Sales overview</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>