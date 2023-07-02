<?php
$id = $_GET['id'];

$query = $link->query(" DELETE FROM skpKecamatan WHERE idSkpKec = '$id' ");
if ($query) {
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataKinerjaKecamatan'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=?page=dataKinerjaKecamatan'>";
}
