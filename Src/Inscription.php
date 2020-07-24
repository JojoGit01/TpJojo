<?php
namespace App;
use PDO;
class Inscription {

    public function __construct($email, $identifiant, $motDePasse) {
        $this->email = $email;
        $this->identifiant = $identifiant;
        $this->motDePasse = $motDePasse;
    }

    public function check($nameSelected, $nameChecked) {
        $select = App::getPDO()->query("SELECT * FROM compte WHERE $nameSelected='$nameChecked'");
        $name = $select->fetchAll();
        if(!$name) { 
            return false; 
        } return true;
    }

    public function checkEmail(): bool {
        $nameEmail = "email";
        return self::check($nameEmail, $this->email);
    }

    public function checkIdentifiant(): bool {
        $nameIdentifiant = "identifiant";
        return self::check($nameIdentifiant, $this->identifiant);
    }

    public function checkMotDePasse() {
        strlen($this->motDePasse) >= 4 ? $lengthMDP = true : $lengthMDP = false;
        return $lengthMDP;
    }

    public function sendInscription() {
        $motDePasseHash = password_hash($this->motDePasse, PASSWORD_DEFAULT);
        $insertCompte = App::getPDO()->prepare("INSERT INTO compte (email, identifiant, motDePasse) VALUES ('$this->email', '$this->identifiant', '$motDePasseHash')");
        $insertCompte->execute([
            'email' => $this->email,
            'identifiant' => $this->identifiant, 
            'motDePasse' => $motDePasseHash
        ]);
        header("Location: ../View/connexion.php");
    }
}

?>