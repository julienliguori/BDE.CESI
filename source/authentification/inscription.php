<?php
$bdd = new PDO('mysql:host=;dbname=espace_membre', 'root', '');

if(isset($_POST['forminscription'])) {

// var_dump($_POST);
// die();

   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $centre = htmlspecialchars($_POST['centre']);


   if(!empty($_POST['scales'])){
      if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['centre'])) {
         $pseudolength = strlen($nom);
         if($pseudolength <= 255) {
            if($mail == $mail2) {
               $mailAuth = explode('@', $mail);
                     if ($mailAuth[1] == "viacesi.fr" || $mailAuth[1] == "cesi.fr") {
                        $status = "Etudiant";
                           
                        if ($mailAuth[1] == "cesi.fr"){
                              $status = "Salarier";
                        
                        }
                     
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                           $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                           $reqmail->execute(array($mail));
                           $mailexist = $reqmail->rowCount();
                           if($mailexist == 0) {
                              if($mdp == $mdp2) {
                                 $insertmbr = $bdd->prepare("INSERT INTO membres(Nom, Prenom, Mail, MDP, Centre, Status) VALUES(?, ?, ?, ?, ?, ?)");
                                 $insertmbr->execute(array($nom, $prenom, $mail, $mdp, $centre, $status));
                                 $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                                 header('Location: connexion.php');
                              } else {
                                 $erreur = "Vos mots de passes ne correspondent pas !";
                              }
                           } else {
                              $erreur = "Adresse mail déjà utilisée !";
                           }
                        } else {
                           $erreur = "Votre adresse mail n'est pas valide !";
                        }
               } else { $erreur = "Votre adresse mail n'est pas valide 2 !";}
            } else {
               $erreur = "Vos adresses mail ne correspondent pas !";
            }
         } else {
            $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
         }
      } else {
         $erreur = "Tous les champs doivent être complétés !";
      }
   } else {
      $erreur = "Vous devez accepté les CGU !";
   }
}
?>

<html>
   <head>
      <?php include('.././site/dependances.php'); ?>

      <title>Inscription</title>
      <meta charset="utf-8">
   </head>
   <body>
      <header>
         <?php include('.././site/header_interface.php'); ?>
         <?php include('.././site/main_interface.php'); ?>
      </header>

      <main>
         <div align="center">
            <h2>Inscription</h2>
            <br /><br />
            <form method="POST" action="">
               <table>
                  <tr>
                     <td align="right">
                        <label for="nom">Nom :</label>
                     </td>
                     <td>
                        <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="prenom">Prenom :</label>
                     </td>
                     <td>
                        <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="mail">Mail :</label>
                     </td>
                     <td>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="mail2">Confirmation du mail :</label>
                     </td>
                     <td>
                        <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="mdp">Mot de passe :</label>
                     </td>
                     <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="mdp2">Confirmation du mot de passe :</label>
                     </td>
                     <td>
                        <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="centre">Centre :</label>
                     </td>
                     <td  type="centre" placeholder="Choisisser un centre :" id="centre" name="centre">
                           <SELECT name="centre" size="1 value="<?php if(isset($centre)) { echo $centre; } ?>"">
                              <OPTION>Arras
                              <OPTION>Aix-en-Provence
                              <OPTION>Angouleme
                              <OPTION>Brest
                              <OPTION>Bordeaux
                              <OPTION>Caen
                              <OPTION>Dijon
                              <OPTION>Pau
                              <OPTION>Orleans
                              <OPTION>Lyon
                              <OPTION>Le Mans
                              <OPTION>Lille
                              <OPTION>Nancy
                              <OPTION>Nanterre
                              <OPTION>Montpellier
                              <OPTION>Rouen
                              <OPTION>Reims
                              <OPTION>Strasbourg
                              <OPTION>Saint-Nazaire
                              <OPTION>Toulouse
                           </SELECT>
                     </td>
                  </tr>
               <br/>
                  <tr>
                     <td align="center">                    
                        <br/>
                        <input type="checkbox" id="scales" name="scales" unchecked></td>
                        </td>
                        <td>
                        <label for="scales">J'ai lu et j'accepte les <a href="/CGU.html">Conditions Générales d'Utilisation</a> ainsi que la <a href="/PdC"> Politique de confidentialité </a></label>
                     </td>
                  </tr>
               <br/>
                  <tr>
                     <td>
                     </td>
                     <td>
                     <br />
                        <input type="submit" name="forminscription" value="Je m'inscris" />
                     </td>
                  </tr>
               </table>
            </form>
            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>
         </div>
      </main>
   </body>
</html>