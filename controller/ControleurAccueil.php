<?php

require_once 'ControleurPersonnalise.php';

/**
 * Contrôleur de la page d'accueil
 * 
 */
class ControleurAccueil extends ControleurPersonnalise {

    /**
     * Affiche la page d'accueil
     */
    public function index() {;
        $this->genererVue();
    }

}
