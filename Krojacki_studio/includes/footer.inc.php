<footer class="footer py-4">
    <div class="container">
        <div class="footer-text">
            <div class="row align-items-center">    
                <div class="col-lg-4 text-lg-start text-light">Copyright &copy; Bonić & Jurišić 2021</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-light btn-social mx-3" href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-light btn-social mx-3" href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
                    <a class="btn btn-light btn-social mx-3" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
               <?php if(isset($_SESSION["id"])){
                    $id = $_SESSION["id"];
                    echo '<a class="link-light text-decoration-none me-3"  href="admin/includes/checkadmin.inc.php?admin='.$id.'">Admin</a>';
                } 

                
                ?>
                    <a name="file" class="link-light text-decoration-none" href="download.php?file=vizija.pdf">Vizija</a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
</body>
</html>