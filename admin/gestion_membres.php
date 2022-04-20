<?php 
// 1 FONCTIONS
require_once '../inc/log_bdd.php';
require_once '../inc/fonction.php';  

// 3 tri des données du tableau              
// a initialisation de la variable pour le select du tri des données

$order = '';
// b des conditions multiple à partir de $_GET

// c 
              $requete = $pdoLOG->query( " SELECT * FROM membres $order " );
              // debug($resultat);
              $nbr_membre = $requete->rowCount();
              // debug($nbr_commentaires);
            ?>
            <?php echo $contenu;

// 5 INITIALISATION DE LA VARIABLE $contenu
$contenu = "";

// 6 SUPPRESSION D'UN MEMBRE
// debug($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id_membre'])) {
  $resultat = $pdoLOG->prepare( " DELETE FROM membres WHERE id_membre = :id_membre " );

  $resultat->execute(array(
    ':id_membre' => $_GET['id_membre']
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
        <title>Gestion des membres</title>
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
            <h2>Les Membres</h2>
            <h5>Il y a <?php echo $nbr_membre; ?> membres </h5>

            <table class="table table-striped">
             <thead>
               <tr>
                 <th>Id</th>
                 <th>Prénom</th>
                 <th>Nom</th>
                 <th>Civilité</th>
                 <th>Pseudo</th>
                 <th>Mail</th>
                 <th>adresse</th>
                 <th>Code Postal</th>
                 <th>Ville</th>
                 <th>Mobile</th>
                 <th>Statut</th>
               </tr>
             </thead>
             <tbody>
				 <!-- ouverture de la boucle while -->
          <?php while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC )) { ?>
			   <tr>
				   <td><?php echo $ligne['id_membre']; ?></td>                   
				   <td><?php echo $ligne['prenom']; ?></td>
				   <td><?php echo $ligne['nom']; ?></td>
				   <td><?php echo $ligne['civilite']; ?></td>
				   <td><?php echo $ligne['pseudo']; ?></td>
				   <td><?php echo $ligne['mail']; ?></td>
            <td><?php echo $ligne['adresse']; ?></td>
				   <td><?php echo $ligne['code_postal']; ?></td>
				   <td><?php echo $ligne['ville']; ?></td>
            <td><?php echo $ligne['mobile']; ?></td>
				   <td><?php echo $ligne['statut']; ?></td>
          <td><a href="maj_membre.php?id_membre=<?php echo $ligne['id_membre']; ?>">maj</a></td>
          <td><a href="?action=supprimer&id_membre=<?php echo $ligne['id_membre']; ?>" onclick="return(confirm('Voulez-vous supprimer ce membre ? '))">suppression</a></td>
			   </tr>
			   <!-- fermeture de la boucle -->
			   <?php } ?>
             </tbody>
            </table>
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