<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?= $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="include/style.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="include/img/favicon.png">

        <!-- Titre -->
        <title>PHP Music Store - <?= $titre ?></title>
    </head>
    <body>
        <div class="container">
            <?= $contenu ?>

            <footer class="well well-sm">
                <p class="text-center">Le PHP Music Store est un site à vocation pédagogique construit avec PHP, HTML5, CSS et Bootstrap.</p>
            </footer>
        </div>
        
        <!-- jQuery -->
        <script src="assets/jquery/jquery-1.10.1.min.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
