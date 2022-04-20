<?php 
require_once 'inc/log_bdd.php';
require_once 'inc/fonction.php';
// debug($_SESSION);
if ( !empty($_POST) ) {
//   debug($_POST);

  if ( !isset($_POST['civilite']) || $_POST['civilite'] != 'Mr' && $_POST['civilite'] != 'Mme' ) { // && ET
      $contenu .='<div class="alert alert-danger">La civilité n\'est pas valable !</div>';
  }
  if ( !isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
      // !isset n'est pas isset, .= concaténation puis affectation, || ou, strlen string length longueur chainbe de caractère
      $contenu .='<div class="alert alert-danger">Votre prénom doit faire entre 2 et 20 caractères</div>';
  }
  if ( !isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
      $contenu .='<div class="alert alert-danger">Votre nom de famille doit faire entre 2 et 20 caractères</div>';
  }

  if ( !isset($_POST['mail']) || strlen($_POST['mail']) > 50 || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
      // filter_var filtre une variable, et dans ce filtre on passe la constante prédéfinie (EN MAJUSCULE) qui vérifie que c'est bien au format email
      $contenu .='<div class="alert alert-danger">Votre email n\'est pas conforme !</div>';
  }

  if ( !isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) {
      $contenu .='<div class="alert alert-danger">Votre pseudo doit faire entre 4 et 20 caractères</div>';
  }
  if(isset($_POST['mdp']) && isset($_POST['confmdp'])) {
    if(empty($_POST['mdp'])) {
        $contenu='<div class="alert alert-danger">Le premier champ de mot de passe il est vide</div>';
    }

    if(sha1($_POST['mdp']) !== sha1($_POST['confmdp'])) {
       $contenu= '<div class="alert alert-danger">Les mots de passes ne sont pas identique !</div>';
    }
}

//   if ( !isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
//       $contenu .='<div class="alert alert-danger">Votre mot de passe doit faire entre 4 et 20 caractères</div>';
//   }
  if ( !isset($_POST['adresse']) || strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50) {
      $contenu .='<div class="alert alert-danger">Votre adresse doit faire entre 4 et 50 caractères</div>';
  }
  if ( !isset($_POST['code_postal']) || !preg_match('#^[0-9]{5}$#', $_POST['code_postal']) ) {
      // preg_match vérifie si la chaîne de caractère a le format autorisé
      $contenu .='<div class="alert alert-danger">Le code postal n\'est pas valable !</div>';
  }
  if ( !isset($_POST['ville']) || strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 50) {
      $contenu .='<div class="alert alert-danger">Votre ville doit faire entre 1 et 50 caractères</div>';
  }

  if (empty($contenu)) {// si la variable est vide c'est qu'il n'y a aucune erreur dans $_POST
      $membre = executeRequete( " SELECT * FROM membres WHERE pseudo = :pseudo ", 
                                      array(':pseudo' => $_POST['pseudo']));

      if ($membre->rowCount() > 0) {
          $contenu .='<div class="alert alert-danger">Le pseudo est indisponible veuillez en choisir un autre !</div>';
      } else {
        
 
            
         

          $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);//bcrypt

          $succes = executeRequete( " INSERT INTO membres (prenom, nom, civilite, pseudo, mail, adresse, code_postal, ville, mobile, mdp) VALUES (:prenom, :nom, :civilite, :pseudo, :mail, :adresse, :code_postal, :ville, :mobile, :mdp) ",
          array(
              ':prenom' => $_POST['prenom'],
              ':nom' => $_POST['nom'],
              ':civilite' => $_POST['civilite'],
              ':pseudo' => $_POST['pseudo'],
              ':mail' => $_POST['mail'],
              ':adresse' => $_POST['adresse'],
              ':code_postal' => $_POST['code_postal'],
              ':ville' => $_POST['ville'],
              ':mobile' => $_POST['mobile'],
              ':mdp' => $mdp,
          ));
          if ($succes) {
            $contenu .='<div class="alert alert-success">Vous êtes bien inscrit à 400cdm ! <br>   <a href="connexion.php">Cliquez ici pour vous connecter</a></div>  ';
        } else {
            $contenu .='<div class="alert alert-danger">Erreur lors de l\'inscription !</div>';
          }
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
        <!-- navbar -->
        <?php require_once 'inc/navbar.php'; ?>
        <!-- Container -->
        <div class="container mb-4">

            <section class="row ">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mx-auto border border-info p-2 m-5">
                    <?php   echo $contenu;  ?> 
                    <form action="" method="POST" id="formInscription" class="row g-3">
                        <div class="mb-3">
                            <label for="civilite" class="form-label">Civilité </label><br>
                            <input type="radio" name="civilite" value="Mr" id="civilite" required> Mr 
                            <input type="radio" name="civilite" value="Mme" id="civilite" required> Mme
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom*</label>
                            <input type="text"  name="prenom" id="prenom" class="form-control" placeholder="Prénom" aria-label="prenom" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom*</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" aria-label="Nom" required>
                        </div>

                        <div class="col-12">
                            <label for="mail" class="form-label">Email*</label>
                            <input type="email" name="mail" id="mail" class="form-control" id="mail" placeholder="nom@email.com" required>
                        </div>

                        <div class="col-12">
                            <label for="pseudo" class="form-label">Choisissez un pseudo*</label>
                            <input type="pseudo" name="pseudo" id="pseudo" class="form-control" id="pseudo" placeholder="choisissez un pseudo" maxlength="10" size="13" required>
                        </div>

                        <div class="col-12">
                            <label for="mdp" class="form-label">Mot de passe *</label>
                            <input type="password" name="mdp" id="mdp" class="form-control" id="mdp"  required>
                            <button class="btn btn-danger" id="voir">Voir Mot de passe</button>
                        </div>

                        <div class="col-12">
                            <label for="confmdp" class="form-label">Confirmez votre mot de passe *</label>
                            <input type="password" id="confmdp" name="confmdp" class="form-control"  required>
                        </div>

                        <div class="col-12">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control" id="adresse" placeholder="votre adresse" required>
                        </div>

                        <div class="col-md-6">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" name="code_postal" id="code_postal" class="form-control" id="code_postal" placeholder="code postal"
                            maxlength="5" size="10" required>
                        </div>
                    
                        <div class="col-md-6">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" name="ville" id="ville" class="form-control" id="ville" placeholder="Ville" required>
                        </div>

                        <div class="col-4">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="tel" name="mobile" id="mobile" class="form-control" id="mobile" placeholder="00.00.00.00.00" required>
                        </div>

                        <div class="col-12">
                            <button type="submit" id="" class="btn btn-info">S'inscrire</button>
                            <button type="reset" id="" class="btn btn-danger">Effacer</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- fin div container -->
        <!-- Footer -->
        <?php require_once 'inc/footer.php' ?>
        <!-- Optional JavaScript -->
        <script src="js/inscription.js"></script>
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>