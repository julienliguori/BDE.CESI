<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE ID = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title><?php echo ($userinfo['Nom'] . ' ' . $userinfo['Prenom']); ?> - Profil</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo ($userinfo['Nom'] . ' '. $userinfo['Prenom']); ?></h2>
         <br /><br />
         <?php 
         if(!empty($userinfo['avatar']))
         { 
         ?>
         <img src="../img/Avatar/<?php echo $userinfo['avatar']; ?>" width="150">
         <?php 
         }
         ?>
         <br /><br />
         Nom = <?php echo $userinfo['Nom']; ?>
         <br />
         Prenom = <?php echo $userinfo['Prenom']; ?>
         <br />
         Mail = <?php echo $userinfo['Mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['ID'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
} else header("Location: ");  // a completer
?>