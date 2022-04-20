<?php  require_once 'inc/log_bdd.php'; ?>
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
        
        <section class="py-5">
            <div class="container ">
                <?php require_once 'inc/menu_annonces.php' ;?>
                <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <?php

                     $annonce = $pdoLOG->query ( "SELECT * FROM annonces WHERE type_de_cdm = 'Offre' AND categorie= 'Mécanique'; ");
                    // $annonce = $pdoLOG->query ( "SELECT * FROM annonces WHERE type_de_cdm = 'Offre' AND categorie= 'Mobilité/Véhicule'; ");
                    // $annonce = $pdoLOG->query ( " SELECT * FROM annonces, membres WHERE annonces.id_membre = membres.id_membre; ");
                    
                            
                    while($reserve = $annonce->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class=\"col mb-3\">";
                    echo "<div class=\"card shadow-sm border border-primary\">";
                    echo "<img src=\"$reserve[photo]\" weight=\"200\"  height=\"200\" alt=\"photo d'annonce\">";
                    echo "<div class=\"card-body\">";
                    echo "<p class=\"card-title\"> ".$reserve['titre']. "</p>";
                    echo "<p class=\"card-text\">  " .$reserve['type_de_cdm']. "</p>";
                    echo "<p class=\"card-text\">Publiée par : " .$reserve['pseudo']. "</p>";
                    echo "<p class=\"card-text\">Categorie : ".$reserve['categorie']. "</p>";
                    echo "<div class=\"d-flex justify-content-between align-items-center\">";
                    echo "<div class=\"btn-group\">";
                    echo "<a href=\"fiche_annonce.php?id_annonce=$reserve[id_annonce]\" class=\"btn btn-info\">Détails</a>";
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
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>


        <?php require_once 'inc/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/script.js"></script>
    </body>
</html>