<?php
session_start();

function base_url($url = null)
{
  $base_url = "http://localhost/e-arsip";
  if ($url != null) {
    return $base_url . "/" . $url;
  } else {
    return $base_url;
  }
}
