<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">-------</div>
                            <a class="nav-link" href="galerija.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Galerija
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                                Upravljaj 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Proizvod
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="velicina.php">Veličina</a>
                                            <a class="nav-link" href="materijal.php">Materijal</a>
                                            <a class="nav-link" href="uzorak.php">Uzorak</a>
                                            <a class="nav-link" href="boja.php">Boja</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Poslovnica
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="poslovnica.php">Poslovnica</a>
                                            <a class="nav-link" href="narudzba.php">Narudžbe</a>
                                            <a class="nav-link" href="web.php">Web stranica</a>
                                            <a class="nav-link" href="upiti.php">Pošta</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">-------</div>
                            <a class="nav-link" href="korisnici.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Korisnici
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseUloge" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>Uloge
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseUloge" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="uloga.php">Upravljaj</a>
                                        </nav>
                                    </div>
                            <a class="nav-link" href="mjesto.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                Mjesto
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                        
                    </div>
                </nav>
            </div>