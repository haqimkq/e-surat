<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM golongan WHERE id_golongan = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_golongan'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?data_golongan'>";
}