<?php

require_once 'ControleurSecurise.php';
require_once 'model/Employe.php';
require_once 'model/Rdv.php';

/**
 * Contrôleur des actions liées aux RDV 
 * 
 */
class ControleurRdv extends ControleurSecurise
{
    private $rdv;

    public function __construct()
    {
        $this->rdv = new Rdv();
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
