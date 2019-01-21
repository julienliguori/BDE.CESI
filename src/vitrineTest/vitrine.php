<!doctype html>
<html lang='fr'>

<head>
<?php
include('../site/dependances.php');
?>
    <title>vitrineTest</title>

    </head>

    <body>
        <header>
            <?php
            include('../site/header_interface.php');
            ?>
        </header>

        <main>
             <?php
            include('../site/main_interface.php');
            ?>

            
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=boutique;charset=utf8','root','');

$article = $bdd->query('SELECT nom FROM article ORDER BY nom DESC');

if(isset($_GET['q']) AND !empty($_GET['q']))
{
    $q= htmlspecialchars($_GET['q']);
    $article = $bdd->query('SELECT nom FROM article WHERE nom LIKE "%'.$q.'%" ORDER BY nom DESC');
}


?>

<form action="GET">
    <input type="search" name= "q" placeholder="Recherche..." />
    <input type="submit" value="Valider" />
</form>

<ul>
<?php while($a = $article->fetch()) { ?>
      <li><?= $a['nom'] ?></li>
   <?php } ?>
   </ul>




        </main>

        <footer>
            <div id="copyright" class="copyright"></div>
        </footer>

        <script src="./assets/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

</html>