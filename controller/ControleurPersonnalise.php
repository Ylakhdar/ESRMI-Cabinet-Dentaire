<?php

require_once 'frame/Controleur.php';
require_once 'model/Rdv.php';

/**
 * Contrôleur abstrait pour les vues devant afficher les infos employe
 * 
 */
abstract class ControleurPersonnalise extends Controleur
{
    /**
     * Redéfinition permettant d'ajouter les infos employes aux données des vues 
     * 
     * @param type $donneesVue Données dynamiques
     * @param type $action Action associée à la vue
     */
    protected function genererVue($donneesVue = array(), $action = null)
    {
        $employe = null;
        $nbPatientEnAttente = 0;
        // Si les infos employe sont présente dans la session...
        if ($this->requete->getSession()->existeAttribut("employe")) {
            // ... on les récupère ...
            $employe = $this->requete->getSession()->getAttribut("employe");
            // pour les secretaires et doncteur en affiche le nb des patients en salle d'attente
            $listePoste = array('Docteur','Secretaire');
            if (in_array($employe['poste'], $listePoste)){
                $listeRdv = new Rdv();
                $nbPatientEnAttente = $listeRdv->getNbRdv("en cours");
            }
        }
        // ... et on les ajoute aux données de la vue
        parent::genererVue($donneesVue + array('employe' => $employe, 'nbPatientEnAttente' => $nbPatientEnAttente), $action);
    }

}