<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $server = "localhost";
    $user = "root";
    $mdp = "";
    $bdd = "taxiRapido";


    try {
        $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $point_depart = $_POST["point_depart"];
        $point_arriver = $_POST["point_arriver"];
        $date_heure = $_POST["datetime"];
        $statut = "en attente";
        // Préparer la requête d'insertion
        $sql_insert_course = "INSERT INTO courses (point_depart, point_arriver, date_heure, statut) VALUES (?, ?, ?, ?)";
        $stmt_insert_course = $connexion->prepare($sql_insert_course);

        try {
            // Exécuter la requête d'insertion avec les données du formulaire
            $stmt_insert_course->execute([$point_depart, $point_arriver, $date_heure, $statut ]);
            //retour à la page d'acceuil 
            header("Location: accueil.php");
        } catch (PDOException $e) {
            echo "Erreur d'insertion course : " . $e->getMessage();
        }
    }
?>