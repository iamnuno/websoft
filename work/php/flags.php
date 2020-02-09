<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Flags</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="favicon.ico">
    </head>

    <body id="body">
        
        <?php include "view/header.php";?>
        
        <div class="flags_wrapper">
            <div class="flag">
                <a id="france_link" href="#france">France</a>
                <div id="france_flag" class="colors_wrapper">
                  <div class="france_1"></div>
                  <div class="france_2"></div>
                  <div class="france_3"></div>
                </div>

            </div>
            <div class="flag">
              <a id="italy_link" href="#italy">Italy</a>
              <div id="italy_flag" class="colors_wrapper">
                <div class="italy_1"></div>
                <div class="italy_2"></div>
                <div class="italy_3"></div>
              </div>

            </div>
            <div class="flag">
              <a id="belgium_link" href="#belgium">Belgium</a>
              <div id="belgium_flag" class="colors_wrapper">
                <div class="belgium_1"></div>
                <div class="belgium_2"></div>
                <div class="belgium_3"></div>
              </div>
            </div>
        </div>

        <?php include "view/footer.php";?>

        <img id="duck" class="duck" src="img/duck.png" alt="duck image">

        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
