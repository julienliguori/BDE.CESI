<div class="black-left-fill-rectangle">
    
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
