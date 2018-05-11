<?php

// Contrôleur frontal : instancie un routeur pour traiter la requête entrante

require 'frame/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

