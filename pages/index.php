<!doctype html>
<html lang='fr'>

    <head> 
        <?php 
            include_once('../source/authentification/connexioncookie.php');
            include('../source/site/dependances.php'); 
        ?>
        <title>BDE.CESI</title>
    </head>

    <body>
        <header>
            <?php include('../source/site/header_interface.php'); ?>
        </header>

        <main>
            <?php include('../source/site/main_interface.php'); ?>

            <div class=container style="width: 320px; float: left; margin-top: 35px; margin-left: -80px">
            
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="../source/img/carousel/accueil_1.png" alt="1">
                        </div>
                
                        <div class="item">
                            <img src="../source/img/carousel/accueil_2.png" alt="1">
                        </div>
                    
                        <div class="item">
                            <img src="../source/img/carousel/accueil_3.png" alt="3">
                        </div>

                    </div>
                </div>
            </div>

        </main>

        <footer>
            <footer><?php include('../source/site/footer_interface.php');?></footer>
        </footer>
    </body>

</html>