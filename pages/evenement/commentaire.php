session_start();

<h2>Commentaires</h2>
<?php
if(!empty($_SESSION['id']) AND !empty($_SESSION['status'])){
    if($_SESSION == "Salarier" OR $_SESSION == "Etudiant" OR $_SESSION == "Membre BDE"){
        if(isset($_POST['description']) AND !empty($_POST['description'])){
                $
        } else {
            $erreur = "Veuillez remplir les champs !"
        }

    }
}
?>
<form method="POST">
    <label>Nouveau Commentaire</label><br/>
    <textarea class="form-control" id="message-text" name="description"></textarea><br/>
    <input type="submit" valuer"Poster" name="submit_commentaire"/>
</form>


<?php
           if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>