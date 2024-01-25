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

            if ($level === '0') {
                include "../public/dashboard.php";
            } elseif ($level === '1') {
                include "../public/dashboard-pegawai.php";
            } elseif ($level === '2') {
                include "../public/dashboard-masyarakat.php";
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

            //PERJALANAN DINAS
        case "dataPerjalananDinas";
            include "../pages/other/perjalanan-dinas/data.php";
            break;
            // case "tambahPerjalananDinas";
            //     include "../pages/other/perjalanan-dinas/add.php";
            //     break;
            // case "editPerjalananDinas";
            //     include "../pages/other/perjalanan-dinas/edit.php";
            //     break;
            // case "hapusPerjalananDinas";
            //     include "../pages/other/perjalanan-dinas/delete.php";
            //     break;

            // PENILAIAN KINERJA PEGAWAI
        case "dataKinerjaPegawai":
            include "../pages/other/kinerja-pegawai/data.php";
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

            ///////////////////////////////////////////////////////////////// END PEGAWAI PAGE ---------

            ///////////////////////////////////////////////////////////// START MASYARAKAT PAGE------------------
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
            /////////////////////////////////////////////////////////////////END PAGE MASYARAKAT --------

            ///////////START PAGE CAMAT---------------------
            //LEGALISASI PROPOSAL
        case "dProposal":
            include "../pages/camat/legalisasi-proposal/data.php";
            break;
        case "eProposal":
            include "../pages/camat/legalisasi-proposal/edit.php";
            break;
            //LEGALISASI SURAT KETERANGAN TIDAK MAMPU
        case "dSktm":
            include "../pages/camat/surat-keterangan-tidak-mampu/data.php";
            break;
        case "eSktm":
            include "../pages/camat/surat-keterangan-tidak-mampu/edit.php";
            break;
            //LEGALISASI SURAT PENGANTAR NIKAH
        case "dPengantarNikah":
            include "../pages/camat/legalisasi-pengantar-nikah/data.php";
            break;
        case "ePengantarNikah":
            include "../pages/camat/legalisasi-pengantar-nikah/edit.php";
            break;
            //LEGALISASI DISPENSASI NIKAH
        case "dDispensasiNikah":
            include "../pages/camat/dispensasi-nikah/data.php";
            break;
        case "eDispensasiNikah":
            include "../pages/camat/dispensasi-nikah/edit.php";
            break;

            //LEGALISASI SUSUNAN KELUARGA
        case "dSusunanKeluarga":
            include "../pages/camat/legalisasi-susunan-keluarga/data.php";
            break;
        case "eSusunanKeluarga":
            include "../pages/camat/legalisasi-susunan-keluarga/edit.php";
            break;

            // PENILAIAN KINERJA PEGAWAI
        case "dKinerjaPegawai":
            include "../pages/camat/kinerja-pegawai/data.php";
            break;
        case "eKinerjaPegawai":
            include "../pages/camat/kinerja-pegawai/edit.php";
            break;

            //////////// QRCODE PREVIEW //////////////////////
            ## QRCODE LEGALISASI PROPOSAL
        case "qrCodeProposal":
            include "../pages/camat/qrcode-proposal/data.php";
            break;
        case "tambah_qrProposal":
            include "../pages/camat/qrcode-proposal/add.php";
            break;
        case "hapus_qrProposal":
            include "../pages/camat/qrcode-proposal/delete.php";
            break;
            ## QRCODE LEGALISASI SKTM
        case "qrCodeSktm":
            include "../pages/camat/qrcode-sktm/data.php";
            break;
        case "tambah_qrSktm":
            include "../pages/camat/qrcode-sktm/add.php";
            break;
        case "hapus_qrSktm":
            include "../pages/camat/qrcode-sktm/delete.php";
            break;
            ## QRCODE LEGALISASI PENGANTAR NIKAH
        case "qrCodeSpn":
            include "../pages/camat/qrcode-spn/data.php";
            break;
        case "tambah_qrSpn":
            include "../pages/camat/qrcode-spn/add.php";
            break;
        case "hapus_qrSpn":
            include "../pages/camat/qrcode-spn/delete.php";
            break;
            ## QRCODE LEGALISASI PENGANTAR NIKAH
        case "qrCodeSk":
            include "../pages/camat/qrcode-sk/data.php";
            break;
        case "tambah_qrSk":
            include "../pages/camat/qrcode-sk/add.php";
            break;
        case "hapus_qrSk":
            include "../pages/camat/qrcode-sk/delete.php";
            break;
            ## QRCODE REKOMENDASI DISPENSASI NIKAH
        case "qrCodeRdn":
            include "../pages/camat/qrcode-rdn/data.php";
            break;
        case "tambah_qrRdn":
            include "../pages/camat/qrcode-rdn/add.php";
            break;
        case "hapus_qrRdn":
            include "../pages/camat/qrcode-rdn/delete.php";
            break;

            //////////// END QRCODE PREVIEW ////////////////////
    }
?>

<?php
    include '../layouts/footer.php';
}
?>