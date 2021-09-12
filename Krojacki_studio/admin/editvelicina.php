<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editVelicina'];

    $sql = "SELECT * FROM velicina WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $oznaka = $row['oznaka'];
    $cijena = $row['cijena'];


?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
    <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Naziv veličine:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $oznaka; ?>" name="oznaka" required>
        </div>
        <div class="mb-3">
            <label>Cijena:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $cijena; ?>" name="cijena" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editV">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?>  