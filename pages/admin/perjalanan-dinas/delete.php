<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM perjalanan_dinas WHERE idPerjalananDinas = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataPerjalananDinas'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataPerjalananDinas'>";
}