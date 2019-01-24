<!doctype html>
<html>
<head>
<meta charset="iso-8859-1" />

<title>Barre de recherche</title>

<!-- inclusion du style CSS de base -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
</head>

<body>
<form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-warning my-2 my-sm-0 " id="recherche" type="submit">Search</button>

    

    <?php 
    
    var liste = [
        "Draggable",
        "Droppable",
        "Resizable",
        "Selectable",
        "Sortable"
    ];
    
    $('#recherche').autocomplete({ source : liste}); 
    
    ?>
    
    

  </form>

<!-- inclusion des libraries jQuery et jQuery UI (fichier principal et plugins) -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

</body>
</html>