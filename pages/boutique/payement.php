<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/checkout/ -->
<html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php  
    include_once('../../source/authentification/connexioncookie.php');////
    include('../../source/site/dependances.php'); //////
    include("../../source/site/header_interface.php");////
?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./Payement_Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Payement_Bootstrap_files/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./Payement_Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Panier</h2>
        <p class="lead">Entrée vos informations personelles pour pouvoir procéder au payement</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Code Promo</h6>
                <small>EXEMPLE/small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Entrée</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Coordonnées</h4>
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Prénom valide requis
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nom</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Nom valide Requis
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Entrée une adresse mail valide
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Addresse</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Entrée votre adresse svp
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Addresse 2 <span class="text-muted">(Optionel)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pays</label>
                <select class="custom-select d-block w-100" id="country" required="">
                  <option value="">Choose...</option>
                  <option></option>
                </select>
                <div class="invalid-feedback">
                  Entrée un pays valide
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Etat</label>
                <select class="custom-select d-block w-100" id="state" required="">
                  <option value="">Choose...</option>
                  <option></option>
                </select>
                <div class="invalid-feedback">
                  Entrée un lieu valide
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip Code demandé
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">L'adresse de livraison est la même que celle indiqué</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Enregistré les infos</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payement</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Carte de Crédit</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Debit Carte</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nom sur la Carte</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Ecrire le nom complet</small>
                <div class="invalid-feedback">
                  Le Nom sur la Carte est demandée
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Numéro de Carte</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                  Numéro de Carte de crédit demandé
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback">
                  Session expirée
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                  Code de sécurité demandé
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continuer à chercher</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <?php include("../../source/site/footer_interface.php");?>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Payement_Bootstrap_files/jquery-3.2.1.slim.min.js.téléchargement" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Payement_Bootstrap_files/popper.min.js.téléchargement"></script>
    <script src="./Payement_Bootstrap_files/bootstrap.min.js.téléchargement"></script>
    <script src="./Payement_Bootstrap_files/holder.min.js.téléchargement"></script>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script> 
  

</body>
</html>