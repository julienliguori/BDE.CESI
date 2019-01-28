<?php  
session_start();
$error = ""; //error holder  
if(isset($_POST['createpdf']))  
{  
  $post = $_POST;   
  $file_folder = "../../source/img/events/"; // folder to load files  
  if(extension_loaded('zip'))  
  {   
        // Checking ZIP extension is available  
        if(isset($post['files']) and count($post['files']) > 0)  
        {   
            // Checking files are selected  
            $zip = new ZipArchive(); // Load zip library   
            $zip_name = time().".zip";           // Zip name  
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)  
            {   
                  // Opening zip file to load files  
                  $error .= "* Sorry ZIP creation failed at this time";  
            }  
            foreach($post['files'] as $file)  
            {
                  $zip->addFile($file_folder.$file); // Adding files into zip  
            }  
            $zip->close();  
            if(file_exists($zip_name))  
            {  
                  // push to download the zip  
                  header('Content-type: application/zip');  
                  header('Content-Disposition: attachment; filename="'.$zip_name.'"');  
                  readfile($zip_name);  
                  // remove zip file is exists in temp path  
                  unlink($zip_name);  
            }  
        }  
        else  
        {  
            $error .= "* Please select file to zip ";  
        }  
  }  
  else  
  {  
        $error .= "* You dont have ZIP extension";  
  }  
  echo $error;
 }  
 ?>  
<!DOCTYPE html>
<html lang="fr">
  <head> 
    <?php 
      include("../../source/site/dependances.php");
      include_once('../../source/authentification/connexioncookie.php');
      include("../../source/site/header_interface.php");
    ?>
        <title>Images Événements</title>  
  </head>  
  <body>  
    <div class="container">  
      <br />  
      <br />  
      <br />  
        <form name="zips" method="post">  
            <?php echo $error; ?>  
            <table class="table table-bordered">  

            <tr>  
              <th>*</th>  
              <th>Nom de l'image</th>  
            </tr>  

            <?php 
            $files = array_filter(scandir('../../source/img/events/'), function($item) {
            return !is_dir('../../source/img/events/' . $item);
            });

            foreach($files as $file) {
              echo'<tr>  
                  <td><input type="checkbox" name="files[]" value='.basename($file).' /></td>  
                  <td>' . basename($file) . '</td>
                  <td><img src="../../source/img/events/'. basename($file) .'" alt="'. basename($file) .'" style="width=100%; max-width:150px"></img>  
                  </tr>';
            }?>  
            <tr>  
              <td colspan="2"><input type="submit" name="createpdf" value="Télécharger en .zip" />&nbsp;  
              <input type="reset" name="reset" value="Réinitialiser" /></td>  
            </tr>  
            </table>  
          </form>  
        </div>  
        <footer><?php include("../../source/site/footer_interface.php");?></footer>
  </body>  
 </html>