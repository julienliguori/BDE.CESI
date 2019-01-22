<?php
if(!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND MDP = ?");
   $requser->execute(array($_COOKIE['email'], $_COOKIE['password']));
   $userexist = $requser->rowCount();
   if($userexist == 1)
   {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['ID'];
      $_SESSION['nom'] = $userinfo['Nom'];
      $_SESSION['prenom'] = $userinfo['Prenom'];
      $_SESSION['mail'] = $userinfo['Mail'];
      $_SESSION['status'] = $userinfo['Status'];
   }
}
?>