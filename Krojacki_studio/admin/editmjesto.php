<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editMjesto'];

    $sql = "SELECT * FROM mjesto WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $naziv = $row['naziv'];
    $ulica = $row['ulica'];
    $post_broj = $row['post_broj'];


?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
        
        <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Naziv mjesta:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $naziv; ?>" name="naziv" required>
        </div>
        <div class="mb-3">
            <label>Ulica:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $ulica; ?>" name="ulica" required>
        </div>
        <div class="mb-3">
            <label>Poštanski broj:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $post_broj; ?>" name="post_broj" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editMj">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?>  