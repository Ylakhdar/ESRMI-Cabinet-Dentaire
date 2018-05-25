<?php

require_once 'frame/Controleur.php';
require_once 'model/Employe.php';

/**
 * Contrôleur gérant la connexion au site
 *
 */
class ControleurConnexion extends Controleur
{
    private $employe;

    public function __construct()
    {
        $this->employe = new Employe();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("matricule") && $this->requete->existeParametre("mdp")) {
            $matricule = $this->requete->getParametre("matricule");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->employe->connecter($matricule, $mdp)) {
                $this->accueillirEmploye($matricule, $mdp);
            }
            else
                $this->genererVue(array('msgErreur' => 'Employe inconnu'),
                        "index");
        }
        else
            throw new Exception("Action impossible : matricule ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
    }

    public function inscrire()
    {
        if ($this->requete->existeParametre("nom") && $this->requete->existeParametre("prenom") &&
                $this->requete->existeParametre("adresse") && $this->requete->existeParametre("codePostal") &&
                $this->requete->existeParametre("ville") && $this->requete->existeParametre("matricule") &&
                $this->requete->existeParametre("mdp")) {
            $nom = $this->requete->getParametre("nom");
            $prenom = $this->requete->getParametre("prenom");
            $adresse = $this->requete->getParametre("adresse");
            $codePostal = $this->requete->getParametre("codePostal");
            $ville = $this->requete->getParametre("ville");
            $matricule = $this->requete->getParametre("matricule");
            $mdp = $this->requete->getParametre("mdp");

            $this->employe->ajouterEmploye($nom, $prenom, $adresse, $codePostal,
                    $ville, $matricule, $mdp);
            $this->accueillirEmploye($matricule, $mdp);
        }
        else
            throw new Exception("Action impossible : tous les paramètres ne sont pas définis");
    }

    /**
     * Enregistre un employe connecté dans la session et redirige vers la page d'accueil
     * 
     * @param type $matricule
     * @param type $mdp
     */
    private function accueillirEmploye($matricule, $mdp)
    {
        $employe = $this->employe->getEmploye($matricule, $mdp);
        $this->requete->getSession()->setAttribut("employe", $employe);
        $this->rediriger("accueil");
    }

}
