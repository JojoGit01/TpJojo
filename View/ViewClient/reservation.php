<?php
require_once '../../vendor/autoload.php';
use App\Auth;
use App\App;
use App\Restaurants;
$user = App::getAuth()->user();
if (!$user) {
    header("Location: ../../index.php");
    exit;
}
$restaurantName = Restaurants::selectNameRestaurants();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/styleNavbar.css">
    <link rel="stylesheet" href="../../Css/styleReservation.css">
    <link rel="stylesheet" href="../../Css/styleFooter.css">
    <title>Reservation</title>
</head>
<body>
    <?php require_once '../UseView/navbarViewClient.php' ?>
    <div class="bodyReservation">
        <fieldset class="fieldset-reservation">
            <legend class="title-reservation">Réservation</legend>
            <div class="contentReservation">
                <div class="nameR">
                    <label for="nameR">Nom du restaurant</label>
                    <select name="nameR" id="nameR">
                        <?php foreach( $restaurantName as $nameR ): ?>
                            <option value="<?= $nameR->nameRestaurant ?>"><?= $nameR->nameRestaurant ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="numberPeopleR">
                    <label for="numberPeopleR">Nombre de personne</label>
                    <input type="text" name="numberPeopleR" id="numberPeopleR" placeholder="Entrez le nombre de personne" required>
                </div>
                <div class="dateR">
                    <label for="dateR">Entrez la date</label>
                    <input type="date" name="dateR" id="dateR" required>
                </div>
                <div class="hoursR">
                    <label for="hoursR">Entrezl'heure</label>
                    <input type="time" name="hoursR" id="hoursR" min="09:00" max="23:00" required>
                </div>
            </div>
        </fieldset>
    </div>
    <?php require_once '../UseView/footer.php' ?>
</body>
</html>