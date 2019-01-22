<?php session_start();?>

<div class="black-top-fill-rectangle"><!-- <p style = "margin-left: 240px; color: white">Je taffe dessus @Antoine</p> -->

    <nav class="navbar-default navbar-expand-sm navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="../../pages/index.php">Accueil</a>
                <a class="nav-item nav-link" href="../../pages/evenement/events.php">Événements</a>
                <a class="nav-item nav-link" href="../../pages/idees/idees.php">Boite à idées</a>
                <a class="nav-item nav-link" href="../../pages/boutique/boutique.php">Boutique</a>
                <a class="nav-item nav-link" href="../../pages/squelette.php">Squelette</a>
                <?php 
                /* var_dump(isset($_SESSION)); */
                if(isset($_SESSION['id']))
                    echo '<a class="nav-item nav-link" style="position: absolute; right: 10px;" href="../../source/authentification/deconnexion.php">Déconnexion</a>';
                else{
                    echo '<a class="nav-item nav-link" style="position: absolute; right: 80px;" href="../../source/authentification/connexion.php">Connexion</a>';
                    echo '<a class="nav-item nav-link" style="position: absolute; right: 10px;" href="../../source/authentification/inscription.php">Inscription</a>';
                }?>
                </div>
        </div>
    </nav>

&nbsp;</div>
<div class="events-top-fill-rectangle"><p style = "margin-left: 240px; color: white">Tkt y'aura plein d'events ici :3</p>&nbsp;</div>
<div class="black-rotated-fill-rectangle">&nbsp;</div>

<a href="../../pages/index.php"><img src="../../source/img/logo/bde.png" alt="Logo BDE" height="128" width="128" style="float: left; position:absolute; margin: -58px 0px 0px -237px"></a>