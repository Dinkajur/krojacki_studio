
<body onload="realtimeClock()">
<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">     
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand text-uppercase" href="index.php">Krojački studio <span class="fas fa-cut"></span></a>
              </div>
              <div id="clock" class="text-light ps-3 border-start"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars sm-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <?php  
                if(isset($_SESSION["id"])){
                    echo '<ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="kosarica.php"><span class="fas fa-shopping-cart fa-lg"></span></a></li>
                         </ul>';
                         }
            ?>
                    <li class="nav-item"><a class="nav-link" href="index.php">Početna</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#studio">Studio</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Kontakt</a></li>
                    <li class="nav-item"><a class="nav-link" href="galerija.php">Galerija</a></li>
                    <li class="nav-item"><a class="nav-link" href="o_nama.php">O nama</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right text-uppercase">
                <?php 
                if(isset($_SESSION["id"])){
                    echo '<li class="nav-item"><a class="nav-link" href="profil.php"><span class="fas fa-user"></span>&nbsp;Profil&nbsp;</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php"><span class="fas fa-power-off"></span>&nbsp;Odjava</a></li>';
                }
                else {
                    echo '<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signupModal"><span class="fas fa-pen"></span> Sign Up</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><span class="fas fa-sign-in-alt"></span> Login</a></li>';
                }
                ?>
                    </ul>
            </div>
        </div>
    </nav>