<?php

require_once 'frame/Modele.php';

/**
 * Services liés aux Villes
 */
class Ville extends Modele
{
	/**
	 * Renvoie la liste des villes pré-enregistrées
	 * @return liste ville 
	 */
    public function getVille()
    {
        $sql   = "select * from ville";
        $ville = $this->executerRequete($sql);
        return $ville->fetchAll(PDO::FETCH_ASSOC); 
    }
}