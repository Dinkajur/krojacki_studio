<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';
?>



<div class="korisnik">
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novaPoslovnica">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv poslovnice</th>
      <th scope="col">Mjesto</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT poslovnica.id, poslovnica.naziv, mjesto.naziv as misto
              FROM poslovnica 
              LEFT JOIN mjesto 
                ON poslovnica.mjesto_id = mjesto.id";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv"] 
                ."</td><td>". $row["misto"]
                .'</td><td><a href="editposlovnica.php?editPoslovnica='.$row["id"].'"><button class="btn btn-warning">Uredi</button></a>&nbsp
                           <a href="includes/delete.inc.php?deletePoslovnica='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
</div>

<!-- Modal za kreiranje novog mjesta -->

<div class="modal modal-fade" id="novaPoslovnica" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nova poslovnica</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="naziv" placeholder="Naziv poslovnice.." required>
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

            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitPoslovnica">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



 <?php

include_once 'includes/footer.inc.php';

?>  