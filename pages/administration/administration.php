<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
        include('./download.php');
    ?>
    <title>Credit</title>
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#membersDataTable').dataTable();
        });
    </script>

    <div class='container'>
    <h1>Télécharger l'ensemble des images</h1>
    <form method='post' action=''>
    <input type='submit' name='create' value='Créer fichier .zip' />&nbsp;
    <input type='submit' name='download' value='Télécharger' />
    </form>
    </div>

    <div class="container" style="margin-top:50px">
        <table id="membersDataTable" style="border: 2px solid black">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Julien</td>
                    <td>Concepteur ~ Chef de projet</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hugo</td>
                    <td>Concepteur</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Antonin</td>
                    <td>Concepteur</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Lorenzo</td>
                    <td>Concepteur</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Antoine</td>
                    <td>Concepteur</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
<footer><?php include("../../source/site/footer_interface.php");?></footer>
</html>

<?php 
// Create ZIP file
if(isset($_POST['create'])){
  $zip = new ZipArchive();
  $filename = "./myzipfile.zip";

  if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
  }

  $dir = 'includes/';

  // Create zip
  createZip($zip,$dir);

  $zip->close();
}

// Create zip
function createZip($zip,$dir){
  if (is_dir($dir)){

    if ($dh = opendir($dir)){
       while (($file = readdir($dh)) !== false){
 
         // If file
         if (is_file($dir.$file)) {
            if($file != '' && $file != '.' && $file != '..'){
 
               $zip->addFile($dir.$file);
            }
         }else{
            // If directory
            if(is_dir($dir.$file) ){

              if($file != '' && $file != '.' && $file != '..'){

                // Add empty directory
                $zip->addEmptyDir($dir.$file);

                $folder = $dir.$file.'/';
 
                // Read data of the folder
                createZip($zip,$folder);
              }
            }
 
         }
 
       }
       closedir($dh);
     }
  }
}

// Download Created Zip file
if(isset($_POST['download'])){
 
  $filename = "myzipfile.zip";

  if (file_exists($filename)) {
     header('Content-Type: application/zip');
     header('Content-Disposition: attachment; filename="'.basename($filename).'"');
     header('Content-Length: ' . filesize($filename));

     flush();
     readfile($filename);
     // delete file
     unlink($filename);
 
   }
}
?>