<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';
?>



<div class="korisnik">
<button type="button" id="btnNovi" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#novaDodijela">Dodijeli dozvole</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Uloga</th>
      <th scope="col">Dozvola</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    


    $query = "SELECT uloga_dozvola.id, uloga.naziv, dozvola.opis 
                FROM uloga_dozvola 
           LEFT JOIN uloga 
                  ON uloga_dozvola.uloga_id = uloga.id
           LEFT JOIN dozvola 
                  ON uloga_dozvola.dozvola_id = dozvola.id";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv"] 
                ."</td><td>". $row["opis"] 
                .'</td><td><a href="includes/delete.inc.php?deleteDodijela='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
<br /><br />
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaUloga">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Uloga</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT * FROM uloga;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv"] 
                .'</td><td><a href="edituloga.php?editUloga='.$row["id"].'"><button class="btn btn-warning">Uredi</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteUloga='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
<br /><br />
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaDozvola">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Opis Dozvole</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT * FROM dozvola;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["opis"] 
                .'</td><td><a href="editdozvola.php?editDozvola='.$row["id"].'"><button class="btn btn-warning">Uredi</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteDozvola='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
</div>


<!-- Modal za kreiranje dodijele dozvola ulogama -->

<div class="modal modal-fade" id="novaDodijela" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novi opis Dozvole</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
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
                        <label>Odaberite opis dozvole:</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="dozvola_id">
                        <option></option>
                        <?php 
        
                            $sql = "SELECT * FROM dozvola;";
                            $result = mysqli_query($conn, $sql);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row["id"].'">'.$row["opis"].'</option>';
                                }
                            }
                            else {
                                echo "<option>Nema rezultata..</option>";
                            }

                        ?>  
                        </select>
                    </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitDodjela">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>




<!-- Modal za kreiranje nove uloge -->

<div class="modal modal-fade" id="novaUloga" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova uloga</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="naziv" placeholder="Naziv uloge.." required>
                    </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitUloga">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



<!-- Modal za kreiranje novog opisa dozvole -->

<div class="modal modal-fade" id="novaDozvola" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novi opis Dozvole</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="opis" placeholder="Opis.." required></textarea>
                    </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitDozvola">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



 <?php

include_once 'includes/footer.inc.php';

?>  