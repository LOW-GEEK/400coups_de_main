<?php 
require_once 'inc/fonction.php';  // appel du fichier de fonction 
require_once 'inc/log_bdd.php';
?>
<!doctype html>
<html lang="fr">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>400 Coups de Main</title>
      <script src="https://kit.fontawesome.com/5ba36090d7.js" crossorigin="anonymous"></script>
      <!-- Favicon-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">  
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="css/bootstrap.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <header>
        <?php require_once 'inc/navbar.php'; ?> 
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="img/carrousel1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carrousel3.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="img/carrousel2.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Arrière</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
                    <div class="row justify-content-center">
                    <div class="col-md-6 m-5 ">
                        <h1>400 Coups de Main</h1>
                        <p>400 coups de main  est un site internet proposant la mise en ligne d'annonces solidaires. 
                            Le but est de favoriser la cohésion sociale, l'entraide par le biais d' échanges de services, de dons et de prêts. <br>
                            Nous espérons ainsi contribuer à diminuer le gaspillage en prolongeant la durée de vie des biens de consommation tout en réduisant la fracture numérique.
                        </p>
                    </div>
                 </div>
            </div>
        </section>
        <!-- footer en require  -->
        <footer class="py-4">
        <?php require_once 'inc/footer.php'; ?>
        </footer>
        
        
        <!-- fin container  -->
        
        <!-- Optional JavaScript; choose one of the two! -->
        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>