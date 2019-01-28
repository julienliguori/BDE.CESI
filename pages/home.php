<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <?php 
        include("../source/site/dependances.php");
        include_once('../source/authentification/connexioncookie.php');
        include("../source/site/header_interface.php");
    ?>
    <title>BDE.CESI</title>
</head>
<body>
        <main>
        
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/source/img/carousel/C_home_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Rejoinez le cesi</h5>
                        <p>Avec 16 campus en france.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="/source/img/carousel/C_home_4.jpg" class="d-block w-100" alt="...">   
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Le Fablab</h5>
                        <p>Exprimer votre création</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="/source/img/carousel/C_home_3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Votre BDE vous emmene au ski !</h5>
                        <p>Un sejour super a partager avec vos amis !</p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <br/>
            <br/>
            <div class="row">
            
                <div class="col-md-4" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">Événements</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="../../pages/evenement/events.php"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">Boutique</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="../../pages/boutique/boutique.php"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">Idées</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="../../pages/idees/idees.php"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>













        </div>

        </main>
        <footer><?php include("../source/site/footer_interface.php");?></footer>
</body>
</html>