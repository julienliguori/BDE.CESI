<!doctype html>
<html lang='fr'>

    <head>
        <?php include('src/site/dependances.php'); ?>
        <title>BDE.CESI</title>
    </head>

    <body>
        <header>
            <?php include('src/site/header_interface.php'); ?>
        </header>

        <main>
            <?php include('src/site/main_interface.php'); ?>

            <div class=container style="width: 400px; margin-right: 200px; float: left; margin-top: 60px">
            
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="img/carousel/accueil_1.png" alt="1">
                        </div>
                
                        <div class="item">
                            <img src="img/carousel/accueil_2.png" alt="1">
                        </div>
                    
                        <div class="item">
                            <img src="img/carousel/accueil_3.png" alt="3">
                        </div>

                    </div>
                </div>
            </div>

        </main>

        <footer>
            <div id="copyright" class="copyright"></div>
        </footer>

        <script src="./assets/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

</html>