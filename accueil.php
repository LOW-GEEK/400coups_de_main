<?php  require_once 'inc/log_bdd.php'; ?>
<?php require_once 'inc/fonction.php'; ?>

<!DOCTYPE html>
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
    <?php require_once 'inc/navbar.php'; ?>

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

    <section class="py-5">
      <h1 class="text-center">Ensemble, main dans la main, l'entraide devient une richesse qui bâtira un monde nouveau, solide et riche.</h1>
      <div class="container px-4 px-lg-5 mt-5">
        <h2>Les annonces les plus récentes :</h2>
        <div class="row gx-4 gx-lg-5 row-cols- row-cols-md-3 row-cols-xl-4 justify-content-center">
          <?php
            $annonce = $pdoLOG->query ( "SELECT * FROM annonces, membres WHERE annonces.id_membre = membres.id_membre ORDER BY id_annonce DESC LIMIT 8 ");

            while($reserve = $annonce->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class=\"col mb-5\">";
            echo "<div class=\"card shadow-sm border border-info\"> ";
            echo "<img src=\"$reserve[photo]\" height=\"200\" alt=\"photo d'annonce\">";
            echo "<div class=\"card-body\">";
            echo "<p class=\"card-title\"> ".$reserve['titre']. "</p>";
            echo "<p class=\"card-text\"> " .$reserve['type_de_cdm']. "</p>";
            echo "<p class=\"card-text\">Categorie : ".$reserve['categorie']. "</p>";
            echo "<p class=\"card-text\">Mise en ligne par :  ".$reserve['pseudo']. "</p>";
            echo "<div class=\"d-flex justify-content-between align-items-center\">";
            echo "<div class=\"btn-group\">";
            echo "<a href=\"fiche_annonce.php?id_annonce=$reserve[id_annonce]\"  class=\"btn btn-info\">Détails</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            }
          ?>
        </div>
      </div>
    </section>
    <?php require_once 'inc/footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/script.js"></script>
  </body>
</html>