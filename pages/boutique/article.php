<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include('../../source/site/dependances.php'); 
    ?>
    <title>Boutique</title>
</head>
<body>
    
    <?php
    $element = 'prix';
    $url = "http://localhost:8081/boutique/article/$element/%3C=/5";
    $json = '{"data": ' . file_get_contents($url) . ' }'; 
    //echo($json);
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);
        foreach ($parsed_json['data'] as $data) {
            ?>
            <div class="container">
            <div class="row">
                <?php echo '
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $data['photo'] . '" alt="">
                        <div class="card-body">
                        <p class="card-text">' . $data["taille"] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button>
                            </div>
                            <small class="text-muted">' . $data["prix"] . '</small>
                        </div>
                        </div>
                    </div>
                </div>' 
                ?>

         <?php } ?>

    </div>
</div>
</body>
</html>