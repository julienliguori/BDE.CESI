<?php 
session_start();

if(isset($_SESSION['id'])){
    echo "Connecté.";
}
else{
    echo "Non connecté.";
}?>