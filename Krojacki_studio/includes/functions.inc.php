<?php

function emptyInputSignup($ime, $prezime, $korisnicko_ime, $email, $broj, $lozinka, $lozinka_provjera){
    $result;
    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($email) || empty($broj) || empty($lozinka) || empty($lozinka_provjera)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($korisnicko_ime){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $korisnicko_ime)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($lozinka, $lozinka_provjera){
    $result;
    if ($lozinka !== $lozinka_provjera) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExist($conn, $korisnicko_ime, $email){
    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ? OR email = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $korisnicko_ime, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $ime, $prezime, $korisnicko_ime, $email, $uloga_id, $broj, $lozinka, $mjesto_id, $poslovnica_id){
    $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, email, uloga_id, broj_mob, lozinka, mjesto_id, poslovnica_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($lozinka, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssss", $ime, $prezime, $korisnicko_ime, $email, $uloga_id, $broj, $hashedPwd, $mjesto_id, $poslovnica_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}


function emptyInputLogin($username, $lozinka){
    $result;
    if (empty($username) || empty($lozinka)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $lozinka){
    $uidExist = uidExist($conn, $username, $username);

    if ($uidExist ===  false){
        header("location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["lozinka"];
    $checkPwd = password_verify($lozinka, $pwdHashed);

    if($checkPwd === false){
        header("location: ../index.php?error=wrongpwd");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["id"] = $uidExist["id"]; 
        header("location: ../index.php");
        exit();
    }
}
