<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IndexRAPIDO</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fontawesome.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta name="description" content="TaxiRAPIDO - Réservez votre course rapidement et facilement.">
  <meta name="keywords" content="Taxi, Réservation, Course, Chauffeur, Transport">
  <meta name="author" content="TaxiRAPIDO">
  <style>
    .welcome-container {
      text-align: right;
      margin-right: 20px;
      margin-top: 20px;
    }
    .welcome-text {
      font-size: 2.5rem; /* Adjust the font size as needed */
    }
    .image-container {
      text-align: center;
      margin-top: 0px 0em 100px 0px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TaxiRAPIDO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="accueil.php">Accueil</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="ajouterCourse.php">Ajouter une course</a></li>
              <li><a class="dropdown-item" href="affecterChauffeur.php">Affecter un chauffeur</a></li>
              <li><a class="dropdown-item" href="affichageCourse.php">Afficher les courses</a></li>
              <li><a class="dropdown-item" href="terminerCourse.php">Terminer une course</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="welcome-container">
    <p class="welcome-text">Bienvenue chez TaxiRAPIDO</p>
    <a href="ajouterCourse.php" class="btn btn-primary">Faire une réservation</a>
  </div>
  <div class="image-container pt-0 ">
    <img src="car-big.png" alt="Image d'un taxi" class="img-fluid">
  </div>
  <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
  <script src="js/jquery-3.7.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
