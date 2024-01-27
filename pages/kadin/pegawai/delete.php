<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM pegawai WHERE id_pegawai = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=datapegawai'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=datapegawai'>";
}