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
      <th scope="col">Prezime</th>
      <th scope="col">Email</th>
      <th scope="col">Kontakt broj</th>
      <th scope="col">Veličina</th>
      <th scope="col">Materijal</th>
      <th scope="col">Boja</th>
      <th scope="col">Uzorak</th>
      <th scope="col">Količina</th>
      <th scope="col">Cijena</th>
      <th scope="col">Ukupno</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php 

    
    $sql = "SELECT narudzba.id as id 
                  ,korisnik.ime
                  ,korisnik.prezime
                  ,korisnik.email
                  ,korisnik.broj_mob
                  ,boja.slika as boja
                  ,uzorak.slika as uzorak
                  ,velicina.oznaka as oznaka
                  ,velicina.cijena as cijena
                  ,materijal.naziv as materijal
                  ,kolicina 
                  ,ukupno
              FROM narudzba  
              LEFT JOIN korisnik 
                ON narudzba.korisnik_id = korisnik.id
              LEFT JOIN boja 
                ON narudzba.boja_id = boja.id
              LEFT JOIN uzorak
                ON narudzba.uzorak_id = uzorak.id
              LEFT JOIN velicina
                ON narudzba.velicina_id = velicina.id
              LEFT JOIN materijal
                ON narudzba.materijal_id = materijal.id;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row["ime"] 
                ."</td><td>". $row["prezime"] 
                ."</td><td>". $row["email"] 
                ."</td><td>". $row["broj_mob"] 
                ."</td><td>". $row["oznaka"] 
                ."</td><td>". $row["materijal"] 
                .'</td><td> <img width="25px" height="25px" src="uploads/boja/'. $row['boja'] .'">'
                .'</td><td> <img width="25px" height="25px" src="uploads/uzorak/'. $row['uzorak'] .'">'
                ."</td><td>". $row["kolicina"]
                ."</td><td>". $row["cijena"]
                ."</td><td>". $row["ukupno"]
                .'</td><td><a href="#"><button class="btn btn-primary">Omogući</button></a>&nbsp
                           <a href="includes/delete.inc.php?deleteNarudzba='.$row["id"].'"><button class="btn btn-danger">Izbriši</button></a></td></tr>' ;
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