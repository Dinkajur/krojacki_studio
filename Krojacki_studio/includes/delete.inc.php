<?php

include_once 'dbh.inc.php';

if(isset($_GET["deleteNarudzba"])){

    $id = $_GET["deleteNarudzba"];

    $sql = "DELETE FROM narudzba WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../kosarica.php?NarudzbaIzbrisana");
        exit();
    }
    else {
        header("Location: ../kosarica.php?GreskaBrisanja");
        exit();
    }
}

if(isset($_GET["naruci"])){

    $id = $_GET["naruci"];

    $sql = "DELETE FROM narudzba WHERE korisnik_id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../kosarica.php?naruceno");
        exit();
    }
    else {
        header("Location: ../kosarica.php?greska");
        exit();
    }
}