<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
        include_once('../../source/authentification/connexioncookie.php');
        include('../../source/site/dependances.php'); 
    ?>
    <title>Admin</title>
</head>
<body>
    <header><?php include('../../source/site/header_interface.php'); ?></header>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#membersDataTable').dataTable();
        });
    </script>

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
</html>

