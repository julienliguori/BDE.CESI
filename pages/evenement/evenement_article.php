<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include("../../source/site/header_interface.php");
    ?>
    <title>Boutique</title>
</head>
<body>
    <div class="container" style="padding-top:50px">
    <div class="d-flex justify-content-around">
    <?php
    // $element = trim(strip_tags($_GET['element']));
    // $signe = trim(strip_tags($_GET['signe']));
    $condition = trim(strip_tags($_GET['id']));
    $url = "http://localhost:8081/evenement/evenement/idEvenement/=/$condition";
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
                        <img class="card-img-top" src="/source/img/evenement/' . $data['urlImage'] . '" alt="">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="font-weight-bolder">' . $data["nom"] . '</p>
                            <div class="btn-group">
                            <a href="#"><button type="button" class="btn btn-sm btn-outline-warning">Participer</button></a>
                            </div>
                        </div>
                            <p> Nombre de participant : ' . $data["nbParticipant"] . '/' . $data['nbPlace'] .'</p>
                            <p> Description : <br/>' . $data["description"] . '</p>
                            <p> Le : ' . substr($data["date"], 0, 10) .'</p>
                            <p> Lieux : ' . $data["lieux"] . '</p>
                        </div>
                    </div>
                </div>' 
                ?>

         <?php } ?>
    </div>
    <div>
        <?php 
            $dateE = substr($data["date"], 0, 10);
            $auj = date("Y-m-j");
            if($dateE < $auj){

                include("../../pages/evenement/commentaire.php");
            }
        ?>
    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>
<?php flush(); ?>
