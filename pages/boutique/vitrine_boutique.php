<!DOCTYPE html>
<html lang="fr">
<head>

    <?php   
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
    ?>
    <title>Boutique ~ Vitrine</title>
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>
    <main>
        <div class="container" style="width:500px">

        <div class="alert alert-secondary" role="alert" style="text-align:center; font-size: 24px">
        Les meilleures ventes
        </div>

            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/T-Shirt.jpg" alt="Première vente">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/Mug.jpg" alt="Deuxième vente">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="../../source/img/boutique/ImgMemeFormat/PoloBlanc1.jpg" alt="Troisième vente">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer><?php include('../../source/site/footer_interface.php');?></footer>
</body>
</html>