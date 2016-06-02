<?php
$hasil = "marah marah";
$pecah = str_split($hasil,3);
echo $pecah[0] . " " . $pecah[1] . " " . $pecah[2] . " " . $pecah[3] . " <br>";
$pecahan = explode(" ", $hasil);
echo $pecahan[0] . " " . $pecahan[1];
?>
