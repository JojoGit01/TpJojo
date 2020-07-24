<?php
require_once '../vendor/autoload.php';

use App\App;
use App\Inscription;
use App\User;
$auth = App::getAuth();
if (User::checkIfUserCo($auth) ) {
    header("Location: client.php?log");
    exit;
}

if (isset($_POST['valider'])) {
    $email = htmlentities($_POST['email']);
    $identifiant = htmlentities($_POST['identifiant']);
    $password = htmlentities($_POST['password']);
    try {
        $inscription = new Inscription($email, $identifiant, $password);
        $emailCheck = $inscription->checkEmail();
        $inscriptionCheck = $inscription->checkIdentifiant();
        $motDePasseCheck = $inscription->checkMotDePasse();
        var_dump($motDePasseCheck);
        if( !$emailCheck && !$inscriptionCheck && $motDePasseCheck) {
            $inscription->sendInscription();
        } else {
            $errorMdp = "Caractére MDP inférieur à 4";
            $errorIdentifiant = "Identifiant déja utilisée";
            $errorEmail = "Email déja utilisé";
        }
    } catch (PDOExpression $e) {
        echo 'Connexion éhouée : ' .$e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../JavaScript/ViewHelp/helpPassword.js"></script>
    <link rel="stylesheet" href="../Css/style_I_C.css">
    <link rel="stylesheet" href="../Css/styleNavbar.css">
    <link rel="stylesheet" href="../Css/styleFooter.css">
    <title>Inscription</title>
</head>
<body>
    <?php require_once 'UseView/navbar.php'; ?>
    <div class="mainInscription">
        <form method="post">
            <fieldset>
                <legend class="title-mainI">Inscription</legend>
                <div class="errors">
                    <?php if ($emailCheck && $inscriptionCheck && !$motDePasseCheck || $emailCheck || $inscriptionCheck || !$motDePasseCheck) : ?>
                        <?= $emailCheck && $inscriptionCheck && !$motDePasseCheck ? $errorEmail . "<br>" . $errorIdentifiant . "<br>" . $errorMdp : null ?>
                        <?= $emailCheck && $inscriptionCheck && $motDePasseCheck ? $errorEmail . "<br>" . $errorIdentifiant : null ?>
                        <?= $emailCheck && !$inscriptionCheck && !$motDePasseCheck ? $errorEmail . "<br>" . $errorMdp : null ?>
                        <?= !$emailCheck && $inscriptionCheck && !$motDePasseCheck ? $errorIdentifiant . "<br>" . $errorMdp : null ?>
                        <?= $emailCheck && !$inscriptionCheck && $motDePasseCheck ? $errorEmail : null ?>
                        <?= !$emailCheck && $inscriptionCheck && $motDePasseCheck ? $errorIdentifiant  : null ?>
                        <?= !$emailCheck && !$inscriptionCheck && !$motDePasseCheck ? $errorMdp : null ?>
                    <?php endif ?>
                </div>
                <div class="email">
                    <input type="email" id="email" name="email" placeholder="Votre email" required>
                </div>
                <div class="identifiant">
                    <input type="text" id="identifiant" name="identifiant" placeholder="Votre identifiant" required>
                </div>
                <div class="motDePasse">
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div id="helpPassword" class="helpPassword">
                    <h3 class="helpPass">Aide mot de passe</h3>
                    <p id="caractereMin" class="inactif">4 Caractéres minimum</p>
                    <p id="majuscule" class="inactif">Majuscule</p>
                    <p id="nombre" class="inactif">Nombre</p>
                    <p id="caractereSpeciaux" class="inactif">Caractére spéciaux</p>
                </div>
                <div class="btnSubmit">
                    <input type="submit" id="valider" name="valider" value="Valider">
                </div>
                <div class="btnReset">
                    <input type="reset" id="annuler" name="annuler" value="Annuler">
                </div>
            </fieldset>
        </form>
    </div>
    <?php require_once 'UseView/footer.php'; ?>
</body>
</html>