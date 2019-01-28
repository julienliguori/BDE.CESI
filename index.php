<?php



if(isset($_POST["valider"]))
{
    if(!empty($_POST["emailV"]))
    {
        $mail=htmlspecialchars($_POST["emailV"]);

        $compare=explode("@",$mail);


        if($compare[1] == "viacesi.fr" || $compare[1] == "cesi.fr")
        {
            header('Location: http://bde.cesi/pages/home.php');
        }
        else if($compare[1] =! "viacesi.fr" || $compare[1] =! "cesi.fr")
          {
            $erreur="Email non valide";
          }
        
    }
    

}

if(isset($erreur)) {
    echo '<font color="red">'.$erreur."</font>";
 }

?>

<!DOCTYPE html>
<html lang="fr">
   <head>

      <title>Connexion</title>
      <meta charset="utf-8">

      <style type="text/css">

      #portail
      {
        position:absolute;
        top:40%;
        margin-left:40%;
      }

      </style>

   </head>

   <body>

        <form method="POST" action="" class="center" id="portail">

        <input class="form-control" type="email" name="emailV" placeholder="Mail" id="email_valide" required/>
        <span id="missEmail"></span>
        <input class="btn btn-primary" type="submit" name="valider" value="Valider" id="bouton_valide" />
        </form>

        <script>

        var formValid = document.getElementById('bouton_valide');
        var emailValid = document.getElementById('email_valide');
        var missEmail = document.getElementById('missEmail');

        formValid.addEventListener('click', validation);

        function validation(event)
        {
            if(emailValid.validity.valueMissing)
            {
                event.preventDefault();
                missEmail.textContent = "Email manquant";
                missEmail.style.color = "red";
            }
        }

        </script>
   </body>

</html>