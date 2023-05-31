<?php
$host = "localhost";
$user = "root";
$pass = "";
$DB = "db_pelayanan";

// $host = "localhost";
// $user = "id20838662_aev";
// $pass = "@Aevtech7";
// $DB = "id20838662_db_pelayanan";

$link = new mysqli($host, $user, $pass, $DB);
if ($link->connect_error) {
  echo "Gagal Koneksi MySQL";
}
