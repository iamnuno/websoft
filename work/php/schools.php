<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Schools</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="favicon.ico">
    </head>

    <body id="body">
        
        <?php include "view/header.php";?>

        <div class="button_wrapper">
            <p>Fetch schools' information from the selected kommun:
                <select id="kommuner"></select>
            </p>
        </div>
        <table id="table" class="table"></table>

        <?php include "view/footer.php";?>

        <img id="duck" class="duck" src="img/duck.png" alt="duck image">

        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
