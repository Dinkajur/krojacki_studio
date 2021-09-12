<?php

include_once 'dbh.inc.php';

if(isset($_POST["submitNaruci"])){

    $k_id         = $_POST["id"];
    $velicina_id  = $_POST["velicina_id"];
    $materijal_id = $_POST["materijal_id"];
    $boja_id      = $_POST["boja_id"];
    $uzorak_id    = $_POST["uzorak_id"];
    $kolicina     = $_POST["kolicina"];

    $query = "SELECT cijena FROM velicina WHERE id = $velicina_id;";
    $rez = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($rez);
    
    $ukupno = $kolicina*$row["cijena"];
    
    $sql = "INSERT INTO narudzba (korisnik_id, velicina_id, materijal_id, boja_id, uzorak_id, kolicina, ukupno) 
                 VALUES ('$k_id', '$velicina_id', '$materijal_id', '$boja_id', '$uzorak_id', '$kolicina', '$ukupno')";
    
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        header("Location: ../index.php?Uspjeh");
        exit();
    }
    else {
        header("Location: ../index.php?Greska");
        exit();
    }

}


if(isset($_POST["submitNaruci2"])){

    $k_id         = $_POST["id"];
    $velicina_id  = $_POST["velicina_id"];
    $materijal_id = $_POST["materijal_id"];
    $boja_id      = $_POST["boja_id"];
    $uzorak_id    = $_POST["uzorak_id"];
    $kolicina     = $_POST["kolicina"];

    $query = "SELECT cijena FROM velicina WHERE id = $velicina_id;";
    $rez = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($rez);
    
    $ukupno = $kolicina*$row["cijena"];
    
    $sql = "INSERT INTO narudzba (korisnik_id, velicina_id, materijal_id, boja_id, uzorak_id, kolicina, ukupno) 
                 VALUES ('$k_id', '$velicina_id', '$materijal_id', '$boja_id', '$uzorak_id', '$kolicina', '$ukupno')";
    
    $result = mysqli_query($conn, $sql);
    if($result > 0){
        header("Location: ../kosarica.php?Uspjeh");
        exit();
    }
    else {
        header("Location: ../kosarica.php?Greska");
        exit();
    }

}