<?php
session_start();

$statusSet = "Membre BDE";

$bdd = new PDO('mysql:host=;dbname=espace_membre', 'root', '');

if(isset($_SESSION['id'])) {
    if($_SESSION['status'] == $statusSet){
        if(isset($_POST['addmail']) AND 1== 1 ){ //a completer

        $insert = $bdd->prepare("UPDATE membres SET Status = ? WHERE Mail = ?");
        $insert->execute(array($statusSet, $_SESSION['mail']));
        }else  $msg = "Adresse mail invalide !";
    }else {
   header('Location: ../../authentification/profil.php?id='.$_SESSION['id']);
}
?>
<html>
    <head>
            <title>Ajout de membre au BDE</title>
             <meta charset="utf-8">
    </head>

    <body>
        <div align="center">
        <h2>Ajout de membre au BDE</h2>
         <br /><br />
            <form method="POST" action=""">
                <table>
                    <tr>
                        <td align="right">
                            <label>Mail :</label>
                        </td>
                        <td> 
                            <input type="email" name="addmail" placeholder="Mail" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <br/>  
                            <input type="submit" value="Ajouter ce membre au bde !" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
            <?php if(isset($msg)) { echo $msg; } ?>
    </body>
</html>
<?php   
}
else {
   header("Location: ../../Authentification/connexion.php");
}
?>