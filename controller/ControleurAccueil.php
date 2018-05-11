<?php

require_once 'ControleurPersonnalise.php';
require_once 'model/Genre.php';

/**
 * Contrôleur de la page d'accueil
 * 
 */
class ControleurAccueil extends ControleurPersonnalise {

    private $genre;
    
    public function __construct() {
        $this->genre = new Genre();
    }
    
    /**
     * Affiche la page d'accueil
     */
    public function index() {
        $genres = $this->genre->getGenres();
        $this->genererVue(array('genres' => $genres));
    }

}
