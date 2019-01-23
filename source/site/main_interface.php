<div class="black-left-fill-rectangle">
    <p style = "margin-top: 100px; margin-left: 10px; color: white">^^ TU PEUX CLIQUER DESSUS ^^</p>
    <p style = "margin-top: 240px; margin-left: 40px; color: white">Devines..</p>&nbsp;
    <?php 
        /* var_dump(isset($_SESSION)); */
        if($_SERVER['PHP_SELF'] == '/pages/boutique/boutique.php'){
            echo 'Catégorie';
        }
        else if($_SERVER['PHP_SELF'] == '/pages/evenement/events.php'|| $_SERVER['PHP_SELF'] == '/pages/idees/idees.php'){
            echo 'Calendrier';
        }
        else if($_SERVER['PHP_SELF'] == '/pages/home.php'){
            echo 'Acceuil';
        }
        else{
            echo $_SERVER['PHP_SELF'];
        }
    ?>
</div>
<div class="black-left-fill-rectangle"><p style = "margin-top: 150px; margin-left: 10px; color: white">^^ TU PEUX CLIQUER DESSUS ^^</p><p style = "margin-top: 240px; margin-left: 40px; color: white">Devines..</p>&nbsp;</div>
