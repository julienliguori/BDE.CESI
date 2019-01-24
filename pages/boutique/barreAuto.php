<!doctype html>
<html>
<head>

<title>Barre de recherche</title>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/jquery.ui.autocomplete.html.js"></script>

</head>

<body>

<form action="" method="post">
    <input type="text" placeholder="Name" id="ProduitAutocomplete" class="ui-autocomplete-input" autocomplete="off" />
</form>

<script language="JavaScript" type="text/javascript">

$(document).ready(function($){
    $('#ProduitAutocomplete').autocomplete({
	source:'produit.php', 
	minLength:2
    });
});

</body>
</html>