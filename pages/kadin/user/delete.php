<!-- PROSES SIMPAN -->
<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM users WHERE id_user = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=datauser'>";
} else {
    echo "<script>alert('Data anda gagal dihapus. Ulangi sekali lagi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=datauser'>";
}