<?php
require_once '../../vendor/autoload.php';
use App\Auth;
use App\App;
use App\Restaurants;
use App\RechercheIn;
$user = App::getAuth()->user();
if (!$user) {
    header("Location: ../../index.php");
    exit;
}
$Restaurants = new Restaurants();
$restaurants = $Restaurants->selectRestaurants($_GET['q'], $_GET['sort'], $_GET['dir']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/styleNavbar.css">
    <link rel="stylesheet" href="../../Css/styleRestaurants.css">
    <link rel="stylesheet" href="../../Css/styleFooter.css">
    <title>Restaurants</title>
</head>
<body>
    <?php require_once '../UseView/navbarViewClient.php' ?>
    <div class="containRestaurant">
        <h1 class="titleRestaurant">Nos restaurants</h1>
        <div class="recherche">
            <form method="get">
                <input type="text" name="q" placeholder="Rechercher par nom" value="<?= htmlentities($_GET['q'] ?? null) ?>">
            </form>
        </div>
        <table class="tableRestaurants">
            <thead class="thead">
                <tr>
                    <th><?= RechercheIn::sort("numRestaurant", "Numéro", $_GET) ?></th>
                    <th><?= RechercheIn::sort("nameRestaurant", "Nom", $_GET) ?></th>
                    <th><?= RechercheIn::sort("image", "Photo", $_GET) ?></th>
                    <th><?= RechercheIn::sort("avis", "Avis", $_GET) ?></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr><td colspan="5"><hr class="separate-restaurants"></td></tr>
                <?php foreach ($restaurants as $restaurant) : ?>
                    <tr>
                        <td><?= $restaurant->numRestaurant ?></td>
                        <td><?= $restaurant->nameRestaurant ?></td>
                        <td><img src="<?= '../../' . $restaurant->image ?>"></td>
                        <td><?= $restaurant->avis ?></td>
                        <td><a href="carteC.php?numRestaurant=<?= $restaurant->numRestaurant . "&nameR=" . $restaurant->nameRestaurant ?>"> Voir la carte</td>
                    </tr>
                    <tr><td colspan="5"><hr class="separate-restaurants"></td></tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php require_once '../UseView/footer.php' ?>
</body>
</html>