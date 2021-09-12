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
      <th scope="col">ID</th>
      <th scope="col">Naziv stranice</th>
      <th scope="col">Sekcija</th>
      <th scope="col">Naslov</th>
      <th scope="col">Ikona</th>
      <th scope="col">Opis</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $sql = "SELECT *
              FROM web_stranica";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["id"] 
                ."</td><td>". $row["naziv_stranice"] 
                ."</td><td>". $row["sekcija"]
                ."</td><td>". $row["naslov"]
                ."</td><td>". $row["ikona"]
                ."</td><td>". $row["opis"]
                .'</td><td><button class="btn btn-warning text-dark"><a href="editweb.php?editWeb='.$row["id"].'">Uredi</a></button></td></tr>';
        }
        echo "</tbody></table>";
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