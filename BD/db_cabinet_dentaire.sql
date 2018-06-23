-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Mai 2018 à 00:34
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_cabinet_dentaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `acte`
--

CREATE TABLE `acte` (
  `idActe` int(10) UNSIGNED NOT NULL,
  `natureActe` varchar(50) NOT NULL,
  `tarifCabinet` float NOT NULL,
  `tnr` float NOT NULL COMMENT 'Tarification Nationale de Référence',
  `codeNGAP` varchar(50) NOT NULL COMMENT 'Nomenclature Générale des Actes Professionnels (NGAP)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `idAssurance` int(10) UNSIGNED NOT NULL,
  `compagnie` varchar(50) NOT NULL,
  `police` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE `certificat` (
  `idCertificat` int(10) UNSIGNED NOT NULL,
  `dateDelivrance` date NOT NULL,
  `duree` int(11) NOT NULL,
  `idConsultation` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `idConsultation` int(10) UNSIGNED NOT NULL,
  `idRdv` int(10) UNSIGNED NOT NULL,
  `dateConsultation` datetime NOT NULL,
  `hrPresentation` time DEFAULT NULL,
  `hrDebutConsultation` time DEFAULT NULL,
  `hrFinConsultation` time DEFAULT NULL,
  `idPhotoExamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_acte`
--

CREATE TABLE `detail_acte` (
  `idDetail_Acte` int(11) NOT NULL,
  `idConsultation` int(10) UNSIGNED NOT NULL,
  `positionDent` int(11) DEFAULT NULL,
  `honoraire` float NOT NULL,
  `Observation` varchar(255) DEFAULT NULL,
  `idActe` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_ordonnance`
--

CREATE TABLE `detail_ordonnance` (
  `idDetail_Ordonnance` int(10) UNSIGNED NOT NULL,
  `idMedicament` int(10) UNSIGNED NOT NULL,
  `idOrdonnance` int(10) UNSIGNED NOT NULL,
  `priseParJour` int(11) NOT NULL COMMENT 'Nembre de prise par jour',
  `priseRepas` enum('AVANT','PENDANT','APRES') NOT NULL COMMENT 'prise de medicament avant, pendant ou apres repas',
  `quantitePrise` float NOT NULL COMMENT 'quantite de medicament par prise',
  `dureeTraitement` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `idEmploye` int(10) UNSIGNED NOT NULL,
  `nomEmploye` varchar(50) NOT NULL,
  `prenomEmploye` varchar(50) NOT NULL,
  `dateNaissanceEmploye` date NOT NULL,
  `adresseEmploye` varchar(100) NOT NULL,
  `telephoneEmploye` varchar(20) NOT NULL,
  `emailEmploye` varchar(50) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `specialite` varchar(50) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `dateDepart` date DEFAULT NULL,
  `idVille` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `idMedicament` int(10) UNSIGNED NOT NULL,
  `designationCommerciale` varchar(50) NOT NULL,
  `laboratoire` varchar(50) NOT NULL,
  `composition` varchar(50) NOT NULL,
  `forme` varchar(50) NOT NULL,
  `contreIndicatin` varchar(100) DEFAULT NULL,
  `ppv` float DEFAULT NULL COMMENT 'Prix Public Vente',
  `br` float DEFAULT NULL COMMENT 'Base de remboursement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `idOrdonnance` int(10) UNSIGNED NOT NULL,
  `dateOrdonnance` date NOT NULL,
  `idConsultation` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(10) UNSIGNED NOT NULL,
  `dateCreation` date NOT NULL,
  `sexe` enum('-','F','M') DEFAULT NULL,
  `nomPatient` varchar(50) NOT NULL,
  `pernomPatient` varchar(50) NOT NULL,
  `dateNaissancePatient` date NOT NULL,
  `adressePatient` varchar(100) DEFAULT NULL,
  `telephonePatient` varchar(20) DEFAULT NULL,
  `emailPatient` varchar(50) DEFAULT NULL,
  `cinPatient` varchar(20) DEFAULT NULL,
  `Allergie` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `idVille` int(10) UNSIGNED NOT NULL,
  `idAssurance` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `idPayement` int(10) UNSIGNED NOT NULL,
  `datePayement` datetime DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `mode` enum('CARTE','CHEQUE','ESPECE','VIREMENT','AUTRE') DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `idConsultation` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `photoexamen`
--

CREATE TABLE `photoexamen` (
  `idPhotoExamen` int(11) NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `datePrise` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `idRdv` int(10) UNSIGNED NOT NULL,
  `dateRdv` date NOT NULL,
  `hrDebut` time NOT NULL,
  `hrFin` time NOT NULL,
  `etat` enum('prevu','clos sans suite','clos','en cours') NOT NULL,
  `motif` varchar(100) DEFAULT NULL,
  `idPatient` int(10) UNSIGNED NOT NULL,
  `idDocteur` int(10) UNSIGNED NOT NULL,
  `idSecretaire` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(10) UNSIGNED NOT NULL,
  `nomVille` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acte`
--
ALTER TABLE `acte`
  ADD PRIMARY KEY (`idActe`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`idAssurance`);

--
-- Index pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD PRIMARY KEY (`idCertificat`),
  ADD KEY `FK_Consultation_Certificat` (`idConsultation`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`idConsultation`),
  ADD KEY `FK_PhotoExamen_Consultation` (`idPhotoExamen`),
  ADD KEY `FK_Rdv_Consultation` (`idRdv`);

--
-- Index pour la table `detail_acte`
--
ALTER TABLE `detail_acte`
  ADD PRIMARY KEY (`idDetail_Acte`),
  ADD KEY `FK_Consultation_DetailActe` (`idConsultation`),
  ADD KEY `FK_Acte_DetailActe` (`idActe`);

--
-- Index pour la table `detail_ordonnance`
--
ALTER TABLE `detail_ordonnance`
  ADD PRIMARY KEY (`idDetail_Ordonnance`),
  ADD KEY `FK_Medicament_DetailOrdonnance` (`idMedicament`),
  ADD KEY `FK_Ordonnance_DetailOrdonnance` (`idOrdonnance`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`idEmploye`),
  ADD KEY `FK_Ville_Employe` (`idVille`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`idMedicament`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`idOrdonnance`),
  ADD KEY `FK_Consultation_Ordonnance` (`idConsultation`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD KEY `FK_Ville_Patient` (`idVille`),
  ADD KEY `FK_Assurance_Patient` (`idAssurance`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`idPayement`),
  ADD KEY `FK_Consultation_Payement` (`idConsultation`);

--
-- Index pour la table `photoexamen`
--
ALTER TABLE `photoexamen`
  ADD PRIMARY KEY (`idPhotoExamen`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idRdv`),
  ADD KEY `FK_Patient_Rdv` (`idPatient`),
  ADD KEY `FK_Docteur_Rdv` (`idDocteur`),
  ADD KEY `FK_Employe_Rdv` (`idSecretaire`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acte`
--
ALTER TABLE `acte`
  MODIFY `idActe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `idAssurance` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `certificat`
--
ALTER TABLE `certificat`
  MODIFY `idCertificat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `idConsultation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `detail_ordonnance`
--
ALTER TABLE `detail_ordonnance`
  MODIFY `idDetail_Ordonnance` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `idEmploye` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `idMedicament` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `idOrdonnance` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `idPayement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `idRdv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `idVille` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD CONSTRAINT `FK_Consultation_Certificat` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`);

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_PhotoExamen_Consultation` FOREIGN KEY (`idPhotoExamen`) REFERENCES `photoexamen` (`idPhotoExamen`),
  ADD CONSTRAINT `FK_Rdv_Consultation` FOREIGN KEY (`idRdv`) REFERENCES `rdv` (`idRdv`);

--
-- Contraintes pour la table `detail_acte`
--
ALTER TABLE `detail_acte`
  ADD CONSTRAINT `FK_Acte_DetailActe` FOREIGN KEY (`idActe`) REFERENCES `acte` (`idActe`),
  ADD CONSTRAINT `FK_Consultation_DetailActe` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`);

--
-- Contraintes pour la table `detail_ordonnance`
--
ALTER TABLE `detail_ordonnance`
  ADD CONSTRAINT `FK_Medicament_DetailOrdonnance` FOREIGN KEY (`idMedicament`) REFERENCES `medicament` (`idMedicament`),
  ADD CONSTRAINT `FK_Ordonnance_DetailOrdonnance` FOREIGN KEY (`idOrdonnance`) REFERENCES `ordonnance` (`idOrdonnance`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `FK_Ville_Employe` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `FK_Consultation_Ordonnance` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_Assurance_Patient` FOREIGN KEY (`idAssurance`) REFERENCES `assurance` (`idAssurance`),
  ADD CONSTRAINT `FK_Ville_Patient` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `FK_Consultation_Payement` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_Docteur_Rdv` FOREIGN KEY (`idDocteur`) REFERENCES `employe` (`idEmploye`),
  ADD CONSTRAINT `FK_Employe_Rdv` FOREIGN KEY (`idSecretaire`) REFERENCES `employe` (`idEmploye`),
  ADD CONSTRAINT `FK_Patient_Rdv` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
