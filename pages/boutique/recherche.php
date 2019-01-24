<?php

    $recherche = "pou";

    $url = "http://localhost:8081/boutique/article/nom/LIKE/$recherche";
    $json = '{"data": ' . file_get_contents($url) . ' }'; 
    echo($json);

?>