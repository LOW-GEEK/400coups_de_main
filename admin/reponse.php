<?php 
// 1 FONCTIONS
require_once '../inc/log_bdd.php';
require_once '../inc/fonction.php';  

// 3 tri des données du tableau              
// a initialisation de la variable pour le select du tri des données

// b des conditions multiple à partir de $_GET

// c 
              $requete = $pdoLOG->query( " SELECT * FROM contact " );
              // debug($resultat);
              $contact = $requete->rowCount();
              // debug($nbr_commentaires);
            ?>
            <?php echo $contenu;

// 5 INITIALISATION DE LA VARIABLE $contenu
$contenu = "";

?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Demande de Contact</title>
        <!-- Favicon-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;600&display=swap" rel="stylesheet">  
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
  <body> 
  <main>
    <header class="container-fluid">
    <?php require_once '../inc/navbar_admin.php'; ?>
    </header> 
    <!-- fin container-fluid header  -->
      <div class="container bg-white mt-2 mb-2 m-auto p-2">
  
        <section class="row">
  
          <div class="col-md-12">
            <h2>Les demandes de contact</h2>
            <h5>Il y a <?php echo $contact; ?> demande de contact </h5>

            <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>

            <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Objet : <?php echo $ligne['objet']; ?></h5>
                <p class="card-text">Nom : <?php echo $ligne['nom']; ?></p>
                <p class="card-text">Prénom : <?php echo $ligne['prenom']; ?></p>
                <p class="card-text">Message : <?php echo $ligne['message']; ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Mail : <?php echo $ligne['mail']; ?></li>
            <div class="card-body">
                <a href="#" class="card-link">Répondre</a>
         
            </div>
            <?php } ?>
            </div>
          </div>
          <!-- fin col -->
  
          
          </section>
        <!-- fin row -->  

      </div>
      <!-- fin container  -->
    </main>
      <?php require_once '../inc/footer.php';// FOOTER ?>
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>