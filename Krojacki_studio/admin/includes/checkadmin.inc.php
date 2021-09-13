<?php 

include 'dbh.inc.php';

$id = $_GET['admin'];

$sql = "SELECT * FROM korisnik WHERE id = $id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if($row["uloga_id"] == 1){
    header("Location: ../index.php");
    exit();
}
else {
    header("Location: ../../index.php?nijeadmin");
    exit();
}
