<?php 
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';
?>

<section class="gallery min-vh-100 bg-danger">
     <div class="container-lg">
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
        <?php 
    
            $sql = "SELECT * FROM galerija;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
               while($row = mysqli_fetch_assoc($result)){
                     echo '<div class="col">
                           <img src="admin/uploads/galerija/'. $row['slika'] .'"class="gallery-item" alt="gallery"></div>';
               }
            }
            else {
               echo '<div class="alert alert-info" role="alert">
                        Galerija je trenutno prazna!
                     </div>';
            }

            ?>

        </div>
     </div>
  </section>


<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <img src="assets/galerija/img1.jpg" class="modal-img" alt="modal img">
      </div>
    </div>
  </div>
</div>


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



<!-- Skripte za galeriju -->

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>

<?php 
    include_once 'includes/footer.inc.php';
?>