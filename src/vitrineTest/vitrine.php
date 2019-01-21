<!doctype html>
<html lang='fr'>

<head>
    <?php include('../site/dependances.php') ?>

    <title>vitrineTest</title>

    </head>

    <body>
        <header>
            <?php include('../site/header_interface.php') ?>
        </header>

        <main>
            <?php include('../site/main_interface.php') ?>

            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                <div id="myDropdown" class="dropdown-content">
                  <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                  <a href="#about">About</a>
                  <a href="#base">Base</a>
                  <a href="#blog">Blog</a>
                  <a href="#contact">Contact</a>
                  <a href="#custom">Custom</a>
                  <a href="#support">Support</a>
                  <a href="#tools">Tools</a>
                </div>
              </div>
        </main>

        <footer>
            <div id="copyright" class="copyright"></div>
        </footer>

        <script src="./assets/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>

</html>