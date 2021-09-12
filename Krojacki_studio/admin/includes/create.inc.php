<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submitKorisnik"])){

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



    if(emptyInputSignup($ime, $prezime, $korisnicko_ime, $email, $uloga_id, $broj, $lozinka, $lozinka_provjera) !== false) {
        header("location: ../korisnici.php?error=emptyinput");
        exit();
    }
    if(invalidUid($korisnicko_ime) !== false) {
        header("location: ../korisnici.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false) {
        header("location: ../korisnici.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($lozinka, $lozinka_provjera) !== false) {
        header("location: ../korisnici.php?error=pwddontmatch");
        exit();
    }
    if(uidExist($conn, $korisnicko_ime, $email) !== false) {
        header("location: ../korisnici.php?error=uidOrEmailTaken");
        exit();
    }

    createUser($conn, $ime, $prezime, $korisnicko_ime, $email, $uloga_id, $mjesto_id, $poslovnica_id, $broj, $lozinka);
}
else {
    header("location: ../korisnici.php");
}


if(isset($_POST['submitMjesto'])){
    $naziv = $_POST['naziv'];
    $ulica = $_POST['ulica'];
    $post_broj = $_POST['post_broj'];

    $sql = "INSERT INTO mjesto (naziv, ulica, post_broj) VALUES ('$naziv', '$ulica', '$post_broj');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../mjesto.php?MjestoDodano");
        exit();
    }
    else {
        header("Location: ../mjesto.php?Greska");
        exit();
    }
}



if(isset($_POST['submitPoslovnica'])){
    $naziv = $_POST['naziv'];
    $mjesto_id = $_POST['mjesto_id'];

    $sql = "INSERT INTO poslovnica (naziv, mjesto_id) VALUES ('$naziv', '$mjesto_id');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../poslovnica.php?poslovnicadodana");
        exit();
    }
    else {
        header("Location: ../poslovnica.php?Greska");
        exit();
    }
}


if(isset($_POST['submitVelicina'])){
    $oznaka = $_POST['oznaka'];
    $cijena = $_POST['cijena'];

    $sql = "INSERT INTO velicina (oznaka, cijena) VALUES ('$oznaka', '$cijena');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../velicina.php?OznakaDodana");
        exit();
    }
    else {
        header("Location: ../velicina.php?Greska");
        exit();
    }
}


if(isset($_POST['submitMaterijal'])){
    $naziv = $_POST['naziv'];

    $sql = "INSERT INTO materijal (naziv) VALUES ('$naziv');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../materijal.php?MaterijalDodan");
        exit();
    }
    else {
        header("Location: ../materijal.php?Greska");
        exit();
    }
}

if(isset($_POST["submitBoja"]) && isset($_FILES["slika"])) {

    $naziv = $_POST['naziv'];
    $img_name = $_FILES['slika']['name'];
    $img_size = $_FILES['slika']['size'];
    $tmp_name = $_FILES['slika']['tmp_name'];
    $error = $_FILES['slika']['error'];

    if($error === 0) {
        if($img_size > 125000) {
            header("Location: ../boja.php?PrevelikaSlika");
        }
        else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("img", true).'.'.$img_ex_lc;
                $img_upload_path = '../uploads/boja/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "INSERT INTO boja (naziv, slika) VALUES ('$naziv', '$new_img_name')";
                mysqli_query($conn, $sql);
                header("Location: ../boja.php?Uspjeh");
            } else {
                header("Location: ../boja.php?KriviFormat");
            }
        }
    }
    else {
        header("Location: ../boja.php?greska");
    }
}


if(isset($_POST["submitUzorak"]) && isset($_FILES["slika"])) {

    $naziv = $_POST['naziv'];
    $img_name = $_FILES['slika']['name'];
    $img_size = $_FILES['slika']['size'];
    $tmp_name = $_FILES['slika']['tmp_name'];
    $error = $_FILES['slika']['error'];

    if($error === 0) {
        if($img_size > 125000) {
            header("Location: ../uzorak.php?PrevelikaSlika");
        }
        else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("img", true).'.'.$img_ex_lc;
                $img_upload_path = '../uploads/uzorak/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "INSERT INTO uzorak (naziv, slika) VALUES ('$naziv', '$new_img_name')";
                mysqli_query($conn, $sql);
                header("Location: ../uzorak.php?Uspjeh");
            } else {
                header("Location: ../uzorak.php?KriviFormat");
            }
        }
    }
    else {
        header("Location: ../uzorak.php?greska");
    }
}


if(isset($_POST["submitGalerija"]) && isset($_FILES["slika"])) {

    $img_name = $_FILES['slika']['name'];
    $img_size = $_FILES['slika']['size'];
    $tmp_name = $_FILES['slika']['tmp_name'];
    $error = $_FILES['slika']['error'];

    if($error === 0) {
        if($img_size > 1000000) {
            header("Location: ../galerija.php?PrevelikaSlika");
        }
        else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("img", true).'.'.$img_ex_lc;
                $img_upload_path = '../uploads/galerija/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = "INSERT INTO galerija (slika) VALUES ('$new_img_name')";
                mysqli_query($conn, $sql);
                header("Location: ../galerija.php?Uspjeh");
            } else {
                header("Location: ../galerija.php?KriviFormat");
            }
        }
    }
    else {
        header("Location: ../galerija.php?greska");
    }
}



if(isset($_POST['submitUloga'])){
    $naziv = $_POST['naziv'];

    $sql = "INSERT INTO uloga (naziv) VALUES ('$naziv');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../uloga.php?ulogadodana");
        exit();
    }
    else {
        header("Location: ../uloga.php?Greska");
        exit();
    }
}

if(isset($_POST['submitDozvola'])){
    $opis = $_POST['opis'];

    $sql = "INSERT INTO dozvola (opis) VALUES ('$opis');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../uloga.php?dozvoladodana");
        exit();
    }
    else {
        header("Location: ../uloga.php?Greska");
        exit();
    }
}

if(isset($_POST['submitDodjela'])){
    $uloga_id = $_POST['uloga_id'];
    $dozvola_id = $_POST['dozvola_id'];

    $sql = "INSERT INTO uloga_dozvola (uloga_id, dozvola_id) VALUES ('$uloga_id', '$dozvola_id');";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: ../uloga.php?dodijelaladodana");
        exit();
    }
    else {
        header("Location: ../uloga.php?Greska");
        exit();
    }
}
