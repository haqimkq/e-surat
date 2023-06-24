<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM rdn WHERE id_rdn = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataDispensasiNikah'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataDispensasiNikah'>";
}
