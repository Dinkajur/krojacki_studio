<?php

$serverName = "studenti.sum.ba";
$dBUsername = "fpmoz242021";
$dBPassword = "csdigital2021";
$dBName = "krojacki_studio";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Spajanje je neuspješno: " .mysqli_connect_error());
}
