<?php



if(isset($_POST["valider"]))
{
    if(!empty($_POST["emailV"]))
    {
        $mail=htmlspecialchars($_POST["emailV"]);

        echo $mail;

        $compare=explode("@",$mail);

        //echo $compare;

        //echo $compare[1];

        if($compare == "viacesi.fr" || $compare == "cesi.fr")
        {
            //echo "ne marche pas";

            //header('Location: http://bde.cesi/pages/home.php');
        }
        else
          {
            //echo "ne marche pas";
             //$erreur="Email non valide";
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

      <?php include('.././site/dependances.php');?>
      <title>Connexion</title>
      <meta charset="utf-8">

   </head>

   <body>

    <main>


    <form method="POST" action="" class="center" style="float:left;">

    <input class="form-control" type="email" name="emailV" placeholder="Mail" />
    <input class="btn btn-primary" type="submit" name="valider" value="Valider" />

    </form>


    </main>
     

   </body>

</html>