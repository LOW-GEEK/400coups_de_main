<?php 
// 1 FONCTIONS
require_once '../inc/log_bdd.php';
require_once '../inc/fonction.php';  

// 3 tri des données du tableau              
// a initialisation de la variable pour le select du tri des données

// b des conditions multiple à partir de $_GET

// c 
              $requete = $pdoLOG->query( " SELECT * FROM annonces, membres WHERE annonces.id_membre = membres.id_membre " );
              // debug($resultat);
              $moderation_annonce = $requete->rowCount();
              // debug($nbr_commentaires);
            ?>
            <?php echo $contenu;

// 5 INITIALISATION DE LA VARIABLE $contenu
$contenu = "";

// 6 SUPPRESSION D'UNE ANNONCE
// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_annonce'])) {
  $resultat = $pdoLOG->prepare( " DELETE FROM annonces WHERE id_annonce = :id_annonce " );

  $resultat->execute(array(
    ':id_annonce' => $_GET['id_annonce']
  ));

  if ($resultat->rowCount() == 0) {
    $contenu .= '<div class="alert alert-danger"> Erreur de suppression</div>';
  } else {
    $contenu .= '<div class="alert alert-success"> Membre supprimé</div>';
  }
}

?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gestion des annonces</title>
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
  
          <div class="col-sm-12 col-md-6 col-lg-4">
            <h2>Les annonces</h2>
          
            <h5>Il y a <?php echo $moderation_annonce; ?> Annonces </h5>
            <table class="table table-striped">
             <thead>
               <tr>
                 <th>Id annonce</th>
                 <th>Id membre</th>
                 <th>Type d'annonce</th>
                 <th>Type de cdm</th>
                 <th>Titre</th>
                 <th>Description</th>
                 <th>adresse</th>
                 <th>Code Postal</th>
                 <th>Ville</th>
                 <th>Catégorie</th>
                 <th>Photo</th>
               </tr>
             </thead>
             <tbody>

            <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
            <tr>
            <td><?php echo $ligne['id_annonce']; ?></td>                   
            <td><?php echo $ligne['id_membre']; ?></td>
				   <td><?php echo $ligne['type_annonce']; ?></td>
				   <td><?php echo $ligne['type_de_cdm']; ?></td>
				   <td><?php echo $ligne['titre']; ?></td>
				   <td><?php echo $ligne['description']; ?></td>
				   <td><?php echo $ligne['code_postal']; ?></td>
				   <td><?php echo $ligne['ville']; ?></td>
           <td><?php echo $ligne['adresse']; ?></td>
           <td><?php echo $ligne['categorie']; ?></td>
            <td><a href="?action=supprimer&id_annonce=<?php echo $ligne['id_annonce']; ?>" onclick="return(confirm('Voulez-vous supprimer cette annonce ? '))">suppression</a></td>
			   </tr>
                
            </div>
            <?php } ?>
            </table>
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