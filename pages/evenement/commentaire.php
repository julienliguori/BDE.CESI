<h2>Commentaires</h2>
<?php

$idE = $_GET['id'];
if(isset($_GET['id']) AND !empty($_GET['id'])){ 
if(!empty($_SESSION['id']) AND !empty($_SESSION['status']) AND !empty($_SESSION['prenom']) AND !empty($_SESSION['nom'])){
    if($_SESSION['status'] == "Salarier" OR $_SESSION['status'] == "Etudiant" OR $_SESSION['status'] == "Membre BDE"){
        if(isset($_POST['description']) AND !empty($_POST['description'])){
                
                $commentaire = htmlspecialchars($_POST['description']);
                $pub = ($_SESSION['prenom'] . " " . $_SESSION['nom']);

                
                    $array = array(
                        'description' => $commentaire,
                        'nomClient' => $pub,
                        'idEvenement' => $idE,
                    );
                
                    $arrayJSON = json_encode($array);
                    $options = array(
                        'http'=> array(
                            'method' => 'POST',
                            'header'=> "Content-Type: application/json\r\n" .
                                       "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g\r\n",
                            'content' => $arrayJSON
                        )
                    );
                
                    $context = stream_context_create($options);
                
                    if (!empty($_POST['description']) and !empty($pub) and !empty($idE)) {
                
                        //header('Location: #');
                        return file_get_contents('http://localhost:8081/evenement/commentaireevent/', false, $context);
                        $valider = "Votre commentaire a bien été posté !"; 

                    } else {
                        $erreur = "Tous les champs doivent être complétés !";
                    }
                }  else{
                    //$erreur = "Tous les champs doivent être complétés 2 !";
                } 
                
                



        }else {
            $erreur = "Il faut étre connecter !";
        }

    }
} else {
    $erreur = "Vous ne pouvez pas poster de commentaire ici :) !";
}
    $options = array(
        'http'=> array(
            'method' => 'GET',
            'header'=> "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g", 
                    "Content-Type: application/json",
        )
    );
    
    $context = stream_context_create($options);
                        
    $url = "http://localhost:8081/evenement/commentaireevent/idEvenement/=/$idE";
    $json = '{"data": ' . file_get_contents($url, false, $context) . ' }';
    $parsed_json = json_decode($json,true);
?>
<form method="POST">
    <label>Nouveau Commentaire</label><br/>
    <textarea class="form-control" id="message-text" name="description"></textarea><br/>
    <input type="submit" class="btn btn-primary" valeur="Poster" name="submit_commentaire"/>
</form>
<?php
        if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
        if(isset($valider)) {
            echo '<font color="green">'.$valider."</font>";
         }
         ?>
    <br/>
<?php 
    foreach ($parsed_json['data'] as $data) {
    ?>
        <b><?php echo $data["nomClient"]; ?> :</b> <?php echo $data['description']; ?><br/>
    <?php } ?>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>


