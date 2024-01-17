<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM disposisi WHERE idDisposisi = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_disposisi'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_disposisi'>";
}