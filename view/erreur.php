<?php $this->titre = "Erreur !"; ?>

<?php require 'view/_Commun/barreNavigation.php'; ?>

<div class="alert alert-danger">
    <?= $this->nettoyer($msgErreur) ?>
</div>
