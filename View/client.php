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
    <title>CLient Page</title>
</head>
<body>
    <a href="../UseFunction/logout.php">Se déconnecter</a>
    <h1>Test</h1>
</body>
</html>