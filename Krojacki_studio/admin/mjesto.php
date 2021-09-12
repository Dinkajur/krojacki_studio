<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';
?>



<div class="korisnik">
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoMjesto">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Mjesto</th>
      <th scope="col">Ulica</th>
      <th scope="col">Poštanski broj</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT * FROM mjesto;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv"] 
                ."</td><td>". $row["ulica"]
                ."</td><td>". $row["post_broj"]
                .'</td><td><a href="editmjesto.php?editMjesto='.$row["id"].'"><button class="btn btn-warning" >Uredi</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteMjesto='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
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

<div class="modal modal-fade" id="novoMjesto" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo mjesto</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="naziv" placeholder="Naziv mjesta.." required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="ulica" placeholder="Ulica.." required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="post_broj" placeholder="Poštanski broj.." required>
                    </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitMjesto">Kreiraj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



 <?php

include_once 'includes/footer.inc.php';

?>  