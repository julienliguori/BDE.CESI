<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <?php   
        include('../../source/site/dependances.php');
        include_once('../../source/authentification/connexioncookie.php'); 
    ?>
    <title>Boutique ~ Vitrine</title>
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>
    <main>
        <div class="container" style="width:500px">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/Mug.jpg" alt="Première vente">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/Mug.jpg" alt="Deuxième vente">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/Mug.jpg" alt="Troisième vente">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>

                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </main>
    <footer><?php include('../../source/site/footer_interface.php');?></footer>
</body>
</html>