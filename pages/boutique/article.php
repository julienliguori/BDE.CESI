<!DOCTYPE html>
<html lang="fr">
<head>

    <?php   
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
    ?>
    <title>Boutique</title>
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>
    <main><?php include('../../source/site/main_interface.php'); ?></main>
    <footer><?php include('../../source/site/footer_interface.php');?></footer>
    <?php
    $json = '{"data": [{"nom":"Tigre","prix":"12","quantite":"5","taille":"Little / Big","type":"truc","photo":"Tigre.jpg"},{"nom":"Pull","prix":"21","quantite":"2","taille":"1 / 2 / 3","type":"DES","photo":"Stylo.jpg"}]}';//json_encode($prejson);
        echo($json);
        var_dump(json_decode($json));

        $parsed_json = json_decode($json,true);

        foreach ($parsed_json['data'] as $v) {
            ?>
            <div>
            <img src="..\..\source\img\boutique\ImgMemeFormat\<?php echo $v['photo']; ?>"/>
                <div> <?php echo $v['nom']; ?> </div>
                <div> Prix : <?php echo $v['prix']; ?> € </div>
                <div> Il en reste <?php echo $v['quantite']; ?> </div>
                <div> Taille disponible : <?php echo $v['taille']; ?> </div>
                <div> catégorie : <?php echo $v['quantite']; ?> </div>

         <?php } ?>

</body>
</html>