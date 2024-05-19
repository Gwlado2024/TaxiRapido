<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $server = "localhost";
    $user = "root";
    $mdp = "";
    $bdd = "taxiRapido";

    try{
        $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user,$mdp);
        echo"Connexion correcte";
    }catch(PDOException $e)
    {
        echo"Erreur : ".$e->getMessage();
    }

    $sql = "
        CREATE TABLE IF NOT EXISTS chauffeurs ( chauffeur_id INT AUTO_INCREMENT PRIMARY KEY, nom varchar(50), prenom varchar(50), telephone varchar(30), sexe varchar(5) NOT NULL, disponibilite boolean NOT NULL);
        CREATE TABLE IF NOT EXISTS courses (course_id INT AUTO_INCREMENT PRIMARY KEY, point_depart varchar(255), point_arriver varchar(255), date_heure  datetime, statut varchar(10), chauffeur_id INT, FOREIGN KEY (chauffeur_id) REFERENCES chauffeurs(chauffeur_id)); 
    ";
    try {
        $connexion->exec($sql);
        echo "Table crée avec succès";
    } catch (PDOException $e) {
        echo "Erreur : ".$e->getMessage();
    }
?>