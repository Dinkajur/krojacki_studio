<?php 

$id = $_SESSION["id"];


$sql = "SELECT * FROM korisnik WHERE id = $id;";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if(!isset($_SESSION["id"])){
    header("Location: ../index.php?nisteadmin");
    exit();
} 
else if($row["uloga_id"] != 1){
    header("Location: ../index.php?nijeadmin");
    exit();
}
