<?php 
    session_start();
    include_once 'includes/security.inc.php';
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';
?>


<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center" id="sidebar">
                    <div class="card-body">
                        <img src="admin/uploads/img/profile.jpg" class="rounded-circle" width="150">
                        <div>

                        <?php

                        $id = $_SESSION["id"];
                        
                        $sql = "SELECT korisnik.ime as ime
                                      ,korisnik.prezime as prezime
                                      ,korisnik.email as email
                                      ,korisnik.broj_mob as broj_mob
                                      ,mjesto.naziv     as misto
                                  FROM korisnik 
                                  LEFT JOIN mjesto
                                    ON korisnik.mjesto_id = mjesto.id
                                  WHERE korisnik.id = $id;";

                        $result = mysqli_query($conn, $sql);
                        $row=mysqli_fetch_assoc($result);
                        $ime = $row['ime'];
                        $prezime = $row['prezime'];
                        $email = $row['email'];
                        $broj_mob = $row['broj_mob'];
                        $mjesto = $row['misto'];
                                            
                        
                        ?>
                            <h3><?php echo $ime; ?> <?php echo $prezime; ?>  </h3>
                            <a href="profil.php">Moj profil</a>
                            <a href="kosarica.php">Moja košarica</a>
                            <a href="urediprofil.php?editProfil=<?php echo $id; ?>">Uredi profil</a>
                            <a href="promjenalozinke.php?editLozinka=<?php echo $id; ?>">Promjena lozinke</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">Profil</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Puno ime</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?php echo $ime; ?> <?php echo $prezime; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Email</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?php echo $email; ?> 
                            </div>
                        </div> 
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Kontakt broj</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                  <?php echo $broj_mob; ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Adresa</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                  <?php echo $mjesto; ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    include_once 'includes/footer.inc.php';
?>