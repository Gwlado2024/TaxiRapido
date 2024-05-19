<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> afficheCourse</title>
    <link rel="stylesheet" href="css/fontawesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>NOS COURSES</h2>
        <table border="1" class="table">
            <thead>
                <tr>
                    <td>N° de course</td>
                    <td>Point de départ</td>
                    <td>Point d'arrivée</td>
                    <td>Date et heure</td>
                    <td>Chauffeur affecté</td>
                    <td>Status de la course</td>
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
                
                    try{
                        $connexion = new PDO("mysql:host=$server;dbname=$bdd", $user,$mdp);
                    }catch(PDOException $e)
                    {
                        echo"Erreur : ".$e->getMessage();
                    }
                    try{
                        $req1 = $connexion->prepare("SELECT * FROM courses");
                        $req1->execute();
                        $courses = $req1->fetchAll();

                        $req2 = $connexion->prepare("SELECT * FROM chauffeurs");
                        $req2->execute();
                        $chauffeurs = $req2->fetchAll();

                        foreach($courses as $course){
                            ?>
                                <tr>
                                    <td><?php echo $course['course_id']; ?></td>
                                    <td><?php echo $course['point_depart']; ?></td>
                                    <td><?php echo $course['point_arriver'];?></td>
                                    <td><?php echo $course['date_heure'];?></td>
                                    <td>
                                        <?php 
                                            foreach($chauffeurs as $chauffeur){
                                                if($course['chauffeur_id'] == $chauffeur['chauffeur_id']){
                                                    echo $chauffeur['nom'].' '.$chauffeur['prenom'];
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $course['statut']; ?></td>
                                </tr>
                        <?php
                        }
                        
                    }catch(PDOException $e){
                        echo 'Echec <br>'.$e->getMessage();
                    }    
                   ?>
                </tbody>
            </table>
</body>
</html>