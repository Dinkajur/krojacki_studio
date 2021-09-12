<?php

if (isset($_POST["submit"])){

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $email = $_POST["email"];
    $uloga_id = $_POST["uloga_id"];
    $mjesto_id = $_POST["mjesto_id"];
    $poslovnica_id = $_POST["poslovnica_id"];
    $broj = $_POST["broj_mob"];
    $lozinka = $_POST["lozinka"];
    $lozinka_provjera = $_POST["lozinka_provjera"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($ime, $prezime, $korisnicko_ime, $email, $broj, $lozinka, $lozinka_provjera) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(invalidUid($korisnicko_ime) !== false) {
        header("location: ../index.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false) {
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($lozinka, $lozinka_provjera) !== false) {
        header("location: ../index.php?error=pwddontmatch");
        exit();
    }
    if(uidExist($conn, $korisnicko_ime, $email) !== false) {
        header("location: ../index.php?error=uidOrEmailTaken");
        exit();
    }

    createUser($conn, $ime, $prezime, $korisnicko_ime, $email, $uloga_id, $broj, $lozinka, $mjesto_id, $poslovnica_id);
}
else {
    header("location: ../index.php");
}