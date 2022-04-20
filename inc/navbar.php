
<!-- <header class="py-4"> -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid px-4 px-lg-5 bg-body p-2">
        <div><img src="img/logo_bleu2.svg" alt="Logo" height="80"></div>
    
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item m-1"><a class="nav-link border btn btn-outline-info" href="accueil.php">Accueil</a></li>
                <li class="nav-item m-1"><a class="nav-link border btn btn-outline-info" href="recherche.php">Recherche</a></li>
                <li class="nav-item m-1"><a class="nav-link border btn btn-outline-info" href="annonce.php">Déposer une annonce</a></li>
                <li class="nav-item m-1"><a class="nav-link border btn btn-outline-info" href="contact.php">Contact</a></li>
            </ul>

            <div class="col- col-">
                <ul class="list-unstyled">
                    <?php if(!EstConnecte()) { ?>
                    <li class="nav-item ">
                        <a class="nav-link btn border border-info" href="connexion.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn border border-info" href="inscription.php">Inscription</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link border btn btn-outline-info" href="profil.php">Profil</a>
                    </li>

                    <li class="nav-item">
                    <?php echo '<a class="nav-link btn btn-outline-danger border border-danger" href="' .RACINE_SITE. 'connexion.php?action=deconnexion">Déconnexion</a>'; ?>
                    </li>

                    <?php } ?> 
                </ul>
                
            </div>
        </div>
    </div>
</nav>
<!-- </header> -->
