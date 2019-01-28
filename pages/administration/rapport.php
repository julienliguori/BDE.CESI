<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

if (isset($_POST['newproduct'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $description = htmlspecialchars($_POST['description']);
    $pub = ($_SESSION['prenom'] . " " . $_SESSION['nom']);

    $array = array(
        'nom' => $nom,
        'description' => $description,
        'publicateur' => $pub,
    );

    $arrayJSON = json_encode($array);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => $arrayJSON,
        ),
    );
    $context = stream_context_create($options);

    if (!empty($_POST['description']) and !empty($_POST['nom'])) {

        header('Location: http://bde.cesi/pages/home.php');
        return file_get_contents('http://localhost:8081/evenement/signaler/', false, $context);
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}   

?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Signalez !</button> 
<form method="POST" action="" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nouveau signalement</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Problème: </label>
            <input type="text" class="form-control" id="recipient-name" name="nom">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description: </label>
            <textarea class="form-control" id="message-text" name="description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" name="newproduct" class="btn btn-primary">Envoi</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>