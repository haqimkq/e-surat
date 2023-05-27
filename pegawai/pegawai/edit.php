<?php
session_start();
include "../db/koneksi.php";

if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    $id = $_SESSION['id_user'];
    $query = mysqli_query($link, "SELECT * FROM pegawai p JOIN jabatan j ON j.id_jabatan = p.id_jabatan JOIN golongan g ON p.id_golongan = g.id_golongan WHERE id_user = '$id' ");
    $data = $query->fetch_array();



?>

<div class="container-fluid px-2 px-md-2">
    <div class="card card-body mx-3 mx-md-2 mt-3 ">
        <div class="row gx-4 justify-content-center">
            <div class="col-auto my-auto ">
                <div class=" h-100 ">
                    <h5 class=" mb-1 "> Edit Data Pegawai
                    </h5>

                </div>
            </div>
        </div>
    </div>
    <div class=" container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-lg-4 ms-sm-auto  mt-4">
                        <div class="nav-wrapper position-relative end-7">
                            <ul class="nav  nav-pills nav-fill p-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">people</i>
                                        <span class="ms-1">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="ta" href="javascript:;"
                                        role="ta" aria-selected="false">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Informasi Lengkap</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Nama Lengkap :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['nm_pegawai'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">NIP : </label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value=" <?= $data['nip'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Golongan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <select class="form-control" aria-label="Golongan" type="text"
                                            name="id_golongan" required>
                                            <?php
                                                $q = $link->query("SELECT * FROM golongan ");
                                                while ($d = $q->fetch_array()) {
                                                    if ($d['id_golongan'] == $data['id_golongan']) {
                                                ?>
                                            <option value="<?= $d['id_golongan']; ?>"
                                                selected="<?= $d['id_golongan']; ?>"><?= $d['nm_golongan'] ?></option>
                                            <?php
                                                    } else {
                                                    ?>
                                            <option value="<?= $d['id_golongan'] ?>"><?= $d['nm_golongan'] ?></option>
                                            <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Jabatan :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <select class="form-control " aria-label="Jabatan" name="id_jabatan" required>
                                            <?php
                                                $q = $link->query("SELECT * FROM jabatan ");
                                                while ($d = $q->fetch_array()) {
                                                    if ($d['id_jabatan'] == $data['id_jabatan']) {
                                                ?>
                                            <option value="<?= $d['id_jabatan']; ?>"
                                                selected="<?= $d['id_jabatan']; ?>"><?= $d['nm_jabatan'] ?></option>
                                            <?php
                                                    } else {
                                                    ?>
                                            <option value="<?= $d['id_jabatan'] ?>"><?= $d['nm_jabatan'] ?></option>
                                            <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tanggal Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" aria-label="Tanggal Lahir" type="date"
                                            name="tgl_lhr" data-minlength="4" data-error="Tidak Boleh Kurang dari 4"
                                            required value="<?= $data['tgl_lahir'] ?>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Tempat Lahir :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['tmpt_lahir'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Jenis Kelamin :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <select name="jk" class="form-control">
                                            <option value="Laki-Laki" <?php if ($data['jk'] == 'Laki-Laki') {
                                                                                echo "selected";
                                                                            } ?>>Laki-Laki</option>
                                            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') {
                                                                                echo "selected";
                                                                            } ?>>Perempuan</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Status :</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['status'] ?>" />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="horizontal dark"> -->
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Alamat Lengkap</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['alamat'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">No Telepon</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['no_tlp'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Email</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['email'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-dynamic">
                                    <label class="text-bold">Instagram</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <input class="form-control" type="text" value="<?= $data['instagram'] ?> " />
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col ms-4">
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                        <input type="reset" class="btn btn-danger" value="Reset" name="reset">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['edit'])) {

        $user = $_POST['id_user'];
        $jabatan = $_POST['id_jabatan'];
        $golongan = $_POST['id_golongan'];
        $nm_pegawai = $_POST['nm_pegawai'];
        $nip = $_POST['nip'];
        $j_k = $_POST['j_kelamin'];
        $alamat = $_POST['alamat'];
        $tmpt_lhr = $_POST['tmpt_lhr'];
        $tgl_lhr = $_POST['tgl_lhr'];
        $stts = $_POST['status'];
        $no_tlp = $_POST['no_tlp'];
        $agama = $_POST['agama'];

        if ($_FILES['foto']['error'] === 4) {
            $foto = $foto_lama;
        } else {
            $foto = upload();
        }
        if (!$foto) {
            echo "<script>alert('Gagal Upload Foto ')</script>";
            return false;
        }



        $edit = $link->query("UPDATE pegawai SET 
id_user = '$user',
id_jabatan = '$jabatan',
id_golongan = '$golongan',
nm_pegawai = '$nm_pegawai', 
nip = '$nip', 
j_kelamin = '$j_k',
alamat = '$alamat',
tmpt_lhr = '$tmpt_lhr',
tgl_lhr = '$tgl_lhr',
status = '$stts',
no_tlp = '$no_tlp',
agama = '$agama',
foto = '$foto'

WHERE id_pegawai = '$id'");

        if ($edit) {
            echo "<script>alert('Data berhasil diedit')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=data_d_pegawai'>";
        } else {
            echo "<script>alert('Data anda gagal diedit. Ulangi sekali lagi')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=edit_d_pegawai'>";
        }
    }
}


function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    $ekstensiGambarValid1 = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));



    if ($ukuranFile > 5000000) {
        echo "<script>alert('ukuran gambar terlalu besar')</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../aev/img/' . $namaFileBaru);

    return $namaFileBaru;
}
    ?>