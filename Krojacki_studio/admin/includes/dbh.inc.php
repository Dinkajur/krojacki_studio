<?php

$serverName = "https://studenti.sum.ba/phpmyadmin/";
$dBUsername = "fpmoz2420211";
$dBPassword = "csdigital2021";
$dBName = "krojacki_studio";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Spajanje je neuspješno: " .mysqli_connect_error());
}
