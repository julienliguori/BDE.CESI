<h2>Photo</h2>
<?php
    $auj = date("Y-m-j");
    $nomi = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $nom = $nomi . $prenom;
    
    
$idE = $_GET['id'];
if(isset($_GET['id']) AND !empty($_GET['id'])){ 
    if(!empty($_SESSION['id']) AND !empty($_SESSION['status']) AND !empty($_SESSION['prenom']) AND !empty($_SESSION['nom'])){
        if($_SESSION['status'] == "Salarier" OR $_SESSION['status'] == "Etudiant" OR $_SESSION['status'] == "Membre BDE"){
            if (isset($_POST['new_event'])) {
            $description = htmlspecialchars($_POST['new_description']);
        
                if(isset($_FILES['urlImage']) AND !empty($_FILES['urlImage']['name'])) {
                    $tailleMax = 2097152;
                    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                    if($_FILES['urlImage']['size'] <= $tailleMax) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES['urlImage']['name'], '.'), 1));
                    if(in_array($extensionUpload, $extensionsValides)) {
                        $chemin = "../../source/img/commentaire/".$nom.$auj.".".$extensionUpload;
                        $resultat = move_uploaded_file($_FILES['urlImage']['tmp_name'], $chemin);
                        if($resultat) {
                                $_POST['urlImage']= $nom.$auj.".".$extensionUpload;
                                //'id' => $_SESSION['id']
                                
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
                    'nomClient' => $nom,
                    'idEvenement' => $idE
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

                if (!empty($_POST['urlImage']) and !empty($_POST['new_description']) and !empty($nom)){
                    //header('Location: #');
                    return file_get_contents('http://localhost:8081/evenement/commentairephoto/', false, $context);
                } else {
                    $erreur = "Tous les champs doivent être complétés !";
                }
                                

            }
        }
    }
    $url = "http://localhost:8081/evenement/commentairephoto/idEvenement/=/$idE";
    $json = '{"data": ' . file_get_contents($url) . ' }';
    $parsed_json = json_decode($json,true);
}
?>
    <form method="POST" action="" enctype="multipart/form-data">

                <label>Nouvelle photo</label><br/>
                <textarea class="form-control" id="message-text" name="new_description" value="Titre de la photo"></textarea><br/>                
                <input type="file"name="urlImage">
                <br/><br/><input type="submit" class="btn btn-primary" name="new_event" value="Ajouter" />
                <?php

                    // <div class="custom-file">
                    // <input type="file" class="custom-file-input" id="inputGroupFile04" name="urlImage" aria-describedby="inputGroupFileAddon04">
                    // <label class="custom-file-label" for="inputGroupFile04"></label>
                    // </div><br/><br/>
                ?>
    </form>
    <br/>
    <br/>
   

    <?php 
    foreach ($parsed_json['data'] as $data) {
    ?>
        <?php 
                echo'<div class="card mb-3">
                    <img src="../../source/img/commentaire/'. $data['img'] .'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'. $data['description'] .'</h5>
                        <p class="card-text">Poster par ' . $data['nomClient'] .'</p>';
                        if($_SESSION['status'] == 'Salarier'){
                            include("../../pages/administration/rapport.php");
                        }
                     echo'</div>
                    </div>';

        ?>
    <?php } ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
