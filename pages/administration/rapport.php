<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

if (isset($_POST['newproduct'])) {

    $lieu = htmlspecialchars($_POST['lieux']);
    $date = htmlspecialchars($_POST['date']);
    $description = htmlspecialchars($_POST['description']);
    $nomClient = htmlspecialchars($_POST['nomClient']);

    $array = array(
        'lieux' => $lieux,
        'date' => $date,
        'description' => $description,
        'nomClient' => $nomClient,
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

    if (!empty($_POST['lieux']) and !empty($_POST['date']) and !empty($_POST['description']) and !empty($_POST['nomClient'])) {

        header('Location: http://bde.cesi/pages/home.php');
        return file_get_contents('http://localhost:8081/idees/boiteidee/', false, $context);
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}

/*  $fp = fopen('http://localhost:8081/boutique/article/', 'r', false, $context);
fpassthru($fp);
fclose($fp); */
//echo ($arrayJSON);
//echo "chups);

?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Signalez !</button> 
<form method="POST" action="" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau Signalement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Problème: </label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description: </label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Envoi</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>