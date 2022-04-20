<?php  require_once 'inc/log_bdd.php';
       require_once 'inc/fonction.php';

// debug($_SESSION);   
// Les informations du membres connecté passé en variable
if (estConnecte()) {
$id_membre = $_SESSION['membre']['id_membre'];
$prenom = $_SESSION['membre']['prenom'];
$nom = $_SESSION['membre']['nom'];
$pseudo = $_SESSION['membre']['pseudo'];
}
if (!empty($_POST)) {
    // var_dump($_POST);
    $_POST['type_annonce'] = htmlspecialchars($_POST['type_annonce']);
    $_POST['type_de_cdm'] = htmlspecialchars($_POST['type_de_cdm']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['code_postal'] = htmlspecialchars($_POST['code_postal']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['categorie'] = htmlspecialchars($_POST['categorie']);

    $photo = '';
     if(!empty($_FILES['photo']['name'])) {
        $photo = 'photos/' .$_FILES['photo']['name'];
        copy($_FILES['photo']['tmp_name'], '' .$photo);
        } // fin du traitement photo
 
    $insertion = executeRequete(" INSERT INTO annonces (id_membre, type_de_cdm, type_annonce, titre, description, code_postal, ville, adresse, categorie, photo) VALUES (:id_membre, :type_de_cdm ,  :type_annonce, :titre, :description, :code_postal, :ville, :adresse, :categorie, :photo) ",

    array(
        ':id_membre'=> $id_membre, // id_membre qui vient de  $_SESSION
        ':type_de_cdm' => $_POST['type_de_cdm'],
        ':type_annonce' => $_POST['type_annonce'],
        ':titre' => $_POST['titre'],
        ':description' => $_POST['description'],
        ':code_postal' => $_POST['code_postal'],
        ':ville' => $_POST['ville'],
        ':adresse' => $_POST['adresse'],
        ':categorie' => $_POST['categorie'],
        ':photo' => $photo,
     ));
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
        <section class="container justify-content-center">
            <div class="row col-12 col-sm-12 col-md-6 col-lg-4 mx-auto bg-light border border-info ">
                <?php If(estConnecte()){ ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="type_de_cdm">Type de coup de main*</label>
                        <?php echo $prenom; ?>
                        <div class="row">
                            <div class=" col form-group mt-2">
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
                                <input type="text" name="titre" id="titre" value="" class="form-control" required>
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
                            <textarea name="description" id="description" class="form-control"  required></textarea>
                        </div>
                        <div class="col-6 form-group mt-2">
                                <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
                        </div>
                        <div class="row">
                            <div class="col form-group mt-2">
                                <label for="code_postal">Code postal*</label>
                                <input type="text" name="code_postal" id="code_postal" value="" class="form-control"  required> 
                            </div>
                            <div class="col form-group mt-2">        
                                <label for="ville">Ville*</label>
                                <input type="text" name="ville" id="ville" value="" class="form-control"  required> 
                            </div>
                            
                        </div>
                        <div class="col form-group mt-2">        
                            <label for="adresse">Adresse*</label>
                            <input type="text" name="adresse" id="adresse" value="" class="form-control"> 
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
