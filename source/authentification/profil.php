<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE ID = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
   <?php include('.././site/dependances.php'); ?>
      <title><?php echo ($userinfo['Nom'] . ' ' . $userinfo['Prenom'] . ' ' . $userinfo['Status']); ?> - Profil</title>
   </head>
   <body>
      <header>
         <?php include('.././site/header_interface.php'); ?>
      </header>

      <div class="container" style="text-align: center; padding-top:25px">
         <h2>Profil de <?php echo ($userinfo['Nom'] . ' ' . $userinfo['Prenom'] . ' ' . $userinfo['Status']);?></h2>
         <br /><br />
         <?php 
         if(!empty($userinfo['avatar']))
         { 
         ?>
         <img src="../img/Avatar/<?php echo $userinfo['avatar']; ?>" width="150" style="margin-top: -40px">
         <?php 
         }
         ?>
         <br /><br />
         Nom : <?php echo $userinfo['Nom']; ?>
         <br />
         Prenom : <?php echo $userinfo['Prenom']; ?>
         <br />
         Mail : <?php echo $userinfo['Mail']; ?>
         <br />
         Statut : <?php echo $userinfo['Status']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['ID'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Éditer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
      <footer><?php include('.././site/footer_interface.php');?></footer>
   </body>
</html>
<?php   
} else header("Location: ");  // a completer
?>