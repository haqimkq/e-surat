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

        // case "data_pegawai";
        // include "../admin/pegawai/data.php";
        // break;
        
        case "data_profile";
        include "../admin/profile/data.php";
        break;


        case "data_user";
        include "../admin/user/data.php";
        break;
        
        case "tambah_user";
        include "../admin/user/add.php";
        break;
        
        // case "hapus_user";
        //     include "../admin/user/delete.php";
        //     break;
        // case "edit_user";
        //     include "admin/user/edit.php";
        //     break;

    }
    ?>

<?php
    include '../layouts/footer.php';
}
?>