<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php 
        if(($_SERVER["REQUEST_URI"] == '/pages/boutique/panier.php')){
            if (isset($_COOKIE['article'])){
                $article = $_COOKIE['article'];
            }else{
                setcookie('article',0,time()+$time_c,null,null,false,true);
            }
        }else{
            $time_c=365*24*3600;
            $id = trim(strip_tags($_GET['condition']));
            $article = '';
            if (isset($_COOKIE['article'])){ 
                $article = $_COOKIE['article'];
            }else{
            }
            $addArticle = $article . $id . ',';
            setcookie('article',$addArticle,time()+$time_c,null,null,false,true);
            header('Location:/pages/boutique/panier.php');
        }

        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include("../../source/site/header_interface.php");
    ?>
    <title>Panier</title>
</head>
<body>

    <div class="container" style="padding-top:50px">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Photo</th>
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      <th scope="col">Prix</th>
      <th scope="col">Suprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $articless = substr($article, 0, -1);
    $articles = explode(",",$articless);

    foreach ($articles as $fin) {
        $element = 'idArticle';
        $signe = '=';
        $condition = $fin;
        $url = "http://localhost:8081/boutique/article/$element/$signe/$condition";
        $json = '{"data": ' . file_get_contents($url) . ' }';
    
        //echo($json);
        $parsed_json = json_decode($json,true);
        //var_dump($parsed_json);
            foreach ($parsed_json['data'] as $data) {
                ?>
    
                    <?php echo '
                            <tr>
                            <th scope="row">1</th>
                            <td>' . $data["photo"] .' </td>
                            <td>' . $data["nom"] .'</td>
                            <td>' . $data["taille"] .'</td>
                            <td>' . $data["prix"] .'</td>
                            <td><button href="#" type="button" class="btn btn-warning">Supprimer</button></td>
                          </tr>' ?>

    
             <?php }
             } ?>   
   </tbody>
</table>
</div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>