<?php

$serverName = "https://studenti.sum.ba/phpmyadmin/";
$dBUsername = "fpmoz242021";
$dBPassword = "csdigital2021";
$dBName = "krojacki_studio";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Spajanje je neuspješnoo: " .mysqli_connect_error());
}
