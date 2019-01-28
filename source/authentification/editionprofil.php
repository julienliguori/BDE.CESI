<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
      $insertnom->execute(array($newnom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
    $newprenom = htmlspecialchars($_POST['newprenom']);
    $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
    $insertprenom->execute(array($newprenom, $_SESSION['id']));
    header('Location: profil.php?id='.$_SESSION['id']);
 }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }

   if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
      $tailleMax = 2097152;
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['avatar']['size'] <= $tailleMax) {
         $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "../img/Avatar/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat) {
               $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
               $updateavatar->execute(array(
                  'avatar' => $_SESSION['id'].".".$extensionUpload,
                  'id' => $_SESSION['id']
                  ));
               header('Location: profil.php?id='.$_SESSION['id']);
            } else {
               $msg = "Erreur durant l'importation de votre photo de profil";
            }
         } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
         }
      } else {
         $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
      }
   }
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <?php //include('.././site/dependances.php'); 
            include("../../source/site/header_interface.php");
      ?>
      <title>Edition du profil</title>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" href="/source/img/logo/bde.png" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="http://bde.cesi/pages/css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
   </head>
   <body>
      <div align="center">
         <h2>Edition de mon profil</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td align="right">
                           <label >Avatar :</label>
                        </td>
                        <td> 
                           <input type="file" name="avatar"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label>Nom :</label>
                        </td>
                        <td>
                            <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['Nom']; ?>" /><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                             <label>Prenom :</label>
                        </td>
                        <td>
                            <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['Prenom']; ?>" /><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">     
                          <label>Mail :</label>
                        </td>
                         <td>             
                           <input type="mail" name="newmail" placeholder="Mail" value="<?php echo $user['Mail']; ?>" /><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">  
                           <label>Mot de passe :</label>
                        </td>
                        <td> 
                           <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                         </td>
                    </tr>
                    <tr>
                         <td align="right">  
                            <label>Confirmation - mot de passe :</label>
                        </td>
                        <td> 
                            <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">  
                            <input type="submit" value="Mettre à jour mon profil !" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
      </div>
      <?php include("../../source/site/footer_interface.php");?>
   </body>
</html>
<?php   
}
else {
   header("Location: connexion.php");
}
?>