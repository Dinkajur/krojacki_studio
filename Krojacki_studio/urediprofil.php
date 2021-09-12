<?php 
    session_start();
    include_once 'includes/security.inc.php';
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';

    $id = $_GET['editProfil'];

    $sql = "SELECT korisnik.id
                  ,korisnik.ime
                  ,korisnik.prezime
                  ,korisnik.korisnicko_ime
                  ,korisnik.email
                  ,korisnik.broj_mob
                  ,korisnik.mjesto_id
                  ,mjesto.naziv     as misto
              FROM korisnik  
              LEFT JOIN mjesto
                ON korisnik.mjesto_id = mjesto.id
             WHERE korisnik.id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];
    $korisnicko_ime = $row['korisnicko_ime'];
    $email = $row['email'];
    $broj_mob = $row['broj_mob'];
    $mjesto_id = $row['mjesto_id'];
    $misto = $row['misto'];

?>


<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center" id="sidebar">
                    <div class="card-body">
                        <img src="admin/uploads/img/profile.jpg" class="rounded-circle" width="150">
                        <div>
                            <h3><?php echo $ime; ?> <?php echo $prezime; ?> </h3>
                            <a href="profil.php">Moj profil</a>
                            <a href="kosarica.php">Moja košarica</a>
                            <a href="#">Uredi profil</a>
                            <a href="promjenalozinke.php?editLozinka=<?php echo $id; ?>">Promjena lozinke</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">Uredi profil</h1>
                    <div class="card-body">
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
                                <button type="submit" class="btn btn-primary" name="editP">Spremi</button> 
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
</body>
</html>