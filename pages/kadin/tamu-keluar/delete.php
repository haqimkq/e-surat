<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM tamu_keluar WHERE idTamuKeluar = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_tamuKeluar'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_tamuKeluar'>";
}