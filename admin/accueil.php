<?php
require_once '../inc/log_bdd.php';
require_once '../inc/fonction.php';




?>

<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>400 Coups de Main - Administration</title>
        <!-- Favicon-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">  
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/5ba36090d7.js" crossorigin="anonymous"></script>
    </head>
<body>
   <!-- =================================== -->
  <!-- en-tête -->
  <!-- =================================== -->

  <header>
    <?php require_once '../inc/navbar_admin.php'; ?>

  </header>

  <div class="b-example-divider"></div>

<div class="container px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom">Espace Administration</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"/></svg>
      </div>
      <div>
        <h2>Gestion des Annonces</h2>
        <a href="gestion_annonces.php" class="btn btn-info">
          Annonces
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"/></svg>
      </div>
      <div>
        <h2>Gestion des Membres</h2>
        
        <a href="gestion_membres.php" class="btn btn-info">
          Membres
        </a>
      </div>
    </div>
    <div class="col d-flex align-items-start">
      <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
        <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"/></svg>
      </div>
      <div>
        <h2>Demande de Contact</h2>
        <a href="reponse.php" class="btn btn-info">
          Répondre
        </a>
      </div>
    </div>
  </div>
</div>

  

  <?php 
require_once '../inc/footer.php';
  ?>
  <!-- Footer -->
  <!-- Optional JavaScript -->
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>