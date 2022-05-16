<?php
require_once 'inc/log_bdd.php'; 

if (isset($_GET['id_annonce']) ) {// on demande le détail d'un annonce
    // debug($_GET);
    $resultat = $pdoLOG->prepare( " SELECT * FROM annonces WHERE id_annonce = :id_annonce " );
    $resultat->execute(array(
      ':id_annonce' => $_GET['id_annonce']// on associe le marqueur vide à l'id_employes
    ));
    // debug($resultat->rowCount());
      if ($resultat->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas d'annonce
          header('location:profil.php');// redirection vers la page de départ
          exit();// arrêtedu script
      }  
      $maj = $resultat->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable
      // debug($maj);// ferme if isset accolade suivante
      } else {
      header('location:maj_annonce.php');// si j'arrive sur la page sans rien dans l'url
      exit();// arrête du script
  }
    // MAJ d'une annonce
    if ( !empty($_POST) ) {
    // debug($_POST);
    $_POST['type_annonce'] = htmlspecialchars($_POST['type_annonce']);
    $_POST['type_de_cdm'] = htmlspecialchars($_POST['type_de_cdm']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['categorie'] = htmlspecialchars($_POST['categorie']);
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $_POST['date_pub'] = htmlspecialchars($_POST['date_pub']);
        // Traitement photo
    $photo = '';
     if(!empty($_FILES['photo']['name'])) {
        $photo = 'photos/' .$_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], '' .$photo);
        } // fin du traitement photo

	$resultat = $pdoLOG->prepare( " UPDATE annonces SET type_annonce = :type_annonce, type_de_cdm = :type_de_cdm, titre = :titre, description = :description, code_postal = :code_postal, adresse = :adresse, ville = :ville, categorie = :categorie,  photo = :photo, pseudo = :pseudo, date_pub = :date_pub WHERE id_annonce = :id_annonce " );// requete préparée avec des marqueurs

	$resultat->execute( array(
		':type_annonce' => $_POST['type_annonce'],
		':type_de_cdm' => $_POST['type_de_cdm'],
		':titre' => $_POST['titre'],
        ':description' => $_POST['description'],
		':code_postal' => $_POST['code_postal'],
		':adresse' => $_POST['adresse'],
        ':ville' => $_POST['ville'],
        ':categorie' => $_POST['categorie'],
        ':photo' => $photo,
        ':pseudo' => $_POST['pseudo'],
        ':date_pub' => $_POST['date_pub'],
		':id_annonce' => $_GET['id_annonce'],
	));

    if ($resultat) {
        $contenu .='<div class="alert alert-success">Vous avez mis à jour vos informations avec succès, reconnecter vous pour actualiser ! <br> <a href="connexion.php" class="btn btn-secondary">Retourner dans votre profil</a> ';
    } else {
        $contenu .='<div class="alert alert-danger">Erreur lors de la mise à jour !</div>';
    }
}
$date = date('d/m/Y, H:i');

?>
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
        <section class="container justify-content-center">
            <div class="row col-12 col-sm-12 col-md-6 col-lg-4 mx-auto bg-light border border-info ">
                <?php If(estConnecte()){ ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                       
                        <div class="row">
                            <label for="pseudo">Pseudo</label>
                            <div class="col">
                                <input readonly="readonly" type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['membre']['pseudo']; ?>" >
                            </div>
                            <label for="date_pub">Date de publication</label>
                            <div class="col">
                            <input readonly="readonly" type="text" name="date_pub" id="date_pub" value="<?php echo "  $date " ?>"  />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class=" col form-group mt-2"> 
                                <label for="type_de_cdm">Type de coup de main*</label>
                                <input type="radio" id="offre"  name="type_de_cdm" value="Offre"  required> Offre
                                <input type="radio" id="demande" name="type_de_cdm" value="Demande"  required> Demande            
                            </div>
                            <div class="col form-group mt-2">
                                <select id="type_annonce" name="type_annonce"  required >
                                    <option value="">---</option>
                                    <option value="Services">service</option>
                                     <option value="Prêts">prêt</option>
                                    <option value="Dons">don</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group mt-2">
                                <label for="titre">Titre *</label>
                                <input type="text" name="titre" id="titre" value="<?php echo $maj['titre']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col- form-group mt-2">
                            <select id="categorie" name="categorie"  required >
                                <option value="">Choisir une catégorie</option>
                                <option value="Coup de main">Coup de main</option>
                                <option value="Informatique">Informatique/Multimédia</option>
                                <option value="Bricolage">Bricolage</option>
                                <option value="Maison">Maison</option>
                                <option value="Sport">Sport</option>
                                <option value="Mécanique">Mécanique</option>
                                <option value="Mobilité">Mobilité/Véhicule</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                            
                        <div class="form-group mt-2">
                            <label for="description">Description *</label>
                            <textarea name="description" id="description" class="form-control"  required><?php echo $maj['description']; ?></textarea>
                        </div>
                        <div class="col-6 form-group mt-2">
                                <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
                        </div>
                        <div class="row">
                            <div class="col form-group mt-2">
                                <label for="code_postal">Code postal*</label>
                                <input type="text" name="code_postal" id="code_postal" value="<?php echo $maj['code_postal']; ?>" class="form-control"  required> 
                            </div>
                            <div class="col form-group mt-2">        
                                <label for="ville">Ville*</label>
                                <input type="text" name="ville" id="ville" value="<?php echo $maj['ville']; ?>" class="form-control"  required> 
                            </div>
                            
                        </div>
                        <div class="col form-group mt-2">        
                            <label for="adresse">Adresse*</label>
                            <input type="text" name="adresse" id="adresse" value="<?php echo $maj['adresse']; ?>" class="form-control"> 
                        </div>
                        <div class="form-group mt-2 text-center">
                            <input type="submit" value="Validez" class="btn btn-sm btn-success"> 
                        </div>
                    </form>
            </div>
                    <?php } else { ?>

                        <div class=«alert alert-danger»>Connectez-vous pour déposer une annonce ! </div>
                        <a class="btn btn-info" href="connexion.php">Connexion</a>

                    <?php } ?>
         </section>
        <!-- fin row -->
        <?php require_once 'inc/footer.php'; ?>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->

    </body>
</html>