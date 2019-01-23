<!DOCTYPE html>
<html lang="fr">
<head>

    <?php 
    include 'boutique.php';  
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
    ?>
    <title>Boutique</title>
</head>
<body>

    <?php
    $get =$_GET['http://localhost:8081/boutique/article/prix/=/12'];
    $json = '{"data":' . $get . '}';//'{"data": [{"nom":"Tigre","prix":"12","quantite":"5","taille":"Little / Big","type":"truc","photo":"Tigre.jpg"},{"nom":"Pull","prix":"21","quantite":"2","taille":"1 / 2 / 3","type":"DES","photo":"Stylo.jpg"}]}';
        $parsed_json = json_decode($json,true);

        foreach ($parsed_json['data'] as $v) {
            ?>
            <div>s
            <img src="..\..\source\img\boutique\ImgMemeFormat\<?php echo $v['photo']; ?>"/>
                <div> <?php echo $v['nom']; ?> </div>
                <div> Prix : <?php echo $v['prix']; ?> € </div>
                <div> Il en reste <?php echo $v['quantite']; ?> </div>
                <div> Taille disponible : <?php echo $v['taille']; ?> </div>
                <div> catégorie : <?php echo $v['quantite']; ?> </div>

         <?php } ?>

</body>
</html>