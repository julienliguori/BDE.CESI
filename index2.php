<meta charset="utf-8" />
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