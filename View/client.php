<?php
require_once '../vendor/autoload.php';
use App\Auth;
use App\App;
$user = App::getAuth()->user();
if (!$user) {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/styleM.css">
    <link rel="stylesheet" href="../Css/styleNavbar.css">
    <script type="text/javascript" src="../JavaScript/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../JavaScript/ViewAdd/addRestaurants.js"></script>
    <title>Client Page</title>
</head>
<body>
    <header class="header-nav">
        <nav class="nav">
            <a href="client.php">Accueil</a>
            <a href="ViewClient/restaurants.php">Restaurants</a>
            <a href="ViewClient/reservation.php">Réservation</a>
            <a href="ViewClient/commander.php">Commander</a>
            <a href="../UseFunction/logout.php">Se Déconnecter</a>
        </nav>
    </header>
    <?php require_once 'UseView/Contain/contain-bodyMC.php' ?>
</body>
</html>