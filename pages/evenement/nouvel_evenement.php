<?php
session_start(); ?>
<?php
 if(isset($_SESSION['status'])){
    if($_SESSION['status'] != 'Membre BDE'){
    header('Location: /../pages/home.php');
    }else{
if (isset($_POST['new_event'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $date = htmlspecialchars($_POST['date']);
    $lieux = htmlspecialchars($_POST['lieux']);
    $description = htmlspecialchars($_POST['description']);
    $nbPlace = htmlspecialchars($_POST['nbPlace']);
    $nomMembre = htmlspecialchars($_POST['nomMembre']);

    if(isset($_FILES['urlImage']) AND !empty($_FILES['urlImage']['name'])) {
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['urlImage']['size'] <= $tailleMax) {
           $extensionUpload = strtolower(substr(strrchr($_FILES['urlImage']['name'], '.'), 1));
           if(in_array($extensionUpload, $extensionsValides)) {
              $chemin = "../../source/img/boutique/ImgMemeFormat/".$nom.".".$extensionUpload;
              $resultat = move_uploaded_file($_FILES['urlImage']['tmp_name'], $chemin);
              if($resultat) {
                    $_POST['urlImage']= $nom.".".$extensionUpload;
                    //'id' => $_SESSION['id']
                    
                // header('Location: profil.php?id='.$_SESSION['id']);
              } else {
                 $msg = "Erreur durant l'importation de votre image";
              }
           } else {
              $msg = "Votre image doit être au format jpg, jpeg, gif ou png";
           }
        } else {
           $msg = "Votre image ne doit pas dépasser 2Mo";
        }
     }

    $url = htmlspecialchars($_POST['urlImage']);

    $array = array(
        'nom' => $nom,
        'date' => $date,
        'lieux' => $lieux,
        'urlImage' => $url,
        'description' => $description,
        'nbPlace' => $nbPlace,
        'nomMembre' => $nomMembre
    );

    $arrayJSON = json_encode($array);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json",
                        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g",
            'content' => $arrayJSON
        ),
    );
    $context = stream_context_create($options);

    if (!empty($_POST['date']) and !empty($_POST['lieux']) and !empty($_POST['urlImage']) and !empty($_POST['description']) and !empty($_POST['nbPlace'])){
        header('Location: http://bde.cesi/pages/home.php');
        return file_get_contents('http://localhost:8081/evenement/evenement/', false, $context);
    } else {
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
      <?php include '../../source/site/dependances.php';
        include_once('../../source/authentification/connexioncookie.php');
        ?>

      <title>Ajout ~ Événement</title>
   </head>
   <body>
      <header>
         <?php include '../../source/site/header_interface.php';?>
      </header>

      <main>
         <div style = "text-align:center" style="margin-left:50% text-align:center;">
            <h2 style="padding-top: 20px; margin-bottom:-30px">Ajouter un événement</h2>
            <br/><br />

            <div class="container" style="width: 420px;margin: 0 auto;">
                <form method="POST" action="" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td style = "text-align:right">
                                <label for="nom">Titre :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="nom" id="nom" name="nom" value="<?php if (isset($nom)) {echo $nom;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="lieux">Lieux :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Lieux" id="lieux" name="lieux" value="<?php if (isset($lieux)) {echo $lieux;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="description">Description :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Description" id="description" name="description" value="<?php if (isset($description)) {echo $description;}?>" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style = "text-align:right">
                                <label for="date">Date :</label>
                            </td>
                            <td>
                                <input type="date" class="form-control" placeholder="Date" id="date" name="date" value="<?php if (isset($date)) {echo $date;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right;">
                                <label for="nomMembre">Dirigé par :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Organisateur" id="nomMembre" name="nomMembre" value="<?php if (isset($nomMembre)) {echo $nomMembre;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="nbPlace">Places :</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Nombre de places" id="nbPlace" name="nbPlace" value="<?php if (isset($nbPlace)) {echo $nbPlace;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                                <label for="urlImage">Image :</label>
                            </td>
                            <td>
                                <input type="file" id="urlImage" name="urlImage" value="<?php if (isset($urlImage)) {echo $urlImage;}?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align:right">
                            <br />
                                <input type="submit" class="btn btn-primary" name="new_event" value="Ajoutez!" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <?php
                if (isset($erreur)) {
                    echo '<font color="red">' . $erreur . "</font>";
                }
            ?>

         </div>
      </main>
      <footer><?php include("../../source/site/footer_interface.php");?></footer>
   </body>
</html>