# Projet 5 OpenClassrooms - Créez votre premier blog en PHP

## Parcours Développeur d'application - PHP / Symfony

## Analyse du code

La qualité du code a été validée par Symfony Insight. Vous pouvez accéder au rapport de contrôle en cliquant sur le badge ci-dessous.

[![SymfonyInsight](https://insight.symfony.com/projects/04a7926a-317a-4c4e-9a2e-c9d77f918b47/big.svg)](https://insight.symfony.com/projects/04a7926a-317a-4c4e-9a2e-c9d77f918b47)

## Description du projet

Voici les principales fonctionnalités disponibles suivant les différents statuts utilisateur:

Le visiteur:

<ul>
<li>Visiter la page d'accueil présentation du profil de Gabriel Bouakira</li>
<li>Envoyer un mail depuis un formulaire de contact</li>
<li>Visite le Blog, consulter les publications et leurs commentaires</li>
</ul>
L'utilisateur:
<ul>
<li>Prérequis: s'être enregistré via le formulaire d'inscription</li>
<li>Ajouter des commentaires.</li>
<li> Accéder et gérer les informations de son profils (mot de passe, adresse email, username)

</ul>
Administrateur:
<ul>
<li>Prérequis: avoir le status administrateur.</li>
<li>Ajout/suppression/modification de blog post.</li>
<li>Validation/suppression de commentaires.</li>

</ul>

## Informations

Utilisateur:

<ul>
<li>Identifiant: user@hotmail.fr</li>
<li>Mot de passe: 12345</li>
</ul> 
Administrateur:
<ul>
<li>Identifiant: gabriel.bouakira@hotmail.fr</li>
<li>Mot de passe: azerty</li>
</ul>

## Prérequis

L'utilisation de ce blog nécessite l'installation de PHP et Composer.

## Installation

**Etape 1 :** Cloner le Repositary sur votre serveur.

**Etape 2 :** Créer une base de données sur votre SGBD et importer le fichier blog.example.sql

**Etape 3 :** Créer un fichier .env avec les informations avec les informations de votre BDD et votre serveur mail pour le bon fonctionnement du formulaire de contact.

**Etape 4 :** Vous pouvez accéder au blog avec les informations utilisateur

## Librairies principales utilisées

<ul>
<li>fzaninotto : Créer des publications et des utilisateurs fake</li>
<li>phpmailer : Gérer l'envoi des mails</li>
<li>phpdotenv : Paramêtrer un environnement pour les variables a sécuriser</li>

</ul>

## Diagrammes UML

Dans le dossier diagrammes à la racine du projet se trouve l'ensemble des schéma décrivant le fonctionnant du blog et sa base de données.

## Auteur

**Gabriel Bouakira**
