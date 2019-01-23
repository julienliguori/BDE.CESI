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
    $json = ['nom'=>'Alexandre', 'prix'=>'12', 'quantité'=>'5', 'taille'=>'2', 'type'=>'truc', 'photo'=>'test'];

        var_dump(json_decode($json));

        $parsed_json = json_decode($json);

        $nom = $parsed_json->{'nom'}[0];
        $prix = $parsed_json->{'prix'[0]};
        $quantité = $parsed_json->{'quantité'}[0];
        $taille = $parsed_json->{'taille'}[0];
        $type = $parsed_json->{'type'}[0];
        $photo = $parsed_json->{'photo'}[0];

        echo "<div class='displayprod'>
        <img src='$photo'/>
            <div class='price'> $prix € </div>
            <div class='description'> 
            " . $donnees['description'] . "
            </div>
        </div>";
</body>
</html><?php
        
?>