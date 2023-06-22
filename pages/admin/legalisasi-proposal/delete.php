<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM proposal WHERE id_lp = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_proposal'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_proposal'>";
}
