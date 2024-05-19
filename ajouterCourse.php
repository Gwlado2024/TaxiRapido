<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>TAXI_RAPIDO</title>
</head>
<body>   
    <div class="container mt-5">
        <form method="post" action="inserCourse.php">
            <fieldset class="border p-4">
                <legend class="w-auto"><h1> TRANSPORT URBAINE RAPIDO </h1></legend>
                <h3>Fais une réservation</h3> <br>
                <div class="form-group">
                    <label for="point_depart">Point de départ :</label>
                    <input type="text" class="form-control" id="point_depart" name="point_depart"> 
                </div>
                <div class="form-group">
                    <label for="point_arriver">Point d'arrivée :</label>
                    <input type="text" class="form-control" id="point_arriver" name="point_arriver">
                </div>
                <div class="form-group">
                    <label for="datetime">Date :</label>
                    <input type="datetime-local" class="form-control" name="datetime" id="datetime"> <br><br>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                    <input type="reset" class="btn btn-secondary" value="Annuler">
                </div>    
            </fieldset>
        </form>
    </div>
    <script src="js/jquery-3.7.1.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
