<?php
session_start(); 

$idEvent = trim(strip_tags($_GET['id']));
$nbParti = trim(strip_tags($_GET['nbParti']));
$nbPartici = intval($nbParti);
$nbParticipant = $nbPartici + 1;
var_dump($nbParticipant);

$array2 = array(
   'nbParticipant' => $nbParticipant,
);

$array2JSON = json_encode($array2);

$options2 = array(
   'http'=> array(
       'method' => 'PUT',
       'header'=> "Content-Type: application/json\r\n" .
                  "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g\r\n",
       'content' => $array2JSON
   )
);

$context2 = stream_context_create($options2);
var_dump($idEvent);




    $nom = $_SESSION['nom'] . '_' . $_SESSION['prenom'];

         $array = array(
            'idEvenement' => $idEvent,
            'nomClient' => $nom,
        );
      
      //Encode array 
        $arrayJSON = json_encode($array);

      //params convertion
  $options = array(
   'http'=> array(
       'method' => 'POST',
       'header'=> "Content-Type: application/json\r\n" .
                  "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7ImlkIjoxLCJ1c2VybmFtZSI6ImFkbWluQm91dGlxdWUifSwiaWF0IjoxNTQ4NjMwMjQyfQ.v6eCHbT4zqZ-Ymv8rBFtncRLjFJZbFcZvHudfoGUM9g\r\n",
       'content' => $arrayJSON
   )
);

$context = stream_context_create($options);
header('Location: http://bde.cesi/pages/evenement/events.php');
return file_get_contents("http://localhost:8081/evenement/evenement/idEvenement/=/$idEvent", false, $context2);
return file_get_contents('http://localhost:8081/evenement/participer/', false, $context);

?>