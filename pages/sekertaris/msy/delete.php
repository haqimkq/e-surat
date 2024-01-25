<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM masyarakat WHERE id_msy = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataMasyarakat'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataMasyarakat'>";
}