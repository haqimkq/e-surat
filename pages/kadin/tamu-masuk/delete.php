<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM tamu_masuk WHERE idTamuMasuk = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=datatamuMasuk'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=datatamuMasuk'>";
}