<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        include('../../source/site/dependances.php'); 
        include_once('../../source/authentification/connexioncookie.php');
        include("../../source/site/header_interface.php");
    ?>
    <title>Événements</title>
</head>
<body>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Dates</th>
      <th scope="col">Lieux</th>
      <th scope="col">Participer</th>
    </tr>
  </thead>
  <tbody>
  <?php
     $increment = 0;
     $element = 'date';
     $condition = date("Y-m-j");
     $options = array(
        'http'=> array(
            'method' => 'GET',
            'header'=> "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g", 
                       "Content-Type: application/json",
        )
    );

    $context = stream_context_create($options);
    //  echo ($condition);
     $url = "http://localhost:8081/evenement/evenement/$element/>=/$condition";
    $json = '{"data": ' . file_get_contents($url, false, $context) . ' }'; 
    //echo($json);
    $parsed_json = json_decode($json,true);
    //var_dump($parsed_json);






        foreach ($parsed_json['data'] as $data) {
            ?>
        <?php 
            $increment++; 
            echo 
            '<tr>
            <th scope="row">' . $increment . '</th>
            <td>' . $data["nom"] .' </td>
            <td>' . $data["description"] .'</td>
            <td>' . substr($data["date"], 0, 10) .'</td>
            <td>' . $data["lieux"] .'</td>
            <td><a href="/pages/evenement/evenement_article.php?id='. $data['idEvenement'] . '&A=0" ><button  type="button" class="btn btn-warning">Participer</button></a></td>
            </tr>'
        ?>
    <?php } ?>
    </tbody>
</table>
</div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>