<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php  
        
        include('../../source/site/dependances.php'); 
        include_once('../../source/authentification/connexioncookie.php');
        include("../../source/site/header_interface.php");
    ?>
    <title>Idées</title>
</head>
<body>
    <div class="container" style="padding-top:50px">
    <div class="row">
    <table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Description</th>
        <th scope="col">Dates</th>
        <th scope="col">Lieux</th>
        </tr>
    </thead>
  <tbody>
    <?php

    $options = array(
        'http'=> array(
            'method' => 'GET',
            'header'=> "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g", 
                    "Content-Type: application/json",
        )
    );

    $context = stream_context_create($options);

    $increment = 0;
    $element = 1;
    $condition = 1;
    $url = "http://localhost:8081/idees/boiteidee/$element/%3E=/$condition";
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
            <td>' . $data["description"] .'</td>
            <td>' . substr($data["date"], 0, 10) .'</td>
            <td>' . $data["lieux"] .'</td>
            </tr>'
        ?>

         <?php } ?>

    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>