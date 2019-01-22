<?php
session_start();

$time_c=365*24*3600;
setcookie('email','',time()+$time_c,null,null,false,true);
setcookie('password','',time()+$time_c,null,null,false,true);
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>