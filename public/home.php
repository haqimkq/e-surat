<?php

session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../aev/index.php'>";
} else {

    include '../layouts/header.php';
    include '../layouts/sidebar.php';
    include '../db/koneksi.php';

    $id = $_SESSION['id_user'];
?>
<?php
    error_reporting(0);
    switch ($_GET['page']) {
        default:

            include "../public/dashboard.php";
            break;

            // START ADMIN PAGE
            //PORTAL BERITA
        case "data_berita";
            include "../pages/admin/news/data.php";
            break;
        case "tambah_berita";
            include "../pages/admin/news/add.php";
            break;
        case "edit_berita";
            include "../pages/admin/news/edit.php";
            break;
        case "hapus_berita";
            include "../pages/admin/news/delete.php";
            break;

            // PEGAWAI
        case "data_pegawai";
            include "../pages/admin/pegawai/data.php";
            break;
        case "tambah_pegawai";
            include "../pages/admin/pegawai/add.php";
            break;
        case "edit_pegawai";
            include "../pages/admin/pegawai/edit.php";
            break;
        case "hapus_pegawai";
            include "../pages/admin/pegawai/delete.php";
            break;
        case "detailPegawai";
            include "../pages/admin/pegawai/detail.php";
            break;

            // PROFILE
        case "data_profile";
            include "../pages/admin/profile/data.php";
            break;

            // GOLONGAN
        case "data_golongan";
            include "../pages/admin/golongan/data.php";
            break;
        case "edit_golongan";
            include "../pages/admin/golongan/edit.php";
            break;
        case "hapus_golongan";
            include "../pages/admin/golongan/delete.php";
            break;

            // JABATAN
        case "data_jabatan";
            include "../pages/admin/jabatan/data.php";
            break;
        case "edit_jabatan";
            include "../pages/admin/jabatan/edit.php";
            break;
        case "hapus_jabatan";
            include "../pages/admin/jabatan/delete.php";
            break;

            // MASYARAKAT
        case "data_masyarakat";
            include "../pages/admin/masyarakat/data.php";
            break;
        case "tambah_masyarakat";
            include "../pages/admin/masyarakat/add.php";
            break;
        case "detail_masyarakat";
            include "../pages/admin/masyarakat/detail.php";
            break;
        case "edit_masyarakat";
            include "../apages/dmin/masyarakat/edit.php";
            break;
        case "hapus_masyarakat";
            include "../pages/admin/masyarakat/delete.php";
            break;

            // USERS
        case "data_user";
            include "../pages/admin/user/data.php";
            break;
        case "tambah_user";
            include "../pages/admin/user/add.php";
            break;
        case "edit_user";
            include "../pages/admin/user/edit.php";
            break;
        case "edit_user_password";
            include "../pages/admin/user/edit_password.php";
            break;
        case "hapus_user";
            include "../pages/admin/user/delete.php";
            break;
            // END ADMIN PAGE

            // START  PAGAWAI PAGE

            // PEGAWAI
        case "dataPegawai";
            include "../pages/other/pegawai/data.php";
            break;
        case "tambahPegawai";
            include "../pages/other/pegawai/add.php";
            break;
        case "editPegawai";
            include "../pages/other/pegawai/edit.php";
            break;
        case "hapusPegawai";
            include "../pages/other/pegawai/delete.php";
            break;

            //PERJALANAN DINAS
        case "dataPerjalananDinas";
            include "../pages/other/perjalanan-dinas/data.php";
            break;
        case "tambahPerjalananDinas";
            include "../pages/other/perjalanan-dinas/add.php";
            break;
        case "editPerjalananDinas";
            include "../pages/other/perjalanan-dinas/edit.php";
            break;
        case "hapusPerjalananDinas";
            include "../pages/other/perjalanan-dinas/delete.php";
            break;

            // END PEGAWAI PAGE

            // START MASYARAKAT PAGE
            // MASYARAKAT
        case "dataMasyarakat";
            include "../pages/other/masyarakat/data.php";
            break;
        case "tambahMasyarakat";
            include "../pages/other/masyarakat/add.php";
            break;
        case "editMasyarakat";
            include "../pages/other/masyarakat/edit.php";
            break;
        case "hapusMasyarakat";
            include "../pages/other/masyarakat/delete.php";
            break;
        case "detailMasyarakat";
            include "../pages/other/masyarakat/detail.php";
            break;
            //END MASYARAKAT PAGE

            //LEGALISASI SUSUNAN KELUARGAa
        case "dataSusunanKeluarga";
            include "../pages/other/legalisasi-susunan-keluarga/data.php";
            break;
        case "tambahSusunanKeluarga";
            include "../pages/other/legalisasi-susunan-keluarga/add.php";
            break;
        case "editSusunanKeluarga";
            include "../pages/other/legalisasi-susunan-keluarga/edit.php";
            break;
        case "hapusSusunanKeluarga";
            include "../pages/other/legalisasi-susunan-keluarga/delete.php";
            break;
            //END LEGALISASI SUSUNAN KELUARGA

            //SURAT KETERANGAN TIDAK MAMPU
        case "dataSktm":
            include "../pages/other/surat-keterangan-tidak-mampu/data.php";
            break;
        case "tambahSktm":
            include "../pages/other/surat-keterangan-tidak-mampu/add.php";
            break;
            //END SURAT KETERANGAN TIDAK MAMPU
    }
?>

<?php
    include '../layouts/footer.php';
}
?>