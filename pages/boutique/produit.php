<?php

$server = 'localhost';
$user  = 'root';
$password = '';
$database = 'bde.cesi';

$mysqli = new MySQLi($server,$user,$password,$database);
/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$a_json = array();
$a_json_row = array();
if ($data = $mysqli->query("SELECT * FROM article WHERE nom LIKE '%$term%' ORDER BY nom")) {
	while($row = mysqli_fetch_array($data)) {
		$firstname = htmlentities(stripslashes($row['nom ']));
		$code = htmlentities(stripslashes($row['customercode']));
		$a_json_row["id"] = $code;
		$a_json_row["value"] = $nom;
		$a_json_row["label"] = $nom;
		array_push($a_json, $a_json_row);
	}
}
// jQuery wants JSON data
echo json_encode($a_json);
flush();

$mysqli->close();

http://localhost:8081/boutique/article/nom/=/


?>