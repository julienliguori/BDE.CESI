<?php

if(isset($_POST['newproduct'])) {

   $lieu = htmlspecialchars($_POST['lieux']);
   $date = htmlspecialchars($_POST['date']);
   $description = htmlspecialchars($_POST['description']);
   $nomClient = htmlspecialchars($_POST['nomClient']);

   $array = array(
    'lieux' => $lieux,
    'date' => $date,
    'description' => $description,
    'nomClient' => $nomClient
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

   if(!empty($_POST['lieux']) AND !empty($_POST['date']) AND !empty($_POST['description']) AND !empty($_POST['nomClient'])){
      header('Location: http://bde.cesi/pages/home.php');
      return file_get_contents('http://localhost:8081/idees/boiteidee/', false, $context);
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

<!DOCTYPE html>
<html lang="fr">
   <head>
      <?php include('../../source/site/dependances.php'); ?>

      <title>Nouvelle idée</title>
   </head>
   <body>
      <header>
         <?php include('../../source/site/header_interface.php'); ?>
      </header>

      <main>
         <div style = "text-align:center" style="margin-left:50% text-align:center;">
            <h2 style="padding-top: 20px; margin-bottom:-30px">Ajouter une idée</h2>
            <br/><br />

            <div class="container" style="width: 420px;margin: 0 auto;">
                <form method="POST" action="" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td style = "text-align:right">
                                <label for="nom">Lieux :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Lieux" id="lieux" name="lieux" value="<?php if(isset($lieux)) { echo $lieux; } ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="nom">Date :</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" placeholder="Date" id="date" name="date" value="<?php if(isset($date)) { echo $date; } ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="nom">Description :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Description" id="description" name="description" value="<?php if(isset($description)) { echo $description; } ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="nom">Nom de l'organisateur :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Organisateur" id="nomClient" name="nomClient" value="<?php if(isset($nomClient)) { echo $nomClient; } ?>" />
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