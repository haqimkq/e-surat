<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM surat_masuk WHERE idSuratMasuk = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_suratMasuk'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=data_suratMasuk'>";
}