<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editWeb'];

    $sql = "SELECT * FROM web_stranica WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $naziv_stranice = $row['naziv_stranice'];
    $sekcija = $row['sekcija'];
    $naslov = $row['naslov'];
    $ikona = $row['ikona'];
    $opis = $row['opis'];


?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
    <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Naziv stranice:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $naziv_stranice; ?>" name="naziv_stranice" required>
        </div>
        <div class="mb-3">
            <label>Naziv sekcije:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $sekcija; ?>" name="sekcija" required>
        </div>
        <div class="mb-3">
            <label>Naslov:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $naslov; ?>" name="naslov" required>
        </div>
        <div class="mb-3">
            <label>Oznaka ikone:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $ikona; ?>" name="ikona">
        </div>
        <div class="mb-3">
            <label>Opis:</label>
        </div>
        <div class="mb-3">
            <input rows="3" class="form-control" value="<?php echo $opis; ?>" name="opis" required>
        </div> 
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editW">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?>  