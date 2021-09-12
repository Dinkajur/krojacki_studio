<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';
    require_once 'includes/dbh.inc.php';
?>


<div class="korisnik">
    <h1>Rezultati pretraživanja:</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">Korisničko ime</th>
      <th scope="col">Email</th>
      <th scope="col">Broj korisnika</th>
      <th scope="col">Mjesto</th>
      <th scope="col">Uloga</th>
      <th scope="col">Poslovnica</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if(isset($_POST['submit'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql    = "SELECT korisnik.id             as id
                             ,korisnik.ime            as ime
                             ,korisnik.prezime        as prezime
                             ,korisnik.korisnicko_ime as korisnicko_ime
                             ,korisnik.email          as email
                             ,korisnik.broj_mob       as broj_mob
                             ,mjesto.naziv            as misto
                             ,uloga.naziv             as rola 
                             ,poslovnica.naziv        as radnja 
                         FROM korisnik 
                         LEFT JOIN poslovnica 
                           ON korisnik.poslovnica_id = poslovnica.id
                         LEFT JOIN mjesto
                           ON korisnik.mjesto_id = mjesto.id
                         LEFT JOIN uloga
                           ON korisnik.uloga_id = uloga.id
                        WHERE ime            LIKE '%$search%' 
                           OR prezime        LIKE '%$search%' 
                           OR korisnicko_ime LIKE '%$search%' 
                           OR email          LIKE '%$search%' 
                           OR broj_mob       LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo '<div class="alert bg-light text-dark" >Pronađeno je '.$queryResult.' rezultata!</div>';

            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr><td>'. $row["id"] 
                        ."</td><td>". $row["ime"] 
                        ."</td><td>". $row["prezime"] 
                        ."</td><td>". $row["korisnicko_ime"] 
                        ."</td><td>". $row["email"] 
                        ."</td><td>". $row["broj_mob"] 
                        ."</td><td>". $row["misto"] 
                        ."</td><td>". $row["rola"] 
                        ."</td><td>". $row["radnja"]."</a></td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "</tbody></table>";
            }
        }
    ?>
</div>


 <?php

include_once 'includes/footer.inc.php';

?>  