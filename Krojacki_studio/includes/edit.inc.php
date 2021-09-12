<?php

include_once 'dbh.inc.php';

#PROFIL


if(isset($_POST['editP'])){
    
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $broj_mob = $_POST['broj_mob'];
    $mjesto_id = $_POST['mjesto_id'];

    $sql = "UPDATE korisnik 
            SET  ime            = '$ime'
                ,prezime        = '$prezime'
                ,korisnicko_ime = '$korisnicko_ime'
                ,email          = '$email'
                ,broj_mob       = '$broj_mob'
                ,mjesto_id      = '$mjesto_id'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../profil.php?uspjeh");
        exit();
    } else {
        header("Location: ../profil.php?greska");
        exit();
    }

}



#LOZINKA


if(isset($_POST['editL'])){
    
    $id = $_POST['id'];
    $lozinka = $_POST['lozinka'];
    $hashedPwd = password_hash($lozinka, PASSWORD_DEFAULT);

    $sql = "UPDATE korisnik 
            SET  lozinka = '$hashedPwd'
           WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: ../profil.php?uspjeh");
        exit();
    } else {
        header("Location: ../profil.php?greska");
        exit();
    }

}