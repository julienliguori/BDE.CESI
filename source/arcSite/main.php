<?php 

$prix = 12;
$titre = "Titre titre";
$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a sapien ut massa vulputate luctus. Phasellus ut justo eget ipsum.";
$photo= "briquet.jpg"
?>

<div class="container">
    <div class="row">
        <?php echo '
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="/source/img/boutique/imgmemeformat/' . $photo . '" alt="">
                <div class="card-body">
                <p class="card-text">' . $description . '</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button>
                    </div>
                    <small class="text-muted">' . $prix . '</small>
                </div>
                </div>
            </div>
        </div>
        ' ?>
    </div>
</div>