<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_GET['id'];
    $query = $link->query("SELECT * FROM skp s join pegawai p on s.id_pegawai = p.id_pegawai join jabatan j on s.id_jabatan = j.id_jabatan WHERE idSkp = '$id' ");
    $data = $query->fetch_array();


    $skp = null;
    if (@$_GET['id']) {
        $skp = $link->query("SELECT * FROM skp WHERE idSkp = '$_GET[id]'")->fetch_assoc();
    }
?>

<div class="container-fluid py-4">
    <section>
        <form data-toggle="validator" action="" method="POST" enctype="multipart/form-data">
            <div class="row mt-4 justify-content-center">
                <div class="col-10">
                    <div class="card mb-4">
                        <div class=" position-relative mt-n4 mx-3 ps-0  ">
                            <div class="bg-gradient-info shadow border-radius-lg pt-3 pb-3 ">
                                <h3 class=" text-white text-capitalize text-center py-1 ">Edit Data Penilaian Kinerja
                                    Pegawai
                                </h3>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- <hr class="horizontal dark"> -->
                            <div class="content-wrapper">

                                <div class="container py-4">
                                    <div class="row">
                                        <div class="col-lg-12 mx-auto d-flex justify-content-center flex-column">

                                            <div class="card-body">
                                                <div class="row">
                                                    <?php
                                                        if ($status) {
                                                        ?>
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button class="close" type="button" data-dismiss="alert"
                                                            ariahidden="true">&times;
                                                        </button>
                                                        <h4><i class="icon fa fa-close">Gagal! </i></h4>
                                                        <?php echo $status; ?>
                                                    </div>
                                                    <?php
                                                        }
                                                        ?>

                                                    <input type="hidden" class="form-control" name="id_jabatan"
                                                        id="id_jabatan" required value="<?= $data['id_jabatan'] ?>">
                                                    <input type="hidden" class="form-control" name="id_pegawai"
                                                        id="id_pegawai" required value="<?= $data['id_pegawai'] ?>">

                                                    <div class=" col-md-12">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>NIP</label>
                                                            <div class="input-group input-group-dynamic mb-4">
                                                                <input class="form-control" aria-label="NIP" type="text"
                                                                    data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required
                                                                    readonly value="<?= $data['nip'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Nama Pegawai</label>
                                                            <div class="input-group input-group-dynamic ">
                                                                <input class="form-control" aria-label="Nama Pegawai"
                                                                    type="text" name="nm_pegawai" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required
                                                                    readonly value="<?= $data['nm_pegawai'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group input-group-dynamic">
                                                            <label>Jabatan</label>
                                                            <div class="input-group input-group-dynamic ">
                                                                <input class="form-control" aria-label="Nama Pegawai"
                                                                    type="text" name="nm_jabatan" data-minlength="4"
                                                                    data-error="Tidak Boleh Kurang dari 4" required
                                                                    readonly value="<?= $data['nm_jabatan'] ?>">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container card card-frame col-md-12">
                        <div class="form-group  ">
                            <h5 class="mt-4"> PENILAIAN</h5>
                            <div class="input-group input-group-outline my-3">
                                <label for="nilai_skp" class="col-12 col-md-3 text-right pr-4 font-weight-normal">Nilai
                                    SKP</label>
                                <div class="col-12 col-md-3">
                                    <input step="0.01" type="number" name="nilai_skp" id="nilai_skp"
                                        class="form-control" role="nilai-rumus" data-label="#nilai_skp_label"
                                        value="<?= @$skp['nilai_skp'] ?>">
                                </div>
                                <div class="col-12 col-md-2">
                                    <input placeholder="Disabled" type="text" name="nilai_skp_label"
                                        id="nilai_skp_label" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-12 col-md-3 text-right pr-4">Perilaku
                                Kerja</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label for=" orientasi_pelayanan"
                                        class="col-12 col-md-6 text-right pr-4 font-weight-normal">
                                        Orientasi Pelayanan
                                    </label>
                                    <div class="col-12 col-md-6">
                                        <input step="0.01" type="number" name="orientasi_pelayanan"
                                            id="orientasi_pelayanan" class="form-control" role="nilai-alpha"
                                            data-label="#orientasi_pelayanan_label"
                                            value="<?= @$skp['orientasi_pelayanan'] ?>">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input placeholder="Disabled" type="text" name="orientasi_pelayanan_label"
                                            id="orientasi_pelayanan_label" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="komitmen"
                                        class="col-12 col-md-6 text-right pr-4 font-weight-normal">Komitmen</label>
                                    <div class="col-12 col-md-6">
                                        <input step="0.01" type="number" name="komitmen" id="komitmen"
                                            class="form-control" role="nilai-alpha" data-label="#komitmen_label"
                                            value="<?= @$skp['komitmen'] ?>">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input placeholder="Disabled" type="text" name="komitmen_label"
                                            id="komitmen_label" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="kerjasama"
                                        class="col-12 col-md-6 text-right pr-4 font-weight-normal">Kerjasama</label>
                                    <div class="col-12 col-md-6">
                                        <input step="0.01" type="number" name="kerjasama" id="kerjasama"
                                            class="form-control" role="nilai-alpha" data-label="#kerjasama_label"
                                            value="<?= @$skp['kerjasama'] ?>">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input placeholder="Disabled" type="text" name="kerjasama_label"
                                            id="kerjasama_label" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label for="integritas"
                                        class="col-12 col-md-6 text-right pr-4 font-weight-normal">Integritas</label>
                                    <div class="col-12 col-md-6">
                                        <input step="0.01" type="number" name="integritas" id="integritas"
                                            class="form-control" role="nilai-alpha" data-label="#integritas_label"
                                            value="<?= @$skp['integritas'] ?>">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input placeholder="Disabled" type="text" name="integritas_label"
                                            id="integritas_label" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <label for="disiplin"
                                        class="col-12 col-md-6 text-right pr-4 font-weight-normal">Disiplin</label>
                                    <div class="col-12 col-md-6">
                                        <input step="0.01" type="number" name="disiplin" id="disiplin"
                                            class="form-control" role="nilai-alpha" data-label="#disiplin_label"
                                            value="<?= @$skp['disiplin'] ?>">
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <input placeholder="Disabled" type="text" name="disiplin_label"
                                            id="disiplin_label" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label for="nilai_perilaku_kerja"
                                    class="col-12 col-md-6 text-right pr-4 font-weight-normal">
                                    Nilai Perilaku Kerja :
                                </label>
                                <div class="col-6 col-md-3">
                                    <input placeholder="Disabled" step="0.01" type="number" name="nilai_perilaku_kerja"
                                        id="nilai_perilaku_kerja" class="form-control"
                                        value="<?= @$skp['nilai_perilaku_kerja'] ?>" role="nilai-result"
                                        data-inputs="#orientasi_pelayanan,#komitmen,#kerjasama,#integritas,#disiplin"
                                        data-rumus="rataRataNilaiPerilakuKerja" data-label="#nilai_perilaku_kerja_label"
                                        readonly>
                                </div>
                                <div class="col-6 col-md-2">
                                    <input placeholder="Disabled" type="text" name="nilai_perilaku_kerja_label"
                                        id="nilai_perilaku_kerja_label" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label for="nilai_prestasi_kerja" class="col-12 col-md-6 text-right pr-4">
                                    <em>Nilai Prestasi Kerja :</em>
                                </label>
                                <div class="col-12 col-md-3">
                                    <input placeholder="Disabled" step="0.01" type="number" name="nilai_prestasi_kerja"
                                        id="nilai_prestasi_kerja" class="form-control"
                                        value="<?= @$skp['nilai_prestasi_kerja'] ?>"
                                        data-label="#nilai_prestasi_kerja_label" readonly>
                                </div>
                                <div class="col-12 col-md-2">
                                    <input placeholder="Disabled" type="text" name="nilai_prestasi_kerja_label"
                                        id="nilai_prestasi_kerja_label" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group input-group-dynamic">
                                    <label>Tanggal Input Penilaian</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" aria-label="Tanggal" type="date" name="tgl_kinerja"
                                            data-minlength="4" data-error="Tidak Boleh Kurang dari 4" required
                                            value="<?= $data['tgl_kinerja'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Status :</label>
                                    <div class="input-group input-group-dynamic mb-4 ">
                                        <select name="status_verifikasi" class="form-control ">
                                            <option value="Proses" <?php if ($data['status_verifikasi'] == 'Proses') {
                                                                            echo "selected";
                                                                        } ?>>Proses
                                            </option>
                                            <option value="Diterima" <?php if ($data['status_verifikasi'] == 'Diterima') {
                                                                                echo "selected";
                                                                            } ?>>Diterima
                                            </option>
                                            <option value="Ditolak" <?php if ($data['status_verifikasi'] == 'Ditolak') {
                                                                            echo "selected";
                                                                        } ?>>Ditolak
                                            </option>
                                        </select>
                                        <em class="text-danger text-sm text-italic"> <br> *Pilih
                                            Status</em>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col ms-4">
                            <input type="submit" class="btn btn-primary" value="Verifikasi" name="edit">
                            <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script>
// datatable
$(function() {

    // Handle tab panels
    const tabs = document.querySelectorAll('[role=tab]');
    const tabPanels = document.querySelectorAll('[role=tabpanel]');

    tabs.forEach(tab => {
        tab.addEventListener('click', (event) => {
            event.preventDefault();
            const targetId = tab.dataset.toggle;
            const target = document.getElementById(targetId);
            if (!target) return;

            tabs.forEach(tab => tab.classList.remove('active'));
            tabPanels.forEach(tabPanel => tabPanel.classList.remove('active'));
            tab.classList.add('active');
            target.classList.add('active');
        });
    });

});

function standarNilaiSKP(nilai) {
    nilai = parseInt(nilai);
    const dibawahStandar = [0, 'Buruk'];
    const standars = [
        [50, 'Kurang'],
        [60, 'Cukup'],
        [70, 'Baik'],
        [90, 'Sangat Baik'],
    ];

    const hasil = standars.reduce((prev, current, i, arr) => {
        if (nilai > current[0]) return current[1]
        return prev
    }, dibawahStandar[1]);

    return hasil;
}

function changeNilaiSKP(htmlSelector, nilai) {
    const label = document.querySelector(htmlSelector);
    const standar = standarNilaiSKP(nilai);
    label.value = standar;
}

function rumusNilai(nilai) {
    const hasil = Number(nilai) * 60 / 100;

    if (!hasil) return 0;
    return hasil.toFixed(2)
}

function changeRumus(htmlSelector, nilai) {
    const label = document.querySelector(htmlSelector);
    const hasil = rumusNilai(nilai);
    label.value = hasil;
}

// RoleEvent
const nilaiAlphas = document.querySelectorAll('[role=nilai-alpha]');
const nilaiRumus = document.querySelectorAll('[role=nilai-rumus]');
const nilaiResults = document.querySelectorAll('[role=nilai-result]');
const inputNilaiPerilakuKerja = document.querySelector('#nilai_perilaku_kerja');
const labelNilaiPerilakuKerja = document.querySelector(inputNilaiPerilakuKerja.dataset.label);
const inputNilaiPrestasiKerja = document.querySelector('#nilai_prestasi_kerja');
const labelNilaiPrestasiKerja = document.querySelector(inputNilaiPrestasiKerja.dataset.label);
const inputNilaiSKP = document.querySelector('#nilai_skp');
const labelNilaiSKP = document.querySelector('#nilai_skp_label');

nilaiAlphas.forEach(element => {
    element.addEventListener('keyup', event => changeNilaiSKP(element.dataset.label, element.value));
})

nilaiRumus.forEach(element => {
    element.addEventListener('keyup', event => changeRumus(element.dataset.label, element.value));
})

// handle nilai result
nilaiResults.forEach(nilaiResult => {
    const resultInputs = nilaiResult.dataset.inputs.split(',');
    const resultRumus = nilaiResult.dataset.rumus;
    resultInputs.map(nilaiId => {
        const input = document.querySelector(nilaiId);
        input.addEventListener('change', (event) => {
            window[resultRumus]?.(nilaiResult, resultInputs);
        });
    });
})

function rataRataNilaiPerilakuKerja(nilaiResult, resultInputs) {
    const jumlah = resultInputs.length;
    const totalNilai = resultInputs.reduce((nilai, input) => {
        const el = document.querySelector(input);
        return nilai + Number(el.value)
    }, 0);
    console.log('totalNilai', totalNilai);
    nilaiResult.value = rataRata(totalNilai, jumlah);
    const label = document.querySelector(nilaiResult.dataset.label);
    label.value = nilaiResult.value * 40 / 100;

    inputNilaiPrestasiKerja.value = (Number(labelNilaiPerilakuKerja.value) + Number(labelNilaiSKP.value)).toFixed(2);
    labelNilaiPrestasiKerja.value = standarNilaiSKP(inputNilaiPrestasiKerja.value);
}

function rataRata(total, jumlah) {
    return Number(total / jumlah).toFixed(2);
}

// Menangani nilai prestasi kerja
// 40% nilai prilaku kerja + 60% nilai skp
inputNilaiSKP.addEventListener('change', () => {
    console.log('test')
    inputNilaiPrestasiKerja.value = (Number(labelNilaiPerilakuKerja.value) + Number(labelNilaiSKP.value))
        .toFixed(2);
    labelNilaiPrestasiKerja.value = standarNilaiSKP(inputNilaiPrestasiKerja.value);
});
</script>


<script>
// set input type number initial value
const numberInputs = document.querySelectorAll('input[type=number]');
numberInputs.forEach(input => {
    if (!input.value) {
        input.value = 0;
    } else {
        const label = document.querySelector(input.dataset.label);
        if (!label) return;

        const role = input.getAttribute('role');
        if (role === 'nilai-rumus') {
            label.value = rumusNilai(input.value);
        } else if (role === 'nilai-alpha') {
            label.value = standarNilaiSKP(input.value);
        }
    }
})
</script>

<?php
    if (isset($_POST['edit'])) {

        $id_pegawai = $_POST['id_pegawai'];
        $id_jabatan = $_POST['id_jabatan'];
        $tgl_kinerja = $_POST['tgl_kinerja'];
        $np = $_POST['nilai_skp'];
        $op = $_POST['orientasi_pelayanan'];
        $k = $_POST['komitmen'];
        $ks = $_POST['kerjasama'];
        $i = $_POST['integritas'];
        $d = $_POST['disiplin'];
        $nprilakuk = $_POST['nilai_perilaku_kerja'];
        $nprestasik = $_POST['nilai_prestasi_kerja'];
        $status = $_POST['status_verifikasi'];



        $edit = $link->query("UPDATE skp SET 
id_pegawai = '$id_pegawai', 
id_jabatan = '$id_jabatan',
tgl_kinerja = '$tgl_kinerja',
nilai_skp = '$np', 
orientasi_pelayanan = '$op', 
komitmen = '$k', 
kerjasama = '$ks', 
integritas = '$i', 
disiplin = '$d', 
nilai_perilaku_kerja = '$nprilakuk', 
nilai_prestasi_kerja = '$nprestasik',
status_verifikasi = '$status'


WHERE idSkp = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=dKinerjaPegawai'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=eKinerjaPegawai'>";
        }
    }
}


?>