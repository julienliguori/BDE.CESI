<?php
$bdd = new PDO('mysql:host=;dbname=bde_cesi', 'root', '');

if(isset($_POST['newproduct'])) {

   $nom = htmlspecialchars($_POST['nom']);
   $prix = htmlspecialchars($_POST['prix']);
   $quantite = htmlspecialchars($_POST['quantite']);
   $couleur = htmlspecialchars($_POST['couleur']);
   $description = htmlspecialchars($_POST['description']);
   $type = htmlspecialchars($_POST['type']);
   $photo = htmlspecialchars($_POST['photo']);

   $array = array(
      'nom' => $nom,
      'prix' => $prix,
      'quantite' =>  $quantite,
      'couleur' =>  $couleur,
      'description' =>  $description,
      'type' => $type,
      'photo' => $photo,
  );

  $arrayJSON = json_encode($array);
  $options = array(
      'http'=> array(
          'method' => 'POST',
          'header'=> "Content-Type: application/json",
          'content' => $arrayJSON
      )
  );
  $context = stream_context_create($options);

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


   ?>

<html>
   <head>
      <?php include('../../source/site/dependances.php'); ?>

      <title>AjoutProduit</title>
      <meta charset="utf-8">
   </head>
   <body>
      <header>
         <?php include('../../source/site/header_interface.php'); ?>
      </header>

      <main>
         <div align="center" style="margin-left:50% text-align:center;">
            <h2 style="padding-top: 20px; margin-bottom:-30px">Ajouter un article</h2>
            <br /><br />
            <form method="POST" action="">
               <table>
                  <tr>
                     <td align="right">
                        <label for="nom">Nom :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="Nom Article" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="prix">Prix :</label>
                     </td>
                     <td>
                        <input type="text" class="form-control" placeholder="prix" id="prix" name="prix" value="<?php if(isset($prix)) { echo $prix; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="quantite">Quantité :</label>
                     </td>
                     <td>
                        <input type="quantite" class="form-control" placeholder="quantite" id="quantite" name="quantite" value="<?php if(isset($quantite)) { echo $quantite; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="description">Description :</label>
                     </td>
                     <td>
                        <input type="description" class="form-control" placeholder="description" id="description" name="description" value="<?php if(isset($description)) { echo $description; } ?>" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
                        <label for="mdp">Colorie :</label>
                     </td>
                     <td>
                        <input type="couleur" class="form-control" placeholder="couleur" id="couleur" name="couleur" />
                     </td>
                  </tr>
                  <tr>
                     <td align="right">
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
                     <td align="right">
                        <label for="photo">Image de l'article :</label>
                     </td>
                     <td>
                        <input type="photo" class="form-control" placeholder="Image de l'article" id="photo" name="photo" />
                     </td>
                  </tr>
                  <tr>
                     <td>
                     <br />
                        <input type="submit" class="btn btn-primary" name="newproduct" value="Ajoutez!" />
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