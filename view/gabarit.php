<?php
require_once 'frame/Configuration.php';
$titreProjet = Configuration::get("titreProjet");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?= $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/mystyles/style.css">
        <link rel="stylesheet" href="assets/mystyles/style-footer.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="include/img/favicon.png">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

         <!-- datatable -->
        <link rel="stylesheet" href="assets/datatable-1.10.18/css/jquery.dataTables.min.css">       

        <!-- Titre -->
        <title><?= $titreProjet .'-'. $titre ?></title>
    </head>
    <body>
        <div class="container-fluid">
            <?= $contenu ?>
            <?php require_once 'footer.php'; ?>
        </div>
        
        <!-- jQuery -->
        <script src="assets/jquery/jquery-3.3.1.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" src="assets/datatable-1.10.18/js/jquery.dataTables.min.js"></script>

    </body>       
    <script type="text/javascript">
      $(document).ready(function() {
          $('#listeRdvEnAttente').dataTable({
            "bProcessing": true,
            "sAjaxSource": "post_table.php",
            "aoColumns": [
                  { mData: 'patient' } ,
                  { mData: 'motif' },
                  { mData: 'attente' },
                  { mData: 'docteur' }
                ]
          });  
      });
    </script>
</html>
