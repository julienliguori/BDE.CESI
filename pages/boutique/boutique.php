<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include('../../source/site/dependances.php'); 
        include_once('../../source/authentification/connexioncookie.php');
        include("../../source/site/header_interface.php");
    ?>
    <title>Boutique</title>
</head>
<body>
    <?php include('../../source/site/sidebar_boutique_interface.php'); ?>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <?php
    if(($_SERVER["REQUEST_URI"] == '/pages/boutique/boutique.php')){
        $url = "http://localhost:8081/boutique/article/1/=/1";
        //echo $url;
        $json = '{"data": ' . file_get_contents($url) . ' }'; 
    }else{
        $element = trim(strip_tags($_GET['element']));
        $signe = trim(strip_tags($_GET['signe']));
        $condition = trim(strip_tags($_GET['condition']));
        $url = "http://localhost:8081/boutique/article/$element/$signe/$condition";
        //echo $url;
        $json = '{"data": ' . file_get_contents($url) . ' }'; 
        //echo($json);
        if ($json == '{"data": [] }'){
            echo'Aucun article ne correspond à votre recherche.';
        }
    }
    //echo($json);
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);
        foreach ($parsed_json['data'] as $data) {
            ?>

                <?php echo '
                <div class="col-md-4" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">' . $data["nom"] . " " . $data["taille"] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="../../pages/boutique/produit.php?element=idArticle&signe=%3D&condition=' . $data['idArticle'] . '"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                            <a href="../../pages/boutique/panier.php?element=idArticle&signe=%3D&condition=' . $data['idArticle'] . '"><button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button></a>
                            </div>
                            <small class="text-muted">' . $data["prix"] ."€". '</small>
                        </div>
                        </div>
                    </div>
                </div>' 
                ?>

         <?php } ?>

    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>