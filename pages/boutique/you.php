<!doctype html>
<html>
<head>

<title>Barre de recherche</title>


<!-- JS file -->
<script src="path/to/jquery.easy-autocomplete.min.js"></script> 

<!-- CSS file -->
<link rel="stylesheet" href="path/to/easy-autocomplete.min.css"> 

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="path/to/easy-autocomplete.themes.min.css"> 

<!-- jQuery CDN -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

</head>

<body>

<input id="basics" />

<script>

var options = {
	data: ["blue", "green", "pink", "red", "yellow"]
};

$("#basics").easyAutocomplete(options);

</script>

</body>
</html>

