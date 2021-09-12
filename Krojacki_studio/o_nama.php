<?php 
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';
?>


<section class="page-section" id="o_nama">
    <div class="container">
        <div class="row text-left">
            <h2> O nama </h2>
            
        </div>
    </div>
</section>

<hr>

<section class="page-section" id="frontend">
    <div class="container">
        <div class="row text-center">
            <h4>Frontend</h4>
            <div class="col-3">
                <img src="admin/uploads/img/htmlcss.jpg">
            </div>
            <div class="col-3">
                <img src="admin/uploads/img/bootstrap.jpg">
            </div>
            <div class="col-6">
                <div class="card m-4">
                    <div class="card-body bg-light ">
                    Sami temelj stranice napravljen je u HTML-u i CSS-u. Za moderniji izgled stranice koristili smo Bootstrap. Uz pomoć njega kreirali smo forme, modale i ostale stavke koje on nudi. Za određene funkcionalnosti smo koristili JavaScript.
                    </div>
                </div>
            </div>
       
        </div>
    </div>
</section>

<hr>

<section class="page-section" id="frontend">
    <div class="container">
        <div class="row text-center">
            <h4>Backend</h4>
            <div class="col-6">
                <div class="card m-4">
                    <div class="card-body bg-light ">
                      Za backend ovog projekta koristili smo PHP. Njime smo odradili sve CRUD operacije, te uspostavili konekciju sa MySql bazom u kojoj smo pohranjivali sve podatke.
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img src="admin/uploads/img/php.jpg">
            </div>
            <div class="col-3">
                <img src="admin/uploads/img/mysql.png">
            </div>
        </div>
    </div>
</section>

<hr>


<section class="page-section bg-light" id="kreatori">
    <div class="container">
        <div class="row text-center">
            <h2>Kreatori projekta:</h2>
            <div class="col-6">
                <img src="admin/uploads/img/dinka.jpeg" width="300px" height="500px">
                <div class="card m-2 bg-dark text-light text-uppercase">
                    Dinka Jurišić
                </div>
            </div>
            <div class="col-6">
                <img src="admin/uploads/img/martina.jpeg" width="300px" height="500px">
                <div class="card m-2 bg-dark text-light text-uppercase">
                    Martina Bonić
                </div>
            </div>
        </div>
    </div>
</section>


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


<?php 
    include_once 'includes/footer.inc.php';
?>