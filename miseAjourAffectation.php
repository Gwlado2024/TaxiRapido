<?php
// Démarrer la session pour afficher les messages de confirmation ou d'erreur
session_start();
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

// Vérifier que les paramètres requis sont présents dans l'URL
if (isset($_GET['course_id']) && isset($_GET['chauffeur'])) {
    $course_id = $_GET['course_id'];
    $chauffeur_id = $_GET['chauffeur'];
    $statut = 'en cours';
    // Préparer et exécuter la requête de mise à jour
    $sql = "UPDATE courses SET chauffeur_id = ?, statut = ? WHERE course_id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$chauffeur_id, $statut, $course_id]);

    $sql = "UPDATE chauffeurs SET disponibilite = 1 WHERE chauffeur_id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$chauffeur_id]);


    // Rediriger vers la page précédente ou une page de confirmation
    header('Location: affecterChauffeur.php'); // Remplacez 'previous_page.php' par la page vers laquelle vous souhaitez rediriger
    exit();
} else {
    // Afficher une erreur si les paramètres requis sont absents
    header('Location: affecterChauffeur.php'); // Remplacez 'previous_page.php' par la page vers laquelle vous souhaitez rediriger
    exit();
}
?>
