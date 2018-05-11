<?php $this->titre = "Accueil"; ?>

<?php require 'view/_Commun/barreNavigation.php'; ?>

<ul class="breadcrumb">
    <li><span class="glyphicon glyphicon-home"></span> <a href="">Accueil</a></li>
</ul>

<div class="row">
    <nav class="col-md-3 col-sm-4">
        <?php require 'view/_Commun/menuNavigation.php'; ?>
    </nav>

    <!-- Partie principale de la page d'accueil -->
    <div class="col-md-9 col-sm-8">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" id="imgAccueil" src="include/img/BannerFIB.png" />
            </div>
            <div class="col-md-6">
                <h2>Music Is Life <span class="glyphicon glyphicon-headphones"></span><br> <small>Bienvenue sur le PHP Music Store !</small></h2>
            </div>
        </div>
    </div>
</div>
