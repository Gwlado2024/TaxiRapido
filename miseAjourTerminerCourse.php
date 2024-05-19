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
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}

if (isset($_GET['course_id']) && isset($_GET['chauffeur'])) {
    $courseId = $_GET['course_id'];
    $chauffeurId = $_GET['chauffeur'];
    try {
        // Mettre à jour le statut de la course
        $req1 = $connexion->prepare("UPDATE courses SET statut = 'terminé' WHERE course_id = :course_id");
        $req1->bindParam(':course_id', $courseId, PDO::PARAM_INT);
        $req1->execute();

        // Mettre à jour la disponibilité du chauffeur
        $req2 = $connexion->prepare("UPDATE chauffeurs SET disponibilite = 0 WHERE chauffeur_id = :chauffeur_id");
        $req2->bindParam(':chauffeur_id', $chauffeurId, PDO::PARAM_INT);
        $req2->execute();

        header("Location: accueil.php"); 
    } catch(PDOException $e) {
        echo "Echec de la mise à jour : " . $e->getMessage();
    }
} else {
    echo "Données de course ou de chauffeur manquantes.";
}
?>

