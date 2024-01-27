<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM jabatan WHERE id_jabatan = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=datajabatan'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?datajabatan'>";
}