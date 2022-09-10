-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 oct. 2021 à 18:15
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `system_hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `mdp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `nom`, `prenom`, `date_naissance`, `email`, `adresse`, `code_postal`, `ville`, `province`, `telephone`, `cv`, `mdp`) VALUES
(1, 'Sbai', 'Mohamed', '1999-01-09', 'mohamedsbai@teccart.online', '1500 rue Lavallée', 'J4J 4C2', 'Longueuil', 'Québec', '(514)-555-2222', 'cv1.pdf', '123'),
(2, 'Ndosseau', 'Eliezer Magloire', '1980-05-18', 'NE@teccart.online', '300 Boulevard ou', 'H9Q 8L1', 'Montréal', 'Québec', '(514)-555-2222', 'cv2.pdf', '123'),
(3, 'Faizi', 'Zakaria', '2000-01-17', 'zakariafaizi@teccart.online', '645 rue des Lavals', 'P9Q 1S3', 'Laval', 'Québec', '(514)-555-2222', 'cv3.pdf', '123');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `date_rendezvous` date NOT NULL,
  `heure_rendezvous` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`id`, `id_patient`, `id_medecin`, `date_rendezvous`, `heure_rendezvous`) VALUES
(8, 7, 6, '2021-09-16', '14h40'),
(10, 3, 7, '2021-10-10', '13:40');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nom_dep` varchar(200) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `lieu` varchar(150) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `code_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`id`, `nom_dep`, `specialite`, `lieu`, `adresse`, `code_postal`) VALUES
(6, 'Clinique des foux', 'En général', 'Longueuil', '444 rue des tintins', 'J4J 4C2'),
(7, 'Hôpital général du Montréal', 'Général', 'Montréal', '321 rue des nuls', 'J4J 4C2');

-- --------------------------------------------------------

--
-- Structure de la table `diagnostic`
--

CREATE TABLE `diagnostic` (
  `id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `date_diagnostique` date NOT NULL,
  `observation` text NOT NULL,
  `conclusion` text NOT NULL,
  `prescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `mdp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`id`, `nom`, `prenom`, `date_naissance`, `photo`, `email`, `adresse`, `code_postal`, `ville`, `province`, `telephone`, `cv`, `mdp`) VALUES
(3, 'Sbai', 'Mohamed', '1000-10-10', 'photo1.jpg', 'p2@gmail.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', '', '123'),
(6, 'Depardieu', 'Gérard', '1950-10-10', 'gerard-depardieu-rape.png', 'p2@gmail.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', 'cv-quebec.pdf', ''),
(7, 'Richard', 'Richard', '1960-12-28', 'unknown.jpg', 'fas@fds.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', '', '123'),
(17, 'Toto', 'TOTO', '1960-01-10', 'photo2.jpg', 'fas@fds.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', 'cv-quebec.pdf', '123'),
(18, 'jojo', 'jiji', '1980-12-10', '43094966-sourire-profil-de-médecin.jpg', 'rwef@gmail.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', 'png2pdf.pdf', 'toto123');

-- --------------------------------------------------------

--
-- Structure de la table `doctor_departement`
--

CREATE TABLE `doctor_departement` (
  `id` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `doctor_departement`
--

INSERT INTO `doctor_departement` (`id`, `id_dep`, `id_doc`) VALUES
(16, 6, 6),
(17, 7, 3),
(18, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `nom`, `prenom`, `date_naissance`, `fonction`, `photo`, `email`, `adresse`, `code_postal`, `ville`, `province`, `telephone`, `cv`, `mdp`) VALUES
(2, 'Belmondo', 'Jean Paul', '1933-01-16', 'Ingénieur', '27917299.jpg', 'p2@gmail.com', '322 rue des roses', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', '', '123'),
(3, 'Cognac', 'Germain', '1965-03-12', 'Cuisine', '4-mk8tz.jpg', 'fas@fds.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', 'exemple_de_cv_d_un_cuisinier_page2-converti.pdf', '250');

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_rendezvous` int(11) NOT NULL,
  `prix_rendezvous` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `id_rendezvous`, `prix_rendezvous`) VALUES
(10, 5, '45.00');

-- --------------------------------------------------------

--
-- Structure de la table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `code_postal` varchar(20) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `mdp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nurse`
--

INSERT INTO `nurse` (`id`, `nom`, `prenom`, `date_naissance`, `photo`, `email`, `adresse`, `code_postal`, `ville`, `province`, `telephone`, `cv`, `mdp`) VALUES
(2, 'Josepha', 'Josepha', '1990-12-09', 'inf.jpg', 'fas@fds.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '444-111-6666', '', '123'),
(12, 'Ataky', 'Steve', '1980-03-10', 'Steve-Ataky-T-M.jpg', 'steveataky@gmail.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '555-111-2222', 'pasted image 1.png', '123');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `mdp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `date_naissance`, `email`, `adresse`, `code_postal`, `ville`, `province`, `telephone`, `description`, `mdp`) VALUES
(3, 'Patient3', 'P3', '1999-01-09', 'p3@gmail.com', '400 rue TOTO', 'J4J 4C2', 'Boucherville', 'Québec', '0', 'grosse migraine', '123'),
(6, 'Patient6', 'P6', '1999-01-09', 'p6@gmail.com', '400 rue TOTO', 'J4J 4C2', 'Boucherville', 'Québec', '0', 'douleur', '123'),
(7, 'Patient7', 'P7', '1999-01-09', 'p7@gmail.com', '400 rue TOTO', 'J4J 4C2', 'Boucherville', 'Québec', '0', 'douleur', '123'),
(9, 'Patient8', 'P8', '1999-01-09', 'p8@gmail.com', '400 rue TOTO', 'J4J 4C2', 'Boucherville', 'Québec', '0', 'douleur', '123'),
(11, 'fsda', 'fads', '1999-10-10', 'fas@fds.com', '444 rue des tintins', 'J4J 4C2', 'Longueuil', 'QC', '555-444-2222', '', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_medecin` (`id_medecin`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_medecin` (`id_medecin`);

--
-- Index pour la table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctor_departement`
--
ALTER TABLE `doctor_departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dep` (`id_dep`),
  ADD KEY `id_doc` (`id_doc`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rendezvous` (`id_rendezvous`);

--
-- Index pour la table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `doctor_departement`
--
ALTER TABLE `doctor_departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`id_medecin`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD CONSTRAINT `diagnostic_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostic_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `doctor_departement`
--
ALTER TABLE `doctor_departement`
  ADD CONSTRAINT `doctor_departement_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_departement_ibfk_2` FOREIGN KEY (`id_dep`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `appointment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
