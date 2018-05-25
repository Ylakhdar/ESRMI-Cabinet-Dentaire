<?php

require_once 'ControleurSecurise.php';
require_once 'model/Employe.php';

/**
 * Contrôleur des actions liées aus employes
 * 
 */
class ControleurEmploye extends ControleurSecurise
{
    private $employe;

    public function __construct()
    {
        $this->employe = new Employe();
    }

    /**
     * Affiche la page de modification des infos employe
     */
    public function index()
    {
        $this->genererVue();
    }

    /**
     * Modifie les infos employe
     * 
     * @throws Exception S'il manque des infos employes
     */
    public function modifier()
    {
        if ($this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom") &&
                $this->requete->existeParametre("adresse") && $this->requete->existeParametre("codePostal") &&
                $this->requete->existeParametre("ville") && $this->requete->existeParametre("courriel") &&
                $this->requete->existeParametre("mdp")) {

            $nom = $this->requete->getParametre("nom");
            $prenom = $this->requete->getParametre("prenom");
            $adresse = $this->requete->getParametre("adresse");
            $codePostal = $this->requete->getParametre("codePostal");
            $ville = $this->requete->getParametre("ville");
            $courriel = $this->requete->getParametre("courriel");
            $mdp = $this->requete->getParametre("mdp");
            
            $employe = $this->requete->getSession()->getAttribut("employe");
            $idEmploye = $employe['idEmploye'];
            $this->employe->modifierEmploye($idEmploye, $nom, $prenom, $adresse, $codePostal,
                    $ville, $courriel, $mdp);
            
            $employe = $this->employe->getEmployeParId($idEmploye);
            $this->requete->getSession()->setAttribut("employe", $employe);
            $this->genererVue();
        }
        else
            throw new Exception("Action impossible : tous les paramètres ne sont pas définis");
    }

}
