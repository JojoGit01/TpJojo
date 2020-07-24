<?php
require_once '../vendor/autoload.php';
use App\User;
use App\Auth;
use App\App;
session_start();
$auth = App::getAuth();
if (User::checkIfUserCo($auth) ) {
    header("Location: client.php?log");
    exit;
}
$errorC = null;
if (isset($_POST['valider'])) {
    $identifiant = htmlentities($_POST['identifiant']);
    $motDePasse = htmlentities($_POST['password']);
    if(!empty($_POST)) {
        $user = $auth->login($identifiant, $motDePasse);
        if ($user){
            header("Location: client.php?login=1");
            exit();
        }
        $errorC = "Identifiant et mot de passe incorrect";
    }
} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style_I_C.css">
    <link rel="stylesheet" href="../Css/styleNavbar.css">
    <link rel="stylesheet" href="../Css/styleFooter.css">
    <script type="text/javascript" src="../JavaScript/ViewHelp/navbarColorPos.js"></script>
    <title>Connexion</title>
</head>
<body>
    <?php require_once 'UseView/navbar.php'; ?>
    <div class="mainConnexion">
        <form method="post">
            <fieldset>
                <legend class="title-C">Connexion</legend>
                <div class="errors">
                    <?php if($errorC != null): ?>
                        <?= $errorC ?>
                    <?php endif ?>
                </div>
                <div class="identifiant">
                    <input type="text" id="identifiant" name="identifiant" placeholder="Votre identifiant" required>
                </div>
                <div class="motDePasse">
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                </div>
                <div class="btnValider">
                    <input type="submit" id="valider" name="valider" value="Se connecter">
                </div>
                <div class="btnReset">
                    <input type="reset" id="reset" name="reset" value="Annuler">
                </div>
            </fieldset>
        </form>
    </div>
    <?php require_once 'UseView/footer.php'; ?>
</body>
</html>