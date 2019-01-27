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
    <div class="container" style="padding-top:50px">
    <div class="d-flex justify-content-around">
    <?php
    $element = trim(strip_tags($_GET['element']));
    $signe = trim(strip_tags($_GET['signe']));
    $condition = trim(strip_tags($_GET['condition']));
    $url = "http://localhost:8081/boutique/article/$element/$signe/$condition";
    //echo $url;
    $json = '{"data": ' . file_get_contents($url) . ' }'; 
    //echo($json);
    if ($json == '{"data": [] }'){
        echo'Aucun article ne corespond à votre recherche';
    }
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);
        foreach ($parsed_json['data'] as $data) {
            ?>

                <?php echo '
                <div class="col-md-5" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">' . $data["nom"] . " " . $data["taille"] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <a href="../../pages/boutique/panier.php?element=idArticle&signe=%3D&condition=' . $data['idArticle'] . '"><button type="button" class="btn btn-sm btn-outline-warning">Acheter</button></a>
                            </div>
                            <p class="font-weight-bolder">' . $data["prix"] ."€". '</p>
                        </div>
                            <p>Description : ' . $data["description"] . '</p>
                            <p> Il en reste : ' . $data["quantite"] . '</p>
                            <p>Couleur : ' . $data["couleur"] . '</p>
                            <p>Catégorie : ' . $data["type"] . '</p>
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
<?php flush(); ?>
