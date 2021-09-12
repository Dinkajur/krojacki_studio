<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';
?>



<div class="korisnik">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Ime</th>
      <th scope="col">Email</th>
      <th scope="col">Broj</th>
      <th scope="col">Upit</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT * FROM upiti;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["ime"] 
                ."</td><td>". $row["email"] 
                ."</td><td>". $row["broj"]
                ."</td><td>". $row["upit"]
                .'</td><td><a href="#"><button class="btn btn-primary">Odgovori</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteUpit='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
        }
        echo "</tbody></table>";
        echo '<a href="includes/delete.inc.php?izbrisiSveUpite"><button class="btn btn-danger">Izbriši sve</button></a>';
    }
    else {
        echo "</tbody></table>";
        echo "Nema rezultata..";
    }

    ?>
</div>


 <?php

 

include_once 'includes/footer.inc.php';

?>  