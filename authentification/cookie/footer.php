<?php
// var_dump($_COOKIE);

if(isset($_COOKIE['accept_cookie'])) {
   $showcookie = false;
} else {
   $showcookie = true;
}
require_once('page.php');
?>