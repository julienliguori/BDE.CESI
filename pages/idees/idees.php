<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include("../../source/site/header_interface.php");
    ?>
    <title>Idées</title>
</head>
<body>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <?php
    $element = 1;
    $condition = 1;
    $url = "http://localhost:8081/idees/boiteidee/$element/%3E=/$condition";
    $json = '{"data": ' . file_get_contents($url) . ' }'; 
    //echo($json);
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);
        foreach ($parsed_json['data'] as $data) {
            ?>

        <?php echo '
                <div class="col-md-4" style="padding-bottom:80px">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">' . $data["lieux"] . " Date : " . $data["date"] . '</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="../../pages/boutique/produit.php?id=' . $data['idBoiteIdee'] . '"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                                </div>
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