 public function getArticles($idClient)
    {
        $sql = "select ARTPAN_ID as id, AP.ALB_ID as idAlbum, CLI_ID as idClient, ARTPAN_QUANTITE as quantite,
            ALB_PRIX as prixAlbum, ALB_PRIX*ARTPAN_QUANTITE as prixTotal,
            ALB_NOM as nomAlbum from T_ARTICLE_PANIER AP join T_ALBUM ALB on AP.ALB_ID=ALB.ALB_ID where CLI_ID=?
            order by ALB_NOM";
        return $this->executerRequete($sql, array($idClient));
    }

    public function getNbArticles($idClient)
    {
        $sql = "select count(ARTPAN_ID) as nbArticles from T_ARTICLE_PANIER where CLI_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient));
        $ligne = $resultat->fetch();
        return $ligne['nbArticles'];
    }

    public function getPrixTotal($idClient) {
        $sql = "select sum(ALB_PRIX*ARTPAN_QUANTITE) as prixTotal 
            from T_ARTICLE_PANIER AP join T_ALBUM ALB on AP.ALB_ID=ALB.ALB_ID where CLI_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient));
        $ligne = $resultat->fetch();
        return $ligne['prixTotal'];
    }
    
    public function ajouterAlbum($idClient, $idAlbum)
    {
        $sql = "select * from T_ARTICLE_PANIER where CLI_ID=? and ALB_ID=?";
        $resultat = $this->executerRequete($sql, array($idClient, $idAlbum));
        if ($resultat->rowCount() > 0) {
            // album déjà commandé par ce client : on augmente sa quantité de 1
            $sql = 'update T_ARTICLE_PANIER set ARTPAN_QUANTITE=ARTPAN_QUANTITE+1
                where CLI_ID=? and ALB_ID=?';
        }
        else {
            // on crée un nouvel article
            $sql = 'insert into T_ARTICLE_PANIER(CLI_ID, ALB_ID) values (?, ?)';
        }
        $this->executerRequete($sql, array($idClient, $idAlbum));
    }


------------------------------------------------------------------------------------------------
session employe:
array (size=17)
  'idEmploye' => string '2' (length=1)
  'nomEmploye' => string 'lakhdar' (length=7)
  'prenomEmploye' => string 'youssef' (length=7)
  'dateNaissanceEmploye' => string '1986-12-29' (length=10)
  'adresseEmploye' => string 'adresse1' (length=8)
  'telephoneEmploye' => string '0653105265' (length=10)
  'emailEmploye' => string 'lakhdar.y@gmail.com' (length=19)
  'matricule' => string 's804338' (length=7)
  'mdp' => string '$2y$10$59XnLVpo8u3PnWAdbhPEluVRzW9SHuVcUTblZZbhoTP8UzSoQKbZS' (length=60)
  'poste' => string 'Docteur' (length=7)
  'specialite' => string 'chirugien' (length=9)
  'dateEmbauche' => string '2010-02-01' (length=10)
  'dateDepart' => null
  'isConnected' => string '0' (length=1)
  'isActivated' => string '0' (length=1)
  'lastConnexion' => null
  'idVille' => string '14' (length=2)

  ---------------------------------------------------
SELECT concat(patient.nomPatient,' ', patient.pernomPatient) as patient, rdv.motif,TIMEDIFF(now(),rdv.hrPresentation) as `attente`, concat(employe.nomEmploye ,' ',employe.prenomEmploye) as docteur from rdv 
INNER JOIN employe
on rdv.idDocteur=employe.idEmploye

INNER JOIN patient
on rdv.idPatient=patient.idPatient

 WHERE rdv.etat ='en cours'