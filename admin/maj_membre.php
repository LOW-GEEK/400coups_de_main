<?php 
// 1 FONCTIONS
require_once '../inc/log_bdd.php';
require_once '../inc/fonction.php';  


// 3 RÉCEPTION DES INFORMATIONS D'UN EMPLOYÉ AVEC $_GET
// debug($_GET);
if ( isset($_GET['id_membre']) ) {// on demande le détail d'un employé
      // debug($_GET);
      $resultat = $pdoLOG->prepare( " SELECT * FROM membres WHERE id_membre = :id_membre " );
      $resultat->execute(array(
        ':id_membre' => $_GET['id_membre']// on associe le marqueur vide à l'id_employes
      ));
      // debug($resultat->rowCount());
		if ($resultat->rowCount() == 0) { // si le rowCount est égal à 0 c'est qu'il n'y a pas d'employé
			header('location:gestion_membres.php');// redirection vers la page de départ
			exit();// arrêtedu script
		}  
		$fiche = $resultat->fetch(PDO::FETCH_ASSOC);//je passe les infos dans une variable
		// debug($fiche);// ferme if isset accolade suivante
		} else {
		header('location:maj_membre.php');// si j'arrive sur la page sans rien dans l'url
		exit();// arrête du script
	}

//4 TRAITEMENT DE MISE À JOUR D'UN EMPLOYÉ
if ( !empty($_POST) ) {//not empty
    // debug($_POST);
  $_POST['prenom'] = htmlspecialchars($_POST['prenom']);// pour se prémunir des failles et des injections SQL
	$_POST['nom'] = htmlspecialchars($_POST['nom']);
	$_POST['civilite'] = htmlspecialchars($_POST['civilite']);
	$_POST['mail'] = htmlspecialchars($_POST['mail']);
	$_POST['adresse'] = htmlspecialchars($_POST['adresse']);
	$_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);
	$_POST['mobile'] = htmlspecialchars($_POST['mobile']);
	$_POST['statut'] = htmlspecialchars($_POST['statut']);

	$resultat = $pdoLOG->prepare( " UPDATE membres SET prenom = :prenom, nom = :nom, civilite = :civilite, mail = :mail, adresse = :adresse, code_postal = :code_postal, ville = :ville, mobile = :mobile, statut = :statut WHERE id_membre = :id_membre " );// requete préparée avec des marqueurs

	$resultat->execute( array(
		':prenom' => $_POST['prenom'],
		':nom' => $_POST['nom'],
		':civilite' => $_POST['civilite'],
		':mail' => $_POST['mail'],
		':adresse' => $_POST['adresse'],
		':code_postal' => $_POST['code_postal'],
        ':ville' => $_POST['ville'],
		':mobile' => $_POST['mobile'],
		':statut' => $_POST['statut'],
		':id_membre' => $_GET['id_membre'],

	));
	header('location:gestion_membres.php');
	exit();
}

?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mise à Jour d'un membre</title>
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
  
          <div class="col-md-6">
			  <!-- faire une card bootstrap avec toues les infos d'un employé -->
            <?php 
			echo '<p class="bg-cyan">' .$fiche['nom']. ' ' .$fiche['prenom']. ', ' .$fiche['civilite']. '. Pseudo : ' .$fiche['pseudo']. '. Mail : ' .$fiche['mail']. '. Adresse : ' .$fiche['adresse']. '. Code Postal : ' .$fiche['code_postal']. '. Ville : ' .$fiche['ville']. '. Mobile : ' .$fiche['mobile']. '. Statut : ' .$fiche['statut']. '</p>';
			?>

          </div>
          <!-- fin col -->
  
          <div class="col-md-6">
            <h2>Mise à jour du membre</h2>
			<form action="" method="POST">

			<div class="mb-3">
				<label for="prenom" class="form-label">Prénom</label>
				<input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $fiche['prenom']; ?>">
			</div>

			<div class="mb-3">
				<label for="nom" class="form-label">Nom</label>
				<input type="text" name="nom" id="nom" class="form-control" value="<?php echo $fiche['nom']; ?>">
			</div>

			<div class="mb-3">
            <!-- https://getbootstrap.com/docs/5.1/forms/checks-radios/ -->
                <label for="sexe" class="form-label">Sexe </label><br>
                <input type="radio" name="civilite" value="Mr" id="sexe" checked> Homme <br>
                <input type="radio" name="civilite" value="Mme" <?php if (isset($fiche['civilite']) && $fiche['civilite'] =='f') echo ' checked';//le 1er bouton sera checked et le second le sera SI on f depuis $fiche ?> id="civilité"> Femme
            </div>

			<div class="mb-3">
				<label for="mail" class="form-label">Mail</label>
				<input type="email" name="mail" id="mail" class="form-control" value="<?php echo $fiche['mail']; ?>">
			</div>

			<div class="mb-3">
				<label for="adresse" class="form-label">Adresse</label>
				<input type="text" name="adresse" id="adresse" class="form-control" value="<?php echo $fiche['adresse']; ?>">
			</div>

            <div class="mb-3">
				<label for="code_postal" class="form-label">Code Postal</label>
				<input type="int" name="code_postal" id="code_postal" class="form-control" value="<?php echo $fiche['code_postal']; ?>">
			</div>

            <div class="mb-3">
				<label for="ville" class="form-label">Ville</label>
				<input type="int" name="ville" id="ville" class="form-control" value="<?php echo $fiche['ville']; ?>">
			</div>

            <div class="mb-3">
				<label for="mobile" class="form-label">Mobile</label>
				<input type="int" name="mobile" id="mobile" class="form-control" value="<?php echo $fiche['mobile']; ?>">
			</div>

            <div class="mb-3">
				<label for="statut" class="form-label">Statut</label>
				<input type="int" name="statut" id="statut" class="form-control" value="<?php echo $fiche['statut']; ?>">
			</div>

			<button type="submit" class="btn btn-primary">Mise à jour</button>
			</form>

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