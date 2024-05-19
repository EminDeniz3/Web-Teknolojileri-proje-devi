<?php

$host="localhost";
$kullanici="root";
$parola="";
$vt="login";

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");
?>