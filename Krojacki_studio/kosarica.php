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
            <div class="col-md-8">
                <div class="card mb-3 content">
                <h2 class="m-3 pt-3">Košarica</h2>
                  <div class="card-body">
                    <div class="row">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Veličina</th>
                          <th scope="col">Materijal</th>
                          <th scope="col">Boja</th>
                          <th scope="col">Uzorak</th>
                          <th scope="col">Količina</th>
                          <th scope="col">Cijena</th>
                          <th scope="col">Ukupno</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php 
                        
                        $k_id = $_SESSION["id"];

                        $sql = "SELECT narudzba.id as id
                                      ,boja.slika as boja
                                      ,uzorak.slika as uzorak
                                      ,velicina.oznaka as oznaka
                                      ,velicina.cijena as cijena
                                      ,materijal.naziv as materijal
                                      ,kolicina 
                                      ,ukupno
                                  FROM narudzba  
                                  LEFT JOIN boja 
                                    ON narudzba.boja_id = boja.id
                                  LEFT JOIN uzorak
                                    ON narudzba.uzorak_id = uzorak.id
                                  LEFT JOIN velicina
                                    ON narudzba.velicina_id = velicina.id
                                  LEFT JOIN materijal
                                    ON narudzba.materijal_id = materijal.id
                                  WHERE korisnik_id = $k_id ;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr><td>". $row["oznaka"] 
                                    ."</td><td>". $row["materijal"] 
                                    .'</td><td> <img width="25px" height="25px" src="admin/uploads/boja/'. $row['boja'] .'">'
                                    .'</td><td> <img width="25px" height="25px" src="admin/uploads/uzorak/'. $row['uzorak'] .'">'
                                    ."</td><td>". $row["kolicina"]
                                    ."</td><td>". $row["cijena"] 
                                    ."  KM</td><td>". $row["ukupno"] 
                                    .'  KM</td><td><a href="includes/delete.inc.php?deleteNarudzba='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>';
                            }
                            echo "</tbody></table>";
                        }
                        else {
                            echo "</tbody></table>";
                            echo "Nema rezultata..";
                        }
        
                        ?>  
                      </div>
                      <hr>
                      <div class="row">
                        <?php 

                          $korisnik_id = $_SESSION["id"];

                          $query = "SELECT korisnik_id as id, SUM(ukupno) as ukupno 
                                      FROM narudzba 
                                     WHERE korisnik_id = $korisnik_id;";
                          $rez = mysqli_query($conn, $query);
                          $row = mysqli_fetch_array($rez);

                

                        ?>
                        <label>Za platiti: <?php echo $row["ukupno"]; ?> KM</label>
                        <a href="includes/delete.inc.php?naruci=<?php echo $row["id"]; ?>"><button class="btn btn-success mt-3">Plati</button></a>
                        
                      </div>
                      <hr>
                      <button class="btn btn-dark mt-3 " data-bs-toggle="modal" data-bs-target="#naruciModal">Naruči još</button>
                    </div>           
                </div>
            </div>
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
                            <div class="col mb-3">
                                <label>Korisnik:</label>
                            </div>
                            <div class="col-5 mb-3">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"> 
                                <input type="text" class="form-control" name="ime" value="<?php echo $row["ime"]; ?>" disabled>
                            </div>
                            <div class="col-5 mb-3">
                                <input type="text" class="form-control" name="prezime" value="<?php echo $row["prezime"]; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <?php 
                    
                    
                    ?>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col mb-3">
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

                            <div class="col mb-3">
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
                            <div class="col mb-3">
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

                            <div class="col mb-3">
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
                            <div class="col-4 mb-3">
                                <label>Količina:</label>
                                <input type="text" class="form-control" name="kolicina" placeholder="Unesite kolicinu.." required>
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
                        <button type="submit" class="btn btn-primary" name="submitNaruci2">Naruči</button> 
                </div> 
            </form>
        </div>
    </div>
</div>


<!--------------------------------------------------------------------------------------------------------------->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>