<?php
    session_start();
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/sidenav.inc.php';

    require_once 'includes/dbh.inc.php';


    $id = $_GET['editPoslovnica'];

    $sql = "SELECT poslovnica.*, mjesto.naziv as misto
              FROM poslovnica
              LEFT JOIN mjesto ON poslovnica.mjesto_id = mjesto.id 
             WHERE poslovnica.id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd       = $row['id'];
    $naziv     = $row['naziv'];
    $mjesto_id = $row['mjesto_id'];
    $misto     = $row["misto"];

?>

<div class="korisnik">
    <form action="includes/edit.inc.php" method="post">
    <div class="mb-3">
            <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
        </div>
        <div class="mb-3">
            <label>Naziv poslovnice:</label>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" value="<?php echo $naziv; ?>" name="naziv" required>
        </div>
        <div class="mb-3">
        <select class="form-control" name="mjesto_id">
        <option value="<?php echo $mjesto_id; ?>"><?php echo $misto; ?></option>
        <?php 

            $sql = "SELECT * FROM mjesto;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<option value="'.$row["id"].'">'.$row["naziv"].'</option>';
                }
            }
            else {
                echo '<option value="0">Nema rezultata..</option>';
            }

        ?>  
        </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="editPosl">Spremi</button> 
        </div> 
    </form>
</div>

<?php

include_once 'includes/footer.inc.php';
   
?>  