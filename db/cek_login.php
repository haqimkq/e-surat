<?php

include 'koneksi.php';

if (isset($_POST['log'])) {
  $user = $link->real_escape_string($_POST['username']);
  $pass = $link->real_escape_string($_POST['password']);

  $pass = md5($pass);
  $query = $link->query("SELECT * FROM users WHERE username = '$user' AND password ='$pass'");
  $data = $query->fetch_array();
  $id = $data['id_user'];
  $username = $data['username'];
  $password = $data['password'];
  $level = $data['level'];

  if ($user == $username && $pass == $password) {
    session_start();
    $_SESSION['id_user'] = $id;
    $_SESSION['nama'] = $username;
    $name = $_SESSION['nama'];
    $_SESSION['level'] = $level;

    if ($level == 1) {
      echo "<script>alert('Anda berhasil login. Sebagai : $name');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../public/home.php'>";
    } elseif ($level == 2) {
      echo "<script>alert('Anda berhasil login. Sebagai : $name');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../home.php'>";
    } elseif ($level == 3) {
      echo "<script>alert('Anda berhasil login. Sebagai : $name');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../home.php'>";
    } else {
      echo "<script>alert('Anda berhasil login. Sebagai : $name');</script>";
      echo "<meta http-equiv='refresh' content='0; url=../home-pegawai.php'>";
    }
  } else {
    echo "<script>alert('Username dan Password Tidak Ditemukan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
  }
}