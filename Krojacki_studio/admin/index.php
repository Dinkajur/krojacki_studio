<?php
    session_start();
    include_once 'includes/dbh.inc.php';
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';
    

?>
        
        





            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Korisnici <i class="fas fa-users"></i></div>
                                        <div class="text-light">
                                            <h1 class="mb-3 text-center"> <?php 
                                                $sql = "SELECT * 
                                                          FROM korisnik";
                                                $rez = mysqli_query($conn, $sql);
                                                $ukupno = mysqli_num_rows($rez);
                                                echo $ukupno;
                                            ?>
                                            </h1>
                                        </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="korisnici.php">Više Detalja</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Narudžbe <i class="fas fa-shopping-cart"></i></div>
                                        <div class="text-light">
                                            <h1 class="mb-3 text-center"> <?php 
                                                $sql = "SELECT * 
                                                          FROM narudzba";
                                                $rez = mysqli_query($conn, $sql);
                                                $ukupno = mysqli_num_rows($rez);
                                                echo $ukupno;
                                            ?>
                                            </h1>
                                        </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="narudzba.php">Više Detalja</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <div class="card-body">Upiti <i class="fas fa-envelope-square"></i></div>
                                        <div class="text-light">
                                            <h1 class="mb-3 text-center"> <?php 
                                                $sql = "SELECT * 
                                                          FROM upiti";
                                                $rez = mysqli_query($conn, $sql);
                                                $ukupno = mysqli_num_rows($rez);
                                                echo $ukupno;
                                            ?>
                                            </h1>
                                        </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="upiti.php">Više Detalja</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Galerija <i class="fas fa-brush"></i></div>
                                        <div class="text-light">
                                            <h1 class="mb-3 text-center"> <?php 
                                                $sql = "SELECT * 
                                                          FROM galerija";
                                                $rez = mysqli_query($conn, $sql);
                                                $ukupno = mysqli_num_rows($rez);
                                                echo $ukupno;
                                            ?>
                                            </h1>
                                        </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="galerija.php">Više detalja</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
<?php

    include_once 'includes/footer.inc.php';

?>     
