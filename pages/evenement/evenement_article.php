<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include("../../source/site/header_interface.php");
    ?>
    <title>Événements</title>
</head>
<body>
    <div class="container" style="padding-top:50px">
    <div class="d-flex justify-content-around">
    <?php
    // $element = trim(strip_tags($_GET['element']));
    // $signe = trim(strip_tags($_GET['signe']));

    $options = array(
        'http'=> array(
            'method' => 'GET',
            'header'=> "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g", 
                    "Content-Type: application/json",
        )
    );

    $context = stream_context_create($options);

    $condition = trim(strip_tags($_GET['id']));
    $url = "http://localhost:8081/evenement/evenement/idEvenement/=/$condition";
    //echo $url;
    $json = '{"data": ' . file_get_contents($url, false, $context) . ' }'; 
    $auj = date("Y-m-j");
    //echo($json);
    if ($json == '{"data": [] }'){
        echo'Aucun article ne corespond à votre recherche';
    }
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);
        foreach ($parsed_json['data'] as $data) {
            ?>

                <?php 
                
                $dateE = substr($data["date"], 0, 10);
                echo '
                <div class="col-md-5" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/evenement/' . $data['urlImage'] . '" alt="">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="font-weight-bolder">' . $data["nom"] . '</p>
                            <div class="btn-group">';
                            if($dateE >= $auj){
                            echo '<a href="../../pages/evenement/action.php?nbParti=' . $data['nbParticipant'] . '&id='.$data['idEvenement'].'"><button type="button" class="btn btn-sm btn-outline-warning">Participer</button></a>';   
                        }
                    echo'</div>
                        </div>
                            <p> Nombre de participant : ' . $data["nbParticipant"] . '/' . $data['nbPlace'] .'</p>
                            <p> Description : <br/>' . $data["description"] . '</p>
                            <p> Le : ' . substr($data["date"], 0, 10) .'</p>
                            <p> Lieux : ' . $data["lieux"] . '</p>
                        </div>
                    </div>
                </div>' ;
                ?>

         <?php } ?>
    </div>
    <div>
        <?php 

            if($dateE < $auj){ 
                echo'
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link '; if($_GET['A'] == '0'){echo "active";} echo'" href="http://bde.cesi/pages/evenement/evenement_article.php?id=1&A=0">Commentaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link '; if($_GET['A'] == '1'){echo "active";} echo'" href="http://bde.cesi/pages/evenement/evenement_article.php?id=1&A=1">Photo</a>
                    </li>
                 </ul>';
                 //echo '<br/> <br/>';
                if($_GET['A'] == '0'){
                    include("../../pages/evenement/commentaire.php");
                }else{
                    if($_GET['A'] == '1'){
                    include("../../pages/evenement/photocommentaire.php");
                }
            }

            }
        ?>
    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>
<?php flush(); ?>
