<?php

include_once 'dbh.inc.php';
include_once 'functions.inc.php';


if (isset($_POST["submit"])){

    $username = $_POST["uid"];
    $lozinka = $_POST["lozinka"];



    if (emptyInputLogin($username, $lozinka) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $lozinka);
}
else {
    header("location: ../index.php");
    exit();
}
