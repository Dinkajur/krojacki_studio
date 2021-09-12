<?php

include_once 'dbh.inc.php';

#WEB STRANICA

if(isset($_POST['editW'])){
    
    $id = $_POST['id'];
    $naziv_stranice = $_POST['naziv_stranice'];
    $sekcija = $_POST['sekcija'];
    $naslov = $_POST['naslov'];
    $ikona = $_POST['ikona'];
    $opis = $_POST['opis'];

    $sql = "UPDATE web_stranica 
            SET naziv_stranice = '$naziv_stranice'
                ,sekcija        = '$sekcija'
                ,naslov         = '$naslov'
                ,ikona          = '$ikona'
                ,opis           = '$opis'
            WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../web.php?uspjeh");
        exit();
    } else {
        header("Location: ../web.php?greska");
        exit();
    }

}




#MJESTO


if(isset($_POST['editMj'])){
    
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $ulica = $_POST['ulica'];
    $post_broj = $_POST['post_broj'];

    $sql = "UPDATE mjesto 
            SET  naziv     = '$naziv'
                ,ulica     = '$ulica'
                ,post_broj = '$post_broj'
            WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../mjesto.php?uspjeh");
        exit();
    } else {
        header("Location: ../mjesto.php?greska");
        exit();
    }

}



#KORISNIK


if(isset($_POST['editK'])){
    
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $broj_mob = $_POST['broj_mob'];
    $uloga_id = $_POST['uloga_id'];
    $mjesto_id = $_POST['mjesto_id'];
    $poslovnica_id = $_POST['poslovnica_id'];
    $lozinka = $_POST['lozinka'];
    $hashedPwd = password_hash($lozinka, PASSWORD_DEFAULT);

    $sql = "UPDATE korisnik 
            SET  ime            = '$ime'
                ,prezime        = '$prezime'
                ,korisnicko_ime = '$korisnicko_ime'
                ,email          = '$email'
                ,broj_mob       = '$broj_mob'
                ,uloga_id       = '$uloga_id'
                ,mjesto_id      = '$mjesto_id'
                ,poslovnica_id  = '$poslovnica_id'
                ,lozinka        = '$hashedPwd'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../korisnici.php?uspjeh");
        exit();
    } else {
        header("Location: ../korisnici.php?greska");
        exit();
    }

}


#VELIČINA


if(isset($_POST['editV'])){
    
    $id = $_POST['id'];
    $oznaka = $_POST['oznaka'];
    $cijena = $_POST['cijena'];

    $sql = "UPDATE velicina 
            SET  oznaka = '$oznaka'
                ,cijena = '$cijena'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../velicina.php?uspjeh");
        exit();
    } else {
        header("Location: ../velicina.php?greska");
        exit();
    }

}


#MATERIJAL


if(isset($_POST['editM'])){
    
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];

    $sql = "UPDATE materijal 
            SET  naziv = '$naziv'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../materijal.php?uspjeh");
        exit();
    } else {
        header("Location: ../materijal.php?greska");
        exit();
    }

}



#ULOGA


if(isset($_POST['editU'])){
    
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];

    $sql = "UPDATE uloga 
            SET  naziv = '$naziv'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../uloga.php?uspjeh");
        exit();
    } else {
        header("Location: ../uloga.php?greska");
        exit();
    }

}



#DOZVOLA


if(isset($_POST['editD'])){
    
    $id = $_POST['id'];
    $opis = $_POST['opis'];

    $sql = "UPDATE dozvola 
            SET  opis = '$opis'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../uloga.php?uspjeh");
        exit();
    } else {
        header("Location: ../uloga.php?greska");
        exit();
    }

}



#POSLOVNICA


if(isset($_POST['editPosl'])){
    
    $id        = $_POST['id'];
    $naziv     = $_POST['naziv'];
    $mjesto_id = $_POST['mjesto_id'];

    $sql = "UPDATE poslovnica 
               SET naziv      = '$naziv'
                  ,mjesto_id = '$mjesto_id'
             WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../poslovnica.php?uspjeh");
        exit();
    } else {
        header("Location: ../poslovnica.php?greska");
        exit();
    }

}