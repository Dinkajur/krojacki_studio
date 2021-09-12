<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editDozvola'];

    $sql = "SELECT * FROM dozvola WHERE id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $opis = $row['opis'];


?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
    <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Opis dozvole:</label>
        </div>
        <div class="mb-3">
            <textarea type="text" class="form-control" name="opis" ><?php echo $opis; ?></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editD">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?> 