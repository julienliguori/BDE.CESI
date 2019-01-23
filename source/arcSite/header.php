<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="./index.php"><img src="/source/img/logo/bde.png" width="30" height="30" alt=""> BDE.CESI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Evénements
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../../pages/evenement/events.php">Consulter les événements</a>
          <a class="dropdown-item" href="../../pages/evenement/past.events.php">Evévements passés</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Boite à idée
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Consulter la boîte à idée</a>
          <a class="dropdown-item" href="#">Ajouter une idée</a>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="../../pages/boutique/boutique.php">Boutique</a>
      </li>
      </ul>
      <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php 
                /* var_dump(isset($_SESSION)); */
                if(isset($_SESSION['id'])){
                    echo '<a class="dropdown-item" href="../../source/authentification/profil.php?id='.$_SESSION['id'].'">Profil</a>';
                    echo '<a class="dropdown-item" href="../../source/authentification/deconnexion.php">Déconnexion</a>';

                }else{
                    echo '<a class="dropdown-item"" href="../../source/authentification/connexion.php">Connexion</a>';
                    echo '<a class="dropdown-item" href="../../source/authentification/inscription.php">Inscription</a>';
                }?>
        </div>
      </li>
    </ul>
  </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-warning my-2 my-sm-0 " type="submit">Search</button>
  </form>   
</nav>