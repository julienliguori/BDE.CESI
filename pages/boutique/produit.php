<?php


/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term']));

/*$term="poulet";*/

echo $term;

// jQuery wants JSON data
/*echo json_encode($a_json);

echo $a_json;*/

/*var_dump(a_json);*/

flush();
 

?>
