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

            if ($level === '0' || $level === '1') {
                include "../public/dashboard.php";
            } elseif ($level === '2') {
                include "../public/dashboard-masyarakat.php";
            }
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

            //LEGALISASI PROPOSAL
        case "data_proposal":
            include "../pages/admin/legalisasi-proposal/data.php";
            break;
        case "edit_proposal":
            include "../pages/admin/legalisasi-proposal/edit.php";
            break;

            //LEGALISASI SKTM
        case "data_sktm":
            include "../pages/admin/surat-keterangan-tidak-mampu/data.php";
            break;
        case "edit_sktm":
            include "../pages/admin/surat-keterangan-tidak-mampu/edit.php";
            break;

            //Legalisasi Susunan Keluarga
        case "data_susunanKeluarga";
            include "../pages/admin/legalisasi-susunan-keluarga/data.php";
            break;
        case "edit_susunanKeluarga";
            include "../pages/admin/legalisasi-susunan-keluarga/edit.php";
            break;
            //Legalisasi Pengantar Nikah
        case "data_pengantarNikah";
            include "../pages/admin/legalisasi-pengantar-nikah/data.php";
            break;
        case "edit_pengantarNikah";
            include "../pages/admin/legalisasi-pengantar-nikah/edit.php";
            break;
            //Rekomendasi Dispenasi Nikah
        case "data_dispensasiNikah";
            include "../pages/admin/dispensasi-nikah/data.php";
            break;
        case "edit_dispensasiNikah";
            include "../pages/admin/dispensasi-nikah/edit.php";
            break;

            //SURAT REKOMENDASI DISPENSASI NIKAH
        case "data_SuratDispensasiNikah":
            include "../pages/admin/surat-dispensasi-nikah/data.php";
            break;
        case "hapus_SuratDispensasiNikah":
            include "../pages/admin/surat-dispensasi-nikah/delete.php";
            break;

            // PENILAIAN KINERJA PEGAWAI
        case "data_KinerjaPegawai":
            include "../pages/admin/kinerja-pegawai/data.php";
            break;
        case "tambah_KinerjaPegawai":
            include "../pages/admin/kinerja-pegawai/add.php";
            break;
        case "edit_KinerjaPegawai":
            include "../pages/admin/kinerja-pegawai/edit.php";
            break;
        case "hapus_KinerjaPegawai":
            include "../pages/admin/kinerja-pegawai/delete.php";
            break;

            // PENILAIAN KINERJA KECAMATAN
        case "data_kinerjaKecamatan":
            include "../pages/admin/kinerja-kecamatan/data.php";
            break;
        case "hapus_kinerjaKecamatan":
            include "../pages/admin/kinerja-kecamatan/delete.php";
            break;

        case "data_perjalananDinas";
            include "../pages/admin/perjalanan-dinas/data.php";
            break;
        case "hapus_perjalananDinas";
            include "../pages/admin/perjalanan-dinas/delete.php";
            break;

            // END ADMIN PAGE -----------


            // START  PAGAWAI PAGE--------------
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

            // PENILAIAN KINERJA PEGAWAI
        case "dataKinerjaPegawai":
            include "../pages/other/kinerja-pegawai/data.php";
            break;

            // USERS
        case "dataUser";
            include "../pages/other/user/data.php";
            break;
        case "editUser";
            include "../pages/other/user/edit.php";
            break;
        case "edit_User_password";
            include "../pages/other/user/edit_password.php";
            break;
        case "hapusUser";
            include "../pages/other/user/delete.php";
            break;

            // END PEGAWAI PAGE ---------

            // START MASYARAKAT PAGE------------------
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

            //LEGALISASI SUSUNAN KELUARGA
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
        case "editSktm":
            include "../pages/other/surat-keterangan-tidak-mampu/edit.php";
            break;
        case "hapusSktm":
            include "../pages/other/surat-keterangan-tidak-mampu/delete.php";
            break;
            //END SURAT KETERANGAN TIDAK MAMPU

            //LEGALISASI PROPOSAL   
        case "dataProposal":
            include "../pages/other/legalisasi-proposal/data.php";
            break;
        case "tambahProposal":
            include "../pages/other/legalisasi-proposal/add.php";
            break;
        case "editProposal":
            include "../pages/other/legalisasi-proposal/edit.php";
            break;
        case "hapusProposal":
            include "../pages/other/legalisasi-proposal/delete.php";
            break;

            //LEGALISASI SURAT PENGANTAR NIKAH 
        case "dataSuratPengantarNikah":
            include "../pages/other/legalisasi-pengantar-nikah/data.php";
            break;
        case "tambahSuratPengantarNikah":
            include "../pages/other/legalisasi-pengantar-nikah/add.php";
            break;
        case "editSuratPengantarNikah":
            include "../pages/other/legalisasi-pengantar-nikah/edit.php";
            break;
        case "hapusSuratPengantarNikah":
            include "../pages/other/legalisasi-pengantar-nikah/delete.php";
            break;

            //REKOMENDASI DISPENSASI NIKAH
        case "dataDispensasiNikah":
            include "../pages/other/dispensasi-nikah/data.php";
            break;
        case "tambahDispensasiNikah":
            include "../pages/other/dispensasi-nikah/add.php";
            break;
        case "editDispensasiNikah":
            include "../pages/other/dispensasi-nikah/edit.php";
            break;
        case "hapusDispensasiNikah":
            include "../pages/other/dispensasi-nikah/delete.php";
            break;

            //SURAT REKOMENDASI DISPENSASI NIKAH
        case "dataSuratDispensasiNikah":
            include "../pages/other/surat-dispensasi-nikah/data.php";
            break;
        case "tambahSuratDispensasiNikah":
            include "../pages/other/surat-dispensasi-nikah/add.php";
            break;
        case "editSuratDispensasiNikah":
            include "../pages/other/surat-dispensasi-nikah/edit.php";
            break;
        case "hapusSuratDispensasiNikah":
            include "../pages/other/surat-dispensasi-nikah/delete.php";
            break;

            // PENILAIAN KINERJA KECAMATAN
        case "dataKinerjaKecamatan":
            include "../pages/other/kinerja-kecamatan/data.php";
            break;
        case "tambahKinerjaKecamatan":
            include "../pages/other/kinerja-kecamatan/add.php";
            break;
        case "editKinerjaKecamatan":
            include "../pages/other/kinerja-kecamatan/edit.php";
            break;
        case "hapusKinerjaKecamatan":
            include "../pages/other/kinerja-kecamatan/delete.php";
            break;
    }
?>

<?php
    include '../layouts/footer.php';
}
?>