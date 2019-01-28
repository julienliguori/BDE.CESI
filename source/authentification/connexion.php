<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <?php include('.././site/dependances.php');?>
      <?php
$time_c=365*24*3600;

$optionsmdp = [
   'cost' => 12,
];

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
if(!isset($_SESSION['id']) AND empty($_SESSION['id']) AND empty($_SESSION['status'])){
if(isset($_POST['formconnexion'])) {
   include_once('./connexioncookie.php');
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = $_POST['mdpconnect'];

   //var_dump($reqmdp);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $reqmdp = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
      $reqmdp->execute([$mailconnect]);
      $result = $reqmdp->fetch();
      if($result == true){
         $hashmdp = $result['MDP'];
         var_dump($result);
         if(password_verify($mdpconnect, $hashmdp)){

            $userexist = $reqmdp->rowCount();
            if($userexist == 1) {
               $userinfo = $result;
               // var_dump($userinfo);
               if(isset($_POST['rememberme'])) {
                  setcookie('email',$mailconnect,time()+$time_c,null,null,false,true);
                  setcookie('password',$mdpconnect,time()+$time_c,null,null,false,true);
               }
               $_SESSION['id'] = $userinfo['ID'];
               $_SESSION['nom'] = $userinfo['Nom'];
               $_SESSION['prenom'] = $userinfo['Prenom'];
               $_SESSION['mail'] = $userinfo['Mail'];
               $_SESSION['status'] = $userinfo['Status'];
               // var_dump($_SESSION);
               // die();
               header("Location: profil.php?id=".$_SESSION['id']);
               } else {
                     $erreur = "Mauvais mail ou mot de passe !";
               }
            }
         }


            } else {
               $erreur = "Tous les champs doivent être complétés !";
            }
         }
     } else{
   header('Location: /pages/home.php');
}
?>
      <title>Connexion</title>
      <meta charset="utf-8">
   </head>

   <body>
      <header><?php include('.././site/header_interface.php'); ?></header>

      <main>
         <div style="position:absolute; top:25%; left:48%">
            <h2 class="center" style="margin-bottom: -30px">Connexion</h2>
            <br /><br />
            <form method="POST" action="" class="center" style="float:left;">
               <input class="form-control" type="email" name="mailconnect" placeholder="Mail" />
               <input class="form-control" type="password" name="mdpconnect" placeholder="Mot de passe" />
               <br /><br />
               <input class="form-check-label" type="checkbox" name="rememberme" id="remembercheckbox" /><label for="remembercheckbox">Se souvenir de moi</label>
               <br /><br />
               <input class="btn btn-primary" type="submit" name="formconnexion" value="Se connecter !" />
            </form>
            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>
         </div>
      </main>
      <footer><?php include('../../source/site/footer_interface.php');?></footer>
   </body>
</html>