<?php session_start();
    $auj = date("Y-m-j");
    $nomi = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $nom = $nomi . $prenom;
    
if (isset($_POST['new_event'])) {
echo "1";
    $description = htmlspecialchars($_POST['new_description']);

    if(isset($_FILES['urlImage']) AND !empty($_FILES['urlImage']['name'])) {
        $tailleMax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['urlImage']['size'] <= $tailleMax) {
           $extensionUpload = strtolower(substr(strrchr($_FILES['urlImage']['name'], '.'), 1));
           if(in_array($extensionUpload, $extensionsValides)) {
              $chemin = "../../source/img/evenement/commentaire/".$nom.$auj.".".$extensionUpload;
              $resultat = move_uploaded_file($_FILES['urlImage']['tmp_name'], $chemin);
              if($resultat) {
                    $_POST['urlImage']= $nom.$auj.".".$extensionUpload;
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
        'img' => $url,
        'description' => $description,
        'nomClient' => $nom
    );

    $arrayJSON = json_encode($array);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => $arrayJSON
        ),
    );
    $context = stream_context_create($options);

    if (!empty($_POST['img']) and !empty($_POST['new_description']) and !empty($nom) and !empty($_POST['new_description'])){
        header('Location: #');
        return file_get_contents('http://localhost:8081/evenement/commentairephoto/', false, $context);
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<html>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <table>
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
                <label for="new_description">Description :</label>
            </td>
            <td>
            <br />
                <textarea type="submit"  name="new_description" value=""></textarea>
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
</body>
</html>