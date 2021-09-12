<?php 
    
    include_once 'dbh.inc.php';

if(isset($_GET["deleteKorisnik"])){
    $id = $_GET["deleteKorisnik"];

    $sql = "DELETE FROM korisnik WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../korisnici.php?KorisnikIzbrisan");
        exit();
    }
    else {
        header("Location: ../korisnici.php?GreskaBrisanja");
        exit();
    }
}

if(isset($_GET["deleteMjesto"])){
    $id = $_GET["deleteMjesto"];

    $sql = "DELETE FROM mjesto WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../mjesto.php?MjestoIzbrisano");
        exit();
    }
    else {
        header("Location: ../mjesto.php?GreskaBrisanja");
        exit();
    }
}

if(isset($_GET["deleteUloga"])){
    $id = $_GET["deleteUloga"];

    $sql = "DELETE FROM uloga WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../uloga.php?UlogaIzbrisana");
        exit();
    }
    else {
        header("Location: ../uloga.php?GreskaBrisanja");
        exit();
    }
}

if(isset($_GET["deleteDozvola"])){
    $id = $_GET["deleteDozvola"];

    $sql = "DELETE FROM dozvola WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../uloga.php?DozvolaIzbrisana");
        exit();
    }
    else {
        header("Location: ../uloga.php?GreskaBrisanja");
        exit();
    }
}


if(isset($_GET["deleteDodijela"])){
    $id = $_GET["deleteDodijela"];

    $sql = "DELETE FROM uloga_dozvola WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../uloga.php?DodijelaIzbrisana");
        exit();
    }
    else {
        header("Location: ../uloga.php?GreskaBrisanja");
        exit();
    }
}



if(isset($_GET["deletePoslovnica"])){
    $id = $_GET["deletePoslovnica"];

    $sql = "DELETE FROM poslovnica WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../poslovnica.php?PoslovnicaIzbrisana");
        exit();
    }
    else {
        header("Location: ../poslovnica.php?GreskaBrisanja");
        exit();
    }
}


if(isset($_GET["deleteNarudzba"])){
    $id = $_GET["deleteNarudzba"];

    $sql = "DELETE FROM narudzba WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../narudzba.php?NarudzbaIzbrisana");
        exit();
    }
    else {
        header("Location: ../narudzba.php?GreskaBrisanja");
        exit();
    }
}



if(isset($_GET["deleteUpit"])){
    $id = $_GET["deleteUpit"];

    $sql = "DELETE FROM upiti WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../upiti.php?UpitIzbrisan");
        exit();
    }
    else {
        header("Location: ../upiti.php?GreskaBrisanja");
        exit();
    }
}


if(isset($_GET["izbrisiSveUpite"])){

    $sql = "TRUNCATE TABLE upiti;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../upiti.php?UpitiIzbrisani");
        exit();
    }
    else {
        header("Location: ../upiti.php?GreskaBrisanja");
        exit();
    }
}




if(isset($_GET["deleteVelicina"])){
    $id = $_GET["deleteVelicina"];

    $sql = "DELETE FROM velicina WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../velicina.php?VelicinaIzbrisana");
        exit();
    }
    else {
        header("Location: ../velicina.php?GreskaBrisanja");
        exit();
    }
}


if(isset($_GET["deleteBoja"])){
    $id = $_GET["deleteBoja"];

    $sql = "DELETE FROM boja WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../boja.php?BojaIzbrisana");
        exit();
    }
    else {
        header("Location: ../boja.php?GreskaBrisanja");
        exit();
    }
}




if(isset($_GET["deleteMaterijal"])){
    $id = $_GET["deleteMaterijal"];

    $sql = "DELETE FROM materijal WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../materijal.php?MaterijalIzbrisan");
        exit();
    }
    else {
        header("Location: ../materijal.php?GreskaBrisanja");
        exit();
    }
}



if(isset($_GET["deleteUzorak"])){
    $id = $_GET["deleteUzorak"];

    $sql = "DELETE FROM uzorak WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../uzorak.php?UzorakIzbrisan");
        exit();
    }
    else {
        header("Location: ../uzorak.php?GreskaBrisanja");
        exit();
    }
}


if(isset($_GET["deleteGalerija"])){
    $id = $_GET["deleteGalerija"];

    $sql = "DELETE FROM galerija WHERE id = $id;";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../galerija.php?GalerijaIzbrisana");
        exit();
    }
    else {
        header("Location: ../galerija.php?GreskaBrisanja");
        exit();
    }
}