<?php 
    session_start();
    include_once 'includes/security.inc.php';
    include_once 'includes/head.inc.php';
    include_once 'includes/nav.inc.php';
    include_once 'includes/dbh.inc.php';

    $id = $_GET['editLozinka'];

    $sql = "SELECT id
                  ,ime
                  ,prezime
                  ,lozinka
              FROM korisnik
             WHERE korisnik.id=$id;";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $idd = $row['id'];
    $ime = $row['ime'];
    $prezime = $row['prezime'];

?>


<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center" id="sidebar">
                    <div class="card-body">
                        <img src="admin/uploads/img/profile.jpg" class="rounded-circle" width="150">
                        <div>
                            <h3><?php echo $ime; ?> <?php echo $prezime; ?> </h3>
                            <a href="profil.php">Moj profil</a>
                            <a href="kosarica.php">Moja košarica</a>
                            <a href="urediprofil.php?editProfil=<?php echo $id; ?>">Uredi profil</a>
                            <a href="#">Promjena lozinke</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">Promjena Lozinke</h1>
                    <div class="card-body">
                        <form action="includes/edit.inc.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" value="<?php echo $idd; ?>" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label>Nova lozinka:</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control"  name="lozinka" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="editL">Spremi</button> 
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
</body>
</html>