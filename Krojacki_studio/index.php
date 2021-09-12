<?php 
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';
?>

    
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading">Dobrodošli u</div>
            <div class="masthead-subheading text-uppercase">Krojački studio</div> 
            <?php 
                if(isset($_SESSION["id"])){
                    echo '<button class="btn btn-dark btn-lg text-uppercase " data-bs-toggle="modal" data-bs-target="#naruciModal">Naruči</button>';
                }
                ?>
        </div>
    </header>

    <?php 

    $sql = "SELECT * FROM web_stranica WHERE id = 1";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $naziv_stranice = $row['naziv_stranice'];
    $sekcija = $row['sekcija'];
    $naslov = $row['naslov'];
    $ikona = $row['ikona'];
    $opis = $row['opis'];

    ?>

    <section class="page-section" id="studio">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-danger"></i>
                        <i class="fas fa-<?php echo $ikona; ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3"><?php echo $naslov; ?></h4>
                    <p class="text-muted"><?php echo $opis; ?></p>
                </div>

                <?php 

                $sql = "SELECT * FROM web_stranica WHERE id = 2";
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($result);
                $naziv_stranice = $row['naziv_stranice'];
                $sekcija = $row['sekcija'];
                $naslov = $row['naslov'];
                $ikona = $row['ikona'];
                $opis = $row['opis'];

                ?>


                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-info"></i>
                        <i class="fas fa-<?php echo $ikona; ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3"><?php echo $naslov; ?></h4>
                    <p class="text-muted"><?php echo $opis; ?></p>
                </div>

                <?php 

                $sql = "SELECT * FROM web_stranica WHERE id = 3";
                $result = mysqli_query($conn, $sql);
                $row=mysqli_fetch_assoc($result);
                $naziv_stranice = $row['naziv_stranice'];
                $sekcija = $row['sekcija'];
                $naslov = $row['naslov'];
                $ikona = $row['ikona'];
                $opis = $row['opis'];

                ?>

                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-success"></i>
                        <i class="fas fa-<?php echo $ikona; ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3"><?php echo $naslov; ?></h4>
                    <p class="text-muted"><?php echo $opis; ?></p>
                </div>
            </div>
        </div>
    </section>

            <?php 

            $sql = "SELECT * FROM web_stranica WHERE id = 4";
            $result = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $naziv_stranice = $row['naziv_stranice'];
            $sekcija = $row['sekcija'];
            $naslov = $row['naslov'];
            $ikona = $row['ikona'];
            $opis = $row['opis'];


            if(isset($_POST["submitUpit"])){

                $ime = $_POST["ime"];
                $email = $_POST["email"];
                $broj = $_POST["broj"];
                $upit = $_POST["upit"];

                $query = "INSERT INTO upiti (ime, email, broj, upit) VALUES ('$ime', '$email', '$broj', '$upit');";
                $result = mysqli_query($conn, $query);
            }

            ?>
   
        <section class="page-section bg-danger" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $naslov; ?></h2>
                    <h3 class="section-subheading text-dark"><?php echo $opis; ?></h3>
                </div>
                

                <form id="contactForm" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="ime" id="name" type="text" placeholder="Ime" required />
                                <div class="invalid-feedback">Potrebno je unijeti ime..</div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email" required/>
                                <div class="invalid-feedback" >Potrebno je unijeti email..</div>
                                <div class="invalid-feedback" >Email nije točan..</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" name="broj" id="phone" type="tel" placeholder="Kontakt Broj" required />
                                <div class="invalid-feedback">Potrebno je unijeti broj telefona/mobitela..</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="upit" id="message" placeholder="..." required></textarea>
                                <div class="invalid-feedback">Potrebno je unijeti poruku..</div>
                            </div>
                        </div>
                    </div>
                
                    <div class="text-center"><button class="btn btn-dark btn-xl text-uppercase " name="submitUpit" id="submitButton" type="submit">Pošalji</button></div>
                </form>
            </div>
        </section>




<!----------------------------- Svi modali koji se nalaze na index stranici --------------------------------------->

<!-- Modal za login -->

<div class="modal modal-fade" id="loginModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Prijava</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <form action="includes/login.inc.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="uid" placeholder="Username/Email.." required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="lozinka" placeholder="Lozinka.." required>       
                </div> 
            </div>
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Prijava</button> 
                </div>  
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal za registraciju -->


<div class="modal modal-fade" id="signupModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registracija</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/singup.inc.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="ime" placeholder="Ime.." required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="prezime" placeholder="Prezime.." required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="korisnicko_ime" placeholder="Korisničko ime.." required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email.." required>
                    </div>
                    
                    <!------------ Dodijela uloge,mjesta,poslovnice korisniku ------------->
         
                    <input type="hidden" name="uloga_id" value="2">
                    <input type="hidden" name="poslovnica_id" value="3">
                    <input type="hidden" name="mjesto_id" value="7">
                  
                  <!----------------------------------------------------------------------->

                <div class="mb-3">
                        <input type="text" class="form-control" name="broj_mob" placeholder="Broj telefona/mobitela.." required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="lozinka" placeholder="Lozinka.." required>       
                    </div>
                <div class="mb-3">
                        <input type="password" class="form-control" name="lozinka_provjera" placeholder="Ponovite lozinku.." required>  
                </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Registriraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



<!----------------            NARUČIVANJE             ----------------->

<div class="modal modal-fade" id="naruciModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Naruči</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/order.inc.php" method="post">

                    <?php 

                    $idd = $_SESSION["id"];

                    $sql = "SELECT * FROM korisnik WHERE id = $idd;";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 pt-2">
                                <label>Korisnik:</label>
                            </div>
                            <div class="col-4 mb-3">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"> 
                                <input type="text" class="form-control" name="ime" value="<?php echo $row["ime"]; ?>" disabled>
                            </div>
                            <div class="col-4 mb-3">
                                <input type="text" class="form-control" name="prezime" value="<?php echo $row["prezime"]; ?>" disabled>
                            </div>
                        </div>
                        <hr>
                    </div>
                    

                    <?php 
                    
                    
                    ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-2 mb-3 pt-2">
                                <label>Veličina:</label>
                            </div>
                            <div class="col mb-3">
                                <select class="form-control" name="velicina_id">
                                    <option value="0">Odaberite..</option>
                                    <?php 
                    
                                        $sql = "SELECT * FROM velicina;";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                        if($resultCheck > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$row["id"].'">'.$row["oznaka"].'</option>';
                                            }
                                        }
                                        else {
                                            echo '<option value="0">Nema rezultata..</option>';
                                        }

                                    ?>
                                </select>
                            </div>

                            <div class="col-2 mb-3 pt-2">
                                <label>Materijal:</label>
                            </div>

                            <div class="col mb-3">
                                <select class="form-control" name="materijal_id">
                                    <option value="0">Odaberite..</option>
                                    <?php 
                    
                                        $sql = "SELECT * FROM materijal;";
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
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-2 mb-3 pt-2">
                                <label>Boja:</label>
                            </div>
                            <div class="col mb-3">
                                <select class="form-control" name="boja_id">
                                    <option value="0">Odaberite..</option>
                                    <?php 
                    
                                        $sql = "SELECT * FROM boja;";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                        if($resultCheck > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$row["id"].'">'. $row['naziv'] .'</option>;';
                                            }
                                        }
                                        else {
                                            echo '<option value="0">Nema rezultata..</option>';
                                        }

                                    ?>  
                            </select>
                            </div>

                            <div class="col-2 mb-3 pt-2">
                                <label>Uzorak:</label>
                            </div>

                            <div class="col mb-3">
                                <select class="form-control" name="uzorak_id">
                                    <option value="0">Odaberite..</option>
                                    <?php 
                    
                                        $sql = "SELECT * FROM uzorak;";
                                        $result = mysqli_query($conn, $sql);
                                        $resultCheck = mysqli_num_rows($result);

                                        if($resultCheck > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$row["id"].'">'. $row['naziv'] .'</option>;';
                                            }
                                        }
                                        else {
                                            echo '<option value="0">Nema rezultata..</option>';
                                        }

                                    ?>  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-2 mb-3 pt-2">
                                <label>Količina:</label>
                            </div>
                            <div class="col-1 mb-3">
                                <input type="text" class="form-control" name="kolicina" placeholder="..." required>
                            </div>                       
                            <div class="card mb-4">
                                <label>Cijene:</label>
                                <?php 
                        
                                $sql = "SELECT * FROM velicina;";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if($resultCheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<label class="text-small">'. $row['oznaka'] .' -> ' . $row['cijena'] .'KM &nbsp&nbsp</label>';
                                    }
                                }
                            

                            ?>  
                            </div>
                         </div> 
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" name="submit">Poništi</button> 
                        <button type="submit" class="btn btn-primary" name="submitNaruci">Naruči</button> 
                </div> 
            </form>
        </div>
    </div>
</div>


<!--------------------------------------------------------------------------------------------------------------->

<footer class="footer py-4">
    <div class="container">
        <div class="footer-text">
            <div class="row align-items-center">    
                <div class="col-lg-4 text-lg-start text-light">Copyright &copy; Bonić & Jurišić 2021</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-light btn-social mx-3" href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-light btn-social mx-3" href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    <a class="btn btn-light btn-social mx-3" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
               <?php if(isset($_SESSION["id"])){
                    $id = $_SESSION["id"];
                    echo '<a class="link-light text-decoration-none me-3"  href="admin/includes/checkadmin.inc.php?admin='.$id.'">Admin</a>';
                } 

                
                ?>
                    <a name="file" class="link-light text-decoration-none" href="download.php?file=vizija.pdf">Vizija</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
</body>
</html>