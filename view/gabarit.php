<?php  require_once "_Commun/infoClient.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?= $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="include/style.css">
        <link rel="stylesheet" href="include/style_footer.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="include/img/favicon.png">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

        <!-- Titre -->
        <title><?= $titreProjet.'-'. $titre ?></title>
    </head>
    <body>
        <div class="container">
            <?= $contenu ?>
            <?php require_once 'footer.php'; ?>
        </div>
        
        <!-- jQuery -->
        <script src="assets/jquery/jquery-1.10.1.min.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
