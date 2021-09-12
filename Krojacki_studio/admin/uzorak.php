<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';
?>

<div class="korisnik">
<button type="button" id="btnNovi" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#noviUzorak">Novi</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv uzorka</th>
      <th scope="col">Slika uzorka</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT * FROM uzorak;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv"] 
                .'</td><td><img width="25px" height="25px" src="uploads/uzorak/'. $row['slika'] .'">'
                .'</td><td><button class="btn btn-danger"><a href="includes/delete.inc.php?deleteUzorak='.$row["id"].'">Izbriši</a></button></td></tr>' ;
        }
        echo "</tbody></table>";
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
</div>

<!-- Modal za dodavanje uzorka -->

<div class="modal modal-fade" id="noviUzorak" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novi uzorak</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/create.inc.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="naziv" placeholder="Naziv uzorka.." required>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="slika" required>
                    </div>
            </div> 
            <div class="modal-footer">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submitUzorak">Dodaj</button> 
                </div> 
            </div> 
                </form>
        </div>
    </div>
</div>



 <?php

include_once 'includes/footer.inc.php';

?>  