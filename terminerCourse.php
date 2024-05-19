<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>termineCourse</title>
    <link rel="stylesheet" href="css/fontawesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>NOS COURSES EN COURS</h2>
    <table border="1" class="table">
        <thead>
            <tr>
                <td>N° de course</td>
                <td>Point de départ</td>
                <td>Point d'arrivée</td>
                <td>Date et heure</td>
                <td>Chauffeur affecté</td>
                <td>Status de la course</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
                error_reporting(E_ALL);
                ini_set("display_errors", 1);
                $server = "localhost";
                $user = "root";
                $mdp = "";
                $bdd = "taxiRapido";

                try {
                    $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user, $mdp);
                } catch(PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }

                try {
                    $req1 = $connexion->prepare("SELECT * FROM courses WHERE statut = 'en cours'");
                    $req1->execute();
                    $courses = $req1->fetchAll();

                    $req2 = $connexion->prepare("SELECT * FROM chauffeurs WHERE disponibilite = 1");
                    $req2->execute();
                    $chauffeurs = $req2->fetchAll();

                    foreach($courses as $course) {
                        ?>
                        <tr>
                            <td><?php echo $course['course_id']; ?></td>
                            <td><?php echo $course['point_depart']; ?></td>
                            <td><?php echo $course['point_arriver']; ?></td>
                            <td><?php echo $course['date_heure']; ?></td>
                            <td>
                                <?php
                                    // Afficher le nom du chauffeur affecté
                                    $chauffeurId = $course['chauffeur_id'];
                                    $chauffeurQuery = $connexion->prepare("SELECT nom, prenom FROM chauffeurs WHERE chauffeur_id = ?");
                                    $chauffeurQuery->execute([$chauffeurId]);
                                    $chauffeurInfo = $chauffeurQuery->fetch();
                                    echo $chauffeurInfo['nom'] . ' ' . $chauffeurInfo['prenom'];
                                ?>
                            </td>
                            <td><?php echo $course['statut']; ?></td>
                            <td><a class="btn btn-primary affecter-btn" href="miseAjourTerminerCourse.php?course_id=<?php echo $course['course_id']; ?>&chauffeur=<?php echo $course['chauffeur_id']; ?>">Terminer</a></td>
                        </tr>
                        <?php
                    }
                } catch(PDOException $e) {
                    echo 'Echec <br>' . $e->getMessage();
                }
            ?>
        </tbody>
    </table>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('.chauffeur').change(function() {
                var courseId = $(this).data('course-id');
                var chauffeurId = $(this).val();
                var link = $(this).closest('tr').find('.affecter-btn');
                link.attr('href', 'miseAjourTerminerCourse.php?course_id=' + courseId + '&chauffeur=' + chauffeurId);
            });
        });
    </script> -->
</body>
</html>
