<?php

require_once 'frame/Modele.php';
require_once 'include/lib/funct.php';

/**
 * Services liés aux paniers
 */

class Rdv extends Modele
{
    /**
     * Description
     * @param type $hrDebut
     * @param type $hrFin
     * @param type $etat
     * @param type $motif
     * @param type $idPatient
     * @param type $idDocteur
     * @param type $idSecretaire
     * @return void
     */
    public function ajouterRdv($hrDebut, $hrFin, $etat, $motif, $idPatient, $idDocteur, $idSecretaire)
    {
        $sql = "insert into rdv (hrDebut,hrFin,etat,motif,idPatient,idDocteur,idSecretaire) values (?, ?, ?, ?, ?, ?, ?)";
        $hd  = getDateForDatabase($hrDebut);
        $hf  = getDateForDatabase($hrFin);
        $this->executerRequete($sql, array($hd, $hf, $etat, $motif, $idPatient, $idDocteur, $idSecretaire));
    }

    /**
     * retourne le nombre de rendez-vous selon type passé en parametre.
     * @param type $etatRdv
     * @return nbr de rdv
     */
    public function getNbRdv($etatRdv)
    {
        $sql      = "select count(idRdv) as nbrRdv from rdv where etat = ?";
        $resultat = $this->executerRequete($sql, array($etatRdv));
        $nbr      = $resultat->fetch();
        return $nbr['nbrRdv'];
    }

    /**
     * retourne la liste des patients Motif du Rdv, temps d'attente et docteurs selon l'etat du rendez-vous passé en parametre.
     * @param type $etatRdv
     * @return tableau des patients
     */
    public function getlisteRdv($etatRdv)
    {
        $sql      = "SELECT concat(patient.nomPatient,' ', patient.pernomPatient) as patient, rdv.motif  as motif ,TIMEDIFF(now(),rdv.hrPresentation) as `attente`, concat(employe.nomEmploye ,' ',employe.prenomEmploye) as docteur from rdv INNER JOIN employe on rdv.idDocteur=employe.idEmploye INNER JOIN patient on rdv.idPatient=patient.idPatient WHERE rdv.etat = ?";
        $resultat = $this->executerRequete($sql, array($etatRdv));
        if ($resultat->rowCount() >= 1) {
            return $resultat->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("Aucun Rendez-vous trouvé en statut '$etatRdv'");
        }
    }

    /**
     * retourne la liste des patients en salle d'attente avec les infos suivantes : Motif du Rdv, temps d'attente et docteurs.
     * @return json
     */
    public function getRdvEnAttenteJSON()
    {
        $sql      = "SELECT concat(patient.nomPatient,' ', patient.pernomPatient) as patient, rdv.motif as motif  ,TIMEDIFF(now(),rdv.hrPresentation) as `attente`, concat(employe.nomEmploye ,' ',employe.prenomEmploye) as docteur from rdv INNER JOIN employe on rdv.idDocteur=employe.idEmploye INNER JOIN patient on rdv.idPatient=patient.idPatient WHERE rdv.etat = 'en cours'";
        $resultat = $this->executerRequete($sql);
        if ($resultat->rowCount() >= 1) {
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }

            $results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];

            return json_encode($results);

        } else {
            throw new Exception("Aucun Rendez-vous trouvé en statut '$etatRdv'");
        }
    }

}
