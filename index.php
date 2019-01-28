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

      <?php include('.././site/dependances.php');?>
      <title>Connexion</title>
      <meta charset="utf-8">

   </head>

   <body>

       <header>
         <?php include('.././site/header_interface.php'); ?>
       </header>


    <main>


    <form method="POST" action="" class="center" style="float:left;">

    <input class="form-control" type="email" name="emailV" placeholder="Mail" />
    <input class="btn btn-primary" type="submit" name="valider" value="Valider" />

    </form>


    </main>
     
    <footer><?php include('.././site/footer_interface.php');?></footer>

   </body>

</html>