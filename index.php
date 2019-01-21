<!doctype html>
<html lang='fr'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site Web pour le BDE du CESI.">
    <meta name="author" content="Antoine Casenove, Hugo Le Boennec, Julien Liguori, Lorenzo Nouteau, Antonin Pretet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" media="screen and (min-width: 900px)" href="widescreen.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="smallscreen.css">

    <title>BDE.CESI</title>

    </head>

    <body>
        <header>
            <?php include('src/site/header_interface.php'); ?>
        </header>

        <main>


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