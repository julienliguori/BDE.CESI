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
        <th scope="col">Réactions</th>
        </tr>
    </thead>
  <tbody>
    <?php
    $increment = 0;
    $element = 1;
    $condition = 1;
    $url = "http://localhost:8081/idees/boiteidee/$element/%3E=/$condition";
    $json = '{"data": ' . file_get_contents($url) . ' }'; 
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
            <td><button href="#" type="button" class="btn btn-warning">Warning</button></td>
            </tr>'
        ?>

         <?php } ?>

    </div>
</div>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</body>
</html>