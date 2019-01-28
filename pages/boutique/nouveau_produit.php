<?php
session_start(); ?>
<?php
//$bdd = new PDO('mysql:host=;dbname=bde_cesi', 'root', '');
 if(isset($_SESSION['status'])){
   if($_SESSION['status'] != 'Membre BDE'){
   header('Location: /../pages/home.php');
   }else{

//If newproduct is open
if(isset($_POST['newproduct'])) { 

   //Creation var
   $nom = htmlspecialchars($_POST['nom']);
   $prix = htmlspecialchars($_POST['prix']);
   $quantite = htmlspecialchars($_POST['quantite']);
   $couleur = htmlspecialchars($_POST['couleur']);
   $description = htmlspecialchars($_POST['description']);
   $type = htmlspecialchars($_POST['type']);

   if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
      $tailleMax = 2097152;
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['photo']['size'] <= $tailleMax) {
         $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "../../source/img/boutique/ImgMemeFormat/".$nom.".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
            if($resultat) {
                  $_POST['photo']= $nom.".".$extensionUpload;
                  //'id' => $_SESSION['id']
                  
              // header('Location: profil.php?id='.$_SESSION['id']);
            } else {
               $msg = "Erreur durant l'importation de votre image.";
            }
         } else {
            $msg = "Votre image doit être au format jpg, jpeg, gif ou png.";
         }
      } else {
         $msg = "Votre image ne doit pas dépasser 2Mo.";
      }
   }

   $photo = htmlspecialchars($_POST['photo']);

   //var in array for json
   $array = array(
      'nom' => $nom,
      'prix' => $prix,
      'quantite' =>  $quantite,
      'couleur' =>  $couleur,
      'description' =>  $description,
      'type' => $type,
      'photo' => $photo
  );
                                                                       // vardump($array);
//Encode array 
  $arrayJSON = json_encode($array);

                                                                             //  vardump($arrayJSON);
  //params convertion
  $options = array(
      'http'=> array(
          'method' => 'POST',
          'header'=> "Content-Type: application/json",
          'content' => $arrayJSON
      )
  );

  $context = stream_context_create($options);

  //Redirection
   if(!empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['quantite']) AND !empty($_POST['description']) AND !empty($_POST['couleur']) AND !empty($_POST['type']) AND !empty($_POST['photo'])){
      header('Location: http://bde.cesi/pages/home.php');
      return file_get_contents('http://localhost:8081/boutique/article/', false, $context);
   }
   else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
  
/*  $fp = fopen('http://localhost:8081/boutique/article/', 'r', false, $context);
 fpassthru($fp);
 fclose($fp); */
  //echo ($arrayJSON);
  //echo "chups);


 }
  } header('Location: /../pages/home.php'); ?>

<!DOCTYPE html>
<html lang="fr">
   <head>
      <?php include('../../source/site/dependances.php'); 
      include_once('../../source/authentification/connexioncookie.php');
      ?>

      <title>Ajout d'un produit</title>
   </head>
   <body>
      <header>
         <?php include('../../source/site/header_interface.php'); ?>
      </header>

      <main>
         <div style = "text-align:center" style="margin-left:50% text-align:center;">
            <h2 style="padding-top: 20px; margin-bottom:-30px">Ajouter un article</h2>
            <br /><br />
            <div class="container" style="width: 420px;margin: 0 auto;">
            <form method="POST" action="" enctype="multipart/form-data">
               <table>
                  <tr>
                     <td style = "text-align:right">
                        <label for="nom">Nom :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Nom article" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="prix">Prix :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Prix" id="prix" name="prix" value="<?php if(isset($prix)) { echo $prix; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="quantite">Quantité :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Quantite" id="quantite" name="quantite" value="<?php if(isset($quantite)) { echo $quantite; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="description">Description :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Description" id="description" name="description" value="<?php if(isset($description)) { echo $description; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="mdp">Colorie :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Couleur" id="couleur" name="couleur" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="type">Catégorie :</label>
                     </td>
                     <td  type="type" placeholder="type" id="type" name="Catégorie">
                           <SELECT name="type" class="custom-select" size="1 value="<?php if(isset($type)) { echo $type; } ?>"">
                              <OPTION>T-Shirt
                              <OPTION>Polo
                              <OPTION>Pull
                              <OPTION>Briquet
                              <OPTION>Casquette
                              <OPTION>Peluche
                              <OPTION>Billet
                              <OPTION>Mug
                           </SELECT>
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                        <label for="photo">Image de l'article :</label>
                     </td>
                     <td>
                        <input type="file"   id="photo" name="photo" />
                     </td>
                  </tr>
                  <tr>
                     <td style = "text-align:right">
                     <br />
                        <input type="submit" class="btn btn-primary" name="newproduct" value="Ajoutez!" />
                     </td>
                  </tr>
               </table>
            </form>
            </div>
            <?php
            if(isset($erreur)) {
               echo '<font color="red">'.$erreur."</font>";
            }
            ?>
         </div>
      </main>
   </body>
</html>