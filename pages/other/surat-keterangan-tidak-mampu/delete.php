<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM s_keluarga WHERE id_sk = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataSusunanKeluarga'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataSusunanKeluarga'>";
}