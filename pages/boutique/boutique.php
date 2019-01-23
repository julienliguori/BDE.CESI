<!DOCTYPE html>
<html lang="fr">
<head>

    <?php   
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
    ?>
    <title>Boutique</title>
    <style type="text/css">
        .pub{position: absolute; top: 200px; left: 25px; 
        color: blue; font-size: x-large; font-weight: bold;} 
    </style> 
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>
    <main><?php include('../../source/site/main_interface.php'); ?></main>
    <DIV class=pub href="Adresse ou URL"> Publication Html </DIV> 
    <footer><?php include('../../source/site/footer_interface.php');?></footer>
</body>
</html>