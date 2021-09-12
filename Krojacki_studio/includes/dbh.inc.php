<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "krojacki_studio";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Spajanje je neuspješno: " .mysqli_connect_error());
}
