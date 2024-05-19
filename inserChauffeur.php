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

    $chauffeurs = [
        ["Sélectionnez", "Chauffeur", "", "", ""],
        ["AKPAN", "Cesare", "+22900226598", "Homme", "disponible"],
        ["DUPONT", "Jean", "+22900656598", "Homme", "disponible"],
        ["AGUE", "Flori", "+29924596620", "Femme", "disponible"],
        ["SOUNOU", "Abi", "+22835786854", "Femme", "disponible"],
        ["DANSOU", "Ifè", "+25754523253", "Homme", "disponible"],
        ["DOSSOU", "Amour", "+22500147598", "Homme", "disponible"],
        ["KINHOE", "Véronique", "+22687495520", "Femme", "disponible"],
        ["KPONON", "Michel", "+05256596525", "Homme", "disponible"],
        ["MINNIN", "Alphonse", "+08451262025", "Homme", "disponible"],
        ["SABI", "Ricardo", "+25874521451", "Homme", "disponible"],
        ["AKPA", "Kirikou", "+23654587454", "Homme", "disponible"],
        ["ABLA", "Bernard", "+23655586454", "Homme", "disponible"]
    ];
 
    $sql_insert_chauffeur = "INSERT INTO chauffeurs (nom, prenom, telephone, sexe, disponibilite) VALUES (?, ?, ?, ?, ?)";

    $stmt_insert_chauffeur = $connexion->prepare($sql_insert_chauffeur);
        
    foreach($chauffeurs as $chauffeur) {
        try {
            $stmt_insert_chauffeur->execute($chauffeur);
            //retour à la page d'acceuil 
            header("Location: accueil.php");
        }catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }    
    }
 
?>