<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        $time_c=365*24*3600;
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include("../../source/site/header_interface.php");
    ?>
    <title>Panier</title>
</head>
<body>
    <?php include('../../source/site/sidebar_boutique_interface.php'); ?>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <?php
    if (empty($addArticle)){
        $addArticle = '';
        $article = '';
    }
    $id = trim(strip_tags($_GET['id']));
    $addArticle .= $id . ';';
    setcookie('article',$addArticle,time()+$time_c,null,null,false,true);
    $articles = $_COOKIE['article'];
    $article = explode(";",$articles);
    
    foreach ($article as $fin) {
        $element = 'id';
        $condition = $fin;
        $url = "http://localhost:8081/boutique/article/$element/%3E=/$condition";
        $json = '{"data": ' . file_get_contents($url) . ' }';
    
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
                                <a href="../../pages/boutique/produit.php?id=' . $data['idArticle'] . '"><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button>
                                </div>
                                <small class="text-muted">' . $data["prix"] ."€". '</small>
                            </div>
                            </div>
                        </div>
                    </div>' 
                    ?>
    
             <?php }
             } ?>   
    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>