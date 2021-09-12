<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';
    require_once 'includes/dbh.inc.php';
?>



<div class="korisnik">
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noviKorisnik">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">Korisničko ime</th>
      <th scope="col">Email</th>
      <th scope="col">Broj korisnika</th>
      <th scope="col">Mjesto</th>
      <th scope="col">Uloga</th>
      <th scope="col">Poslovnica</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT korisnik.id
                  ,korisnik.ime
                  ,korisnik.prezime
                  ,korisnik.korisnicko_ime
                  ,korisnik.email
                  ,korisnik.broj_mob
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
                ORDER BY uloga_id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($row["uloga_id"] == 1) {
                echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["ime"] 
                ."</td><td>". $row["prezime"] 
                ."</td><td>". $row["korisnicko_ime"] 
                ."</td><td>". $row["email"] 
                ."</td><td>". $row["broj_mob"] 
                ."</td><td>". $row["misto"] 
                ."</td><td>". $row["rola"] 
                ."</td><td>". $row["radnja"] 
                .'</td><td><a href="editkorisnik.php?editKorisnik='.$row["id"].'"><button class="btn btn-warning">Uredi</button></a>';
            } else {
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["ime"] 
                ."</td><td>". $row["prezime"] 
                ."</td><td>". $row["korisnicko_ime"] 
                ."</td><td>". $row["email"] 
                ."</td><td>". $row["broj_mob"] 
                ."</td><td>". $row["misto"] 
                ."</td><td>". $row["rola"] 
                ."</td><td>". $row["radnja"] 
                .'</td><td><a href="editkorisnik.php?editKorisnik='.$row["id"].'"><button class="btn btn-warning">Uredi</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteKorisnik='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
            }
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
</div>

<!-- Modal za kreiranje novog korisnika -->

<div class="modal modal-fade" id="noviKorisnik" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novi korisnik</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
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
                <div class="mb-3">
                        <input type="text" class="form-control" name="broj_mob" placeholder="Broj telefona/mobitela.." required>
                    </div>
                    <div class="mb-3">
                        <label>Odaberite ulogu:</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="uloga_id">
                        <option></option>
                        <?php 
        
                            $sql = "SELECT * FROM uloga;";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row["id"].'">'.$row["naziv"].'</option>';
                                }
                            }
                            else {
                                echo "<option>Nema rezultata..</option>";
                            }

                        ?>  
                        </select>
                        </div>
                        <div class="mb-3">
                            <label>Odaberite mjesto:</label>
                        </div>      

                        <div class="mb-3">
                            <select class="form-control" name="mjesto_id">
                        <option value="0"></option>
                        <?php 
        
                            $sql = "SELECT * FROM mjesto;";
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
                            <label>Odaberite poslovnicu:</label>
                        </div>      
                        <div class="mb-3">
                        <select class="form-control" name="poslovnica_id">
                        <option value="0"></option>
                        <?php 
        
                            $sql = "SELECT * FROM poslovnica;";
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
                        <input type="password" class="form-control" name="lozinka" placeholder="Lozinka.." required>       
                    </div>
                <div class="mb-3">
                        <input type="password" class="form-control" name="lozinka_provjera" placeholder="Ponovite lozinku.." required>  
                </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitKorisnik">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



 <?php

include_once 'includes/footer.inc.php';

?>  