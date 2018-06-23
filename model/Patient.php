<?php

require_once 'frame/Modele.php';

/**
 * Services liés aux paniers
 */
class Patient extends Modele
{

    /**
     * Description
     * @param type $dateCreation 
     * @param type $sexe 
     * @param type $nomPatient 
     * @param type $pernomPatient 
     * @param type $dateNaissancePatient 
     * @param type $adressePatient 
     * @param type $telephonePatient 
     * @param type $emailPatient 
     * @param type $cinPatient 
     * @param type $Allergie 
     * @param type $note 
     * @param type $idVille 
     * @param type $idAssurance 
     * @return void
     */
    public function ajouterPatient($dateCreation,$sexe,$nomPatient,$pernomPatient,$dateNaissancePatient,$adressePatient,$telephonePatient,$emailPatient,$cinPatient,$Allergie,$note,$assureur,$police,$idVille)
    {
        $sql = "insert into patient(dateCreation,sexe,nomPatient,pernomPatient,dateNaissancePatient,adressePatient,telephonePatient,emailPatient,cinPatient,Allergie,note,assureur,police,idVille)
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->executerRequete($sql,
            array($dateCreation,$sexe,$nomPatient,$pernomPatient,$dateNaissancePatient,$adressePatient,$telephonePatient,$emailPatient,$cinPatient,$Allergie,$note,$assureur,$police,$idVille));
    }

}
