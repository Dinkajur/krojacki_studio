<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editKorisnik'];

    $sql = "SELECT korisnik.id
                  ,korisnik.ime
                  ,korisnik.prezime
                  ,korisnik.korisnicko_ime
                  ,korisnik.email
                  ,korisnik.broj_mob
                  ,korisnik.uloga_id
                  ,korisnik.lozinka
                  ,korisnik.mjesto_id
                  ,korisnik.poslovnica_id
                  ,korisnik.uloga_id
                  ,mjesto.naziv     as misto
                  ,uloga.naziv      as rola 
                  ,poslovnica.naziv as radnja
              FROM korisnik  
              LEFT JOIN poslovnica 
                ON korisnik.poslovnica_id = poslovnica.id
              LEFT JOIN mjesto
                ON korisnik.mjesto_id = mjesto.id
              LEFT JOIN uloga
                ON korisnik.uloga_id = uloga.id
             WHERE korisnik.id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $korisnicko_ime = $row['korisnicko_ime'];
    $email = $row['email'];
    $broj_mob = $row['broj_mob'];
    $uloga_id = $row['uloga_id'];
    $poslovnica_id = $row['poslovnica_id'];
    $mjesto_id = $row['mjesto_id'];
    $rola = $row['rola'];
    $radnja = $row['radnja'];
    $misto = $row['misto'];
    $lozinka = $row['lozinka'];

?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
    <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Ime:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $ime; ?>" name="ime" required>
        </div>
        <div class="mb-3">
            <label>Prezime:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $prezime; ?>" name="prezime" required>
        </div>
        <div class="mb-3">
            <label>Korisničko ime:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $korisnicko_ime; ?>" name="korisnicko_ime" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $email; ?>" name="email" required>
        </div>
        <div class="mb-3">
            <label>Kontakt broj:</label>
        </div>
        <div class="mb-3">
            <input rows="3" class="form-control" value="<?php echo $broj_mob; ?>" name="broj_mob" required>
        </div> 


        <div class="mb-3">
            <label>Uloga:</label>
        </div>     
        <div class="mb-3">
            <select class="form-control" name="uloga_id">
            <option value="<?php echo $uloga_id; ?>"><?php echo $rola; ?></option>
            <?php 

                $sql = "SELECT * FROM uloga"; 
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row["id"].'">'.$row["naziv"].'</option>';
                    }
                }
                else {
                    echo '<option value="0">Nema rezultata..</option>';
                }

            ?>  
            </select>
        </div>


        <div class="mb-3">
            <label>Poslovnica:</label>
        </div>     
        <div class="mb-3">
            <select class="form-control" name="poslovnica_id">
            <option value="<?php echo $poslovnica_id; ?>"><?php echo $radnja; ?></option>
            <?php 

                $sql = "SELECT * FROM poslovnica"; 
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row["id"].'">'.$row["naziv"].'</option>';
                    }
                }
                else {
                    echo '<option value="0">Nema rezultata..</option>';
                }

            ?>  
            </select>
        </div>



        <div class="mb-3">
            <label>Mjesto:</label>
        </div>     
        <div class="mb-3">
            <select class="form-control" name="mjesto_id">
            <option value="<?php echo $mjesto_id; ?>"><?php echo $misto; ?></option>
            <?php 

                $sql = "SELECT * FROM mjesto"; 
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row["id"].'">'.$row["naziv"].'</option>';
                    }
                }
                else {
                    echo '<option value="0">Nema rezultata..</option>';
                }

            ?>  
            </select>
        </div>



        <div class="mb-3">
            <label>Lozinka:</label>
        </div>
        <div class="mb-3">
            <input rows="3" class="form-control" value="<?php echo $lozinka; ?>" name="lozinka" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editK">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?>  