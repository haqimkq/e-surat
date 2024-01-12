<?php
session_start();

function base_url($url = null)
{
  $base_url = "http://localhost/e-surat";
  if ($url != null) {
    return $base_url . "/" . $url;
  } else {
    return $base_url;
  }
}
