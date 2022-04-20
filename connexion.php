<?php  
require_once 'inc/log_bdd.php'; 
require_once 'inc/fonction.php';
// debug($_GET);
$message = '';
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si il existe action qui contient 'deconnexion' dans l'url
    unset($_SESSION['membre']); // on supprime le membre de la session (le contenu du tableau indice membre)
    $message = '<div class="alert alert-success">Vous êtes Déconnecté</div>';// message de déconnexion cf echo plus bas
    // debug($_SESSION);
}
// redirection vers la page profil
 if (estConnecte()) {
  header('location:profil.php');
  exit();
}
// traitement du formulaire de connexion
  // debug($_POST);

if(!empty($_POST)) {
    if (empty($_POST['pseudo'])) { //si c'est vide - 0 ou null c'est FALSE
        $contenu .='<div class="alert alert-danger">Le pseudo est requis !</div>';
    }
    if (empty($_POST['mdp'])) {
        $contenu .='<div class="alert alert-danger">Le mot de passe est manquant !</div>';
    }
    if (empty($contenu)) {
        $resultat = executeRequete("SELECT * FROM membres WHERE pseudo =:pseudo ",
        array (
            ':pseudo' => $_POST['pseudo'],
            // ':mdp' => $_POST['mdp'],
        ));
    
        if ($resultat->rowCount() == 1) {
            $membre = $resultat->fetch(PDO ::FETCH_ASSOC);
            // debug($membre);


            if (password_verify($_POST['mdp'], $membre['mdp'])) {
                // echo 'coucou';
                $_SESSION['membre'] = $membre;

                // debug($_SESSION);
                header('location:profil.php');//VOIR
                exit();
            }else {
              $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
            }
        }else {
          $contenu .='<div class="alert alert-danger">Erreur sur les identifiants !</div>';
        }
    }
}
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
    <div class="container mb-4 bg-white">
      <section class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 mx-auto">
          <form action="" method="POST"> 
            <?php
            echo $message;
            echo $contenu;
            ?>
            <div class="mb-3">
              <label for="pseudo"  class="form-label" >Pseudo</label>
              <input type="text" class="form-control" name="pseudo" id="pseudo">
              </div>
            <div class="mb-3">
              <label for="mdp" class="form-label">Mot de passe</label>
              <input type="password" name="mdp" class="form-control" id="mdp">
            </div>
            <button type="submit" class="btn btn-secondary">Se connecter</button>

          </form>
          <div class="alert alert-success">Pas encore membre ? 
            <br>   <a href="inscription.php">Cliquez ici pour vous inscrire!</a></div> 
          </div>
      </section>
    </div>
    <!-- fin div container -->
    <?php require_once 'inc/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>