<?php  
    require_once 'inc/log_bdd.php';

    if (!empty($_POST)) {
    // var_dump($_POST);
    $_POST['objet'] = htmlspecialchars($_POST['objet']);
    $_POST['mail'] = htmlspecialchars($_POST['mail']);
    $_POST['message'] = htmlspecialchars($_POST['message']);

    $insertion = $pdoLOG->prepare(" INSERT INTO contact (objet, mail, message) VALUES (:objet, :mail, :message) ");

    $insertion->execute(array(
    ':objet' => $_POST['objet'],
    ':mail' => $_POST['mail'],
    ':message' => $_POST['message'],
    ));

    if ($insertion) {
        $contenu .='<div class="alert alert-success">Votre Message a bien été envoyé, nous vous répondrons sous 48 heures</div>  ';
    } else {
        $contenu .='<div class="alert alert-danger">Erreur lors de l\'envoi du message !</div>';
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
      <title>400CDM-Contact</title>
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
        <!-- Navbar -->
        <?php require_once 'inc/navbar.php'; ?>
        <!-- Container -->
        <div class="container">
            <h2 class="text-center">Vous avez une question relative au fonctionnement de notre site ?</h2>
            <br>
            <h5>Voici une liste de questions-réponses susceptible de répondre à vos besoins</h5>
            <hr>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
                <h4>Comment déposer une annonce ?</h4>
                <p>Rendez-vous sur la page <a href="annonce.php">Déposer une annonce</a> pour demander un service, un prêt de matériel ou un don. Vous devez obligatoirement être inscrit sur notre site pour déposer une annonce.</p>
                <h4>Comment contacter un déposeur d'annonce ?</h4>
                <p>Le déposeur d'annonce met à disposition ses coordonnées de contact.</p>
                <h4>Comment supprimer mon compte ?</h4>
                <p>Depuis votre page <a href="Profil.php">profil</a>, vous pouvez directement supprimer votre compte.</</p>
                <h4>J'ai fait une erreur lors de mon dêpot d'annonce, j'aimerais modifier les informations.</h4>
                <p>Depuis votre page <a href="Profil.php">profil</a>, vous pouvez séléctionner l'annonce que vous avez déposer pour le mettre à jour.</p>
            </div>
            <div class="row col-12 col-sm-12 col-md-6 col-lg-4 mx-auto border border-info p-2 m-5">
                <h2 class="text-center">Contacter le Support</h2>
                <form action="" method="POST" class="g-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="objet" name="objet" aria-label="Objet" required>
                            <option value="AIde">Aide</option>
                            <option value="Partenariat">Partenariat</option>Autre
                            <option value="Autre">Autre</option>
                         </select>
                        <label for="objet">Objet</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="mail" type="email" name="mail" placeholder="Votre Adresse Mail" required/>
                        <label for="mail">Votre Adresse Mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" name="message" placeholder="Tapez votre Message" style="height: 10rem;" required></textarea>
                        <label for="tapezVotreMessage">Tapez votre Message</label>
                    </div>
                    <button class="btn btn-primary" id="submit" type="submit">Envoyez</button>
                    <?php echo $contenu ?>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- Footer -->
        <?php require_once 'inc/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/script.js"></script>
    </body>
</html>