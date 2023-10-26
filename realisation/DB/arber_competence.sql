-- phpMyAdmin SQL Dump

-- version 5.2.1

-- https://www.phpmyadmin.net/

--

-- Hôte : 127.0.0.1

-- Généré le : ven. 13 oct. 2023 à 14:27

-- Version du serveur : 10.4.28-MariaDB

-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données : `arber_competence`

--

-- --------------------------------------------------------

--

-- Structure de la table `competences`

--

CREATE TABLE
    `competences` (
        `ID` int(11) NOT NULL,
        `REFERENCE` varchar(50) NOT NULL,
        `CODE` varchar(100) NOT NULL,
        `NOM` text NOT NULL,
        `DESCREPTION` longtext NOT NULL
    );

--

-- Déchargement des données de la table `competences`

--

INSERT INTO
    `competences` (
        `ID`,
        `REFERENCE`,
        `CODE`,
        `NOM`,
        `DESCREPTION`
    )
VALUES (
        1,
        'C1',
        'Maquette',
        'Maquetter une application mobile',
        ' Cette compétence vous permettra de concevoir des maquettes d\'applications mobiles, aidant ainsi à visualiser et à planifier l\'interface utilisateur'
    ), (
        2,
        'C2',
        'Base Données',
        'Manipuler une base de données - perfectionnement',
        ' Cette compétence vous permettra de maîtriser la manipulation avancée des bases de données, ce qui est essentiel pour stocker et gérer des informations'
    ), (
        3,
        'C3',
        'back-end',
        'Développer la partie back-end d’une application web ou web mobile - perfectionnement',
        'Cette compétence vous permettra de créer et de gérer la logique côté serveur d\'applications web et mobiles avancées'
    ), (
        4,
        'C4',
        'Gestion',
        'Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement - perfectionnement',
        'Cette compétence vous préparera à jouer un rôle essentiel dans la gestion de projets informatiques et l\'optimisation de l\'environnement de développement'
    ), (
        5,
        'C5',
        'mobile Native',
        'Développer une application mobile native, with Android and React Native',
        'Cette compétence vous permettra de créer des applications mobiles performantes pour les plateformes Android et React Native'
    ), (
        6,
        'C6',
        'Tests',
        'Préparer et exécuter les plans de tests d’une application',
        'Cette compétence vous aidera à élaborer des stratégies de test efficaces pour garantir la qualité des applications'
    ), (
        7,
        'C7',
        'Deploiement',
        'Préparer et exécuter le déploiement d’une application web et mobile - perfectionnement',
        'Cette compétence vous permettra de maîtriser le processus de déploiement d\'applications web et mobiles avancées'
    ), (
        28,
        'es',
        'Provident minus nos',
        'Nisi ullam culpa vo',
        'Velit magnam ipsum n'
    ), (
        29,
        'Eu',
        'Ipsam porro iure aut',
        'Et dicta nulla velit',
        '<p><strong>ggggggggggg</strong></p>'
    );

--

-- Index pour les tables déchargées

--

--

-- Index pour la table `competences`

--

ALTER TABLE `competences` ADD PRIMARY KEY (`ID`);

--

-- AUTO_INCREMENT pour les tables déchargées

--

--

-- AUTO_INCREMENT pour la table `competences`

--

ALTER TABLE
    `competences` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 30;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;