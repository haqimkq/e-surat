<?php

session_start();
if (!isset($_SESSION['nama'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=../e-surat/index.php'>";
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

            if ($level === '0') {
                include "../public/dashboard.php";
            } elseif ($level === '1') {
                include "../public/dashboard-pegawai.php";
            } elseif ($level === '2') {
                include "../public/dashboard-kadin.php";
            } elseif ($level === '3') {
                include "../public/dashboard-camat.php";
            }
            break;


            /////////////////////////////////////////////// START ADMIN PAGE

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

            // KEPERLUAN
        case "data_keperluan";
            include "../pages/admin/keperluan/data.php";
            break;
        case "edit_keperluan";
            include "../pages/admin/keperluan/edit.php";
            break;
        case "hapus_keperluan";
            include "../pages/admin/keperluan/delete.php";
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

            // TAMU
        case "data_tamu";
            include "../pages/admin/tamu/data.php";
            break;
        case "tambah_tamu";
            include "../pages/admin/tamu/add.php";
            break;
        case "edit_tamu";
            include "../pages/admin/tamu/edit.php";
            break;
        case "hapus_tamu";
            include "../pages/admin/tamu/delete.php";
            break;

            //TAMU MASUK
        case "data_tamuMasuk";
            include "../pages/admin/tamu-masuk/data.php";
            break;
        case "tambah_tamuMasuk";
            include "../pages/admin/tamu-masuk/add.php";
            break;
        case "edit_tamuMasuk";
            include "../pages/admin/tamu-masuk/edit.php";
            break;
        case "hapus_tamuMasuk";
            include "../pages/admin/tamu-masuk/delete.php";
            break;

            //TAMU KELUAR
        case "data_tamuKeluar";
            include "../pages/admin/tamu-keluar/data.php";
            break;
        case "tambah_tamuKeluar";
            include "../pages/admin/tamu-keluar/add.php";
            break;
        case "edit_tamuKeluar";
            include "../pages/admin/tamu-keluar/edit.php";
            break;
        case "hapus_tamuKeluar";
            include "../pages/admin/tamu-keluar/delete.php";
            break;

            //SURAT MASUK
        case "data_suratMasuk";
            include "../pages/admin/surat-masuk/data.php";
            break;
        case "tambah_suratMasuk";
            include "../pages/admin/surat-masuk/add.php";
            break;
        case "edit_suratMasuk";
            include "../pages/admin/surat-masuk/edit.php";
            break;
        case "hapus_suratMasuk";
            include "../pages/admin/surat-masuk/delete.php";
            break;

            //SURAT KELUAR
        case "data_suratKeluar";
            include "../pages/admin/surat-keluar/data.php";
            break;
        case "tambah_suratKeluar";
            include "../pages/admin/surat-keluar/add.php";
            break;
        case "edit_suratKeluar";
            include "../pages/admin/surat-keluar/edit.php";
            break;
        case "hapus_suratKeluar";
            include "../pages/admin/surat-keluar/delete.php";
            break;

            //DISPOSISI
        case "data_disposisi";
            include "../pages/admin/disposisi/data.php";
            break;
        case "tambah_disposisi";
            include "../pages/admin/disposisi/add.php";
            break;
        case "edit_disposisi";
            include "../pages/admin/disposisi/edit.php";
            break;
        case "hapus_disposisi";
            include "../pages/admin/disposisi/delete.php";
            break;
            //////////////////////////////////////////////////////////////////////// END ADMIN PAGE -----------


            //////////////////////////////////////////////////////// START  SEKERTARIS PAGE--------------
            // PEGAWAI
        case "dataPegawai";
            include "../pages/sekertaris/pegawai/data.php";
            break;
        case "tambahPegawai";
            include "../pages/sekertaris/pegawai/add.php";
            break;
        case "editPegawai";
            include "../pages/sekertaris/pegawai/edit.php";
            break;
        case "hapusPegawai";
            include "../pages/sekertaris/pegawai/delete.php";
            break;
        case "detail_Pegawai";
            include "../pages/sekertaris/pegawai/detail.php";
            break;

            // USERS
        case "dataUser";
            include "../pages/sekertaris/user/data.php";
            break;
        case "editUser";
            include "../pages/sekertaris/user/edit.php";
            break;
        case "edit_User_password";
            include "../pages/sekertaris/user/edit_password.php";
            break;
        case "hapusUser";
            include "../pages/sekertaris/user/delete.php";
            break;

            //SURAT MASUK
        case "dataSuratMasuk";
            include "../pages/sekertaris/surat-masuk/data.php";
            break;
        case "tambahSuratMasuk";
            include "../pages/sekertaris/surat-masuk/add.php";
            break;
        case "editSuratMasuk";
            include "../pages/sekertaris/surat-masuk/edit.php";
            break;
        case "hapusSuratMasuk";
            include "../pages/sekertaris/surat-masuk/delete.php";
            break;

            //SURAT KELUAR
        case "dataSuratKeluar";
            include "../pages/sekertaris/surat-keluar/data.php";
            break;
        case "tambahSuratKeluar";
            include "../pages/sekertaris/surat-keluar/add.php";
            break;
        case "editSuratKeluar";
            include "../pages/sekertaris/surat-keluar/edit.php";
            break;
        case "hapusSuratKeluar";
            include "../pages/sekertaris/surat-keluar/delete.php";
            break;

            //DISPOSISI
        case "dataDisposisi";
            include "../pages/sekertaris/disposisi/data.php";
            break;
        case "tambahDisposisi";
            include "../pages/sekertaris/disposisi/add.php";
            break;
        case "editDisposisi";
            include "../pages/sekertaris/disposisi/edit.php";
            break;
        case "hapusDisposisi";
            include "../pages/sekertaris/disposisi/delete.php";
            break;

            ///////////////////////////////////////////////////////////////// END PEGAWAI PAGE ---------

            ///////////START PAGE KEPALA DINAS---------------------

            // PEGAWAI
        case "datapegawai";
            include "../pages/kadin/pegawai/data.php";
            break;
        case "tambahpegawai";
            include "../pages/kadin/pegawai/add.php";
            break;
        case "editpegawai";
            include "../pages/kadin/pegawai/edit.php";
            break;
        case "hapuspegawai";
            include "../pages/kadin/pegawai/delete.php";
            break;
        case "detailPegawai";
            include "../pages/kadin/pegawai/detail.php";
            break;

            // PROFILE
        case "dataprofile";
            include "../pages/kadin/profile/data.php";
            break;

            // JABATAN
        case "datajabatan";
            include "../pages/kadin/jabatan/data.php";
            break;
        case "editjabatan";
            include "../pages/kadin/jabatan/edit.php";
            break;
        case "hapusjabatan";
            include "../pages/kadin/jabatan/delete.php";
            break;

            // KEPERLUAN
        case "datakeperluan";
            include "../pages/kadin/keperluan/data.php";
            break;
        case "editkeperluan";
            include "../pages/kadin/keperluan/edit.php";
            break;
        case "hapuskeperluan";
            include "../pages/kadin/keperluan/delete.php";
            break;

            // USERS
        case "datauser";
            include "../pages/kadin/user/data.php";
            break;
        case "tambahuser";
            include "../pages/kadin/user/add.php";
            break;
        case "edituser";
            include "../pages/kadin/user/edit.php";
            break;
        case "edituser_password";
            include "../pages/kadin/user/edit_password.php";
            break;
        case "hapususer";
            include "../pages/kadin/user/delete.php";
            break;

            // TAMU
        case "datatamu";
            include "../pages/kadin/tamu/data.php";
            break;
        case "tambahtamu";
            include "../pages/kadin/tamu/add.php";
            break;
        case "edittamu";
            include "../pages/kadin/tamu/edit.php";
            break;
        case "hapustamu";
            include "../pages/kadin/tamu/delete.php";
            break;

            //TAMU MASUK
        case "datatamuMasuk";
            include "../pages/kadin/tamu-masuk/data.php";
            break;
        case "tambahtamuMasuk";
            include "../pages/kadin/tamu-masuk/add.php";
            break;
        case "edittamuMasuk";
            include "../pages/kadin/tamu-masuk/edit.php";
            break;
        case "hapustamuMasuk";
            include "../pages/kadin/tamu-masuk/delete.php";
            break;

            //TAMU KELUAR
        case "datatamuKeluar";
            include "../pages/kadin/tamu-keluar/data.php";
            break;
        case "tambahtamuKeluar";
            include "../pages/kadin/tamu-keluar/add.php";
            break;
        case "edittamuKeluar";
            include "../pages/kadin/tamu-keluar/edit.php";
            break;
        case "hapustamuKeluar";
            include "../pages/kadin/tamu-keluar/delete.php";
            break;

            //SURAT MASUK
        case "datasuratMasuk";
            include "../pages/kadin/surat-masuk/data.php";
            break;
        case "tambahsuratMasuk";
            include "../pages/kadin/surat-masuk/add.php";
            break;
        case "editsuratMasuk";
            include "../pages/kadin/surat-masuk/edit.php";
            break;
        case "hapussuratMasuk";
            include "../pages/kadin/surat-masuk/delete.php";
            break;

            //SURAT KELUAR
        case "datasuratKeluar";
            include "../pages/kadin/surat-keluar/data.php";
            break;
        case "tambahsuratKeluar";
            include "../pages/kadin/surat-keluar/add.php";
            break;
        case "editsuratKeluar";
            include "../pages/kadin/surat-keluar/edit.php";
            break;
        case "hapussuratKeluar";
            include "../pages/kadin/surat-keluar/delete.php";
            break;

            //DISPOSISI
        case "datadisposisi";
            include "../pages/kadin/disposisi/data.php";
            break;
        case "tambahdisposisi";
            include "../pages/kadin/disposisi/add.php";
            break;
        case "editdisposisi";
            include "../pages/kadin/disposisi/edit.php";
            break;
        case "hapusdisposisi";
            include "../pages/kadin/disposisi/delete.php";
            break;
    }
?>

<?php
    include '../layouts/footer.php';
}
?>