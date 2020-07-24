<?php
namespace App;
use PDO;
class User {
    
    public $email;
    public $identifiant;
    public $motDePasse;
    public function __construct () { }

    public static function checkIfUserCo(Auth $auth): bool {
        if ($auth->user() !== null) {
            return true;
        }
        return false;
    }

    public static function checkIdentifiant($identifiant) {
        $selectIdentifiant = App::getPDO()->prepare("SELECT * FROM compte WHERE identifiant='$identifiant'");
        $selectIdentifiant->execute([$identifiant]);
        return $selectIdentifiant->fetchObject(__CLASS__);
    }
}

?>