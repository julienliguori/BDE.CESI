<?php 
session_start();

?>

<div class="black-top-fill-rectangle"><!-- <p style = "margin-left: 240px; color: white">Je taffe dessus @Antoine</p> -->

    <nav class="navbar-default navbar-expand-sm navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle p-3 mb-2 bg-dark text-white border-0" type="button" data-toggle="dropdown">Evénements</button>
                    <ul class="dropdown-menu">
                     <li><a href="../../pages/evenement/events.php">Consulter les événements</a></li>
                     <li><a href="../../pages/evenement/past.events.php">Evévements passés</a></li>
                  </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle p-3 mb-2 bg-dark text-white border-0" type="button" data-toggle="dropdown">Boite à idée</button>
                    <ul class="dropdown-menu">
                     <li><a href="../../pages/idees/idees.php">Consulter la boîte à idée</a></li>
                     <li><a href="../../pages/idees/proposition.idee.php">Ajouter une idée</a></li>
                  </ul>
            </div>
            <div class="dropdown">
            <a href="../../pages/boutique/boutique.php" class="btn btn-secondary btn-lg p-3 mb-2 bg-dark text-white border-0" style="font-size:14px" role="button" aria-pressed="true">Boutique</a>
            </div>
                <?php 
                    if(isset($_SESSION['id']))
                    echo'<a class="nav-item nav-link" href="../../source/authentification/profil.php?id='.$_SESSION['id'].'">Profil</a>'
                ?>
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
    <nav class="dropdown">                                   
        
    </nav>

&nbsp;
</div>
<div class="events-top-fill-rectangle"><p style = "margin-left: 240px; color: white">Tkt y'aura plein d'events ici :3</p>&nbsp;</div>
<div class="black-rotated-fill-rectangle">&nbsp;</div>

<a href="../../pages/home.php"><img src="../../source/img/logo/bde.png" alt="Logo BDE" height="128" width="128" style="float: left; position:absolute; margin: -70px 0px 0px -237px"></a>