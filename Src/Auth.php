<?php
namespace App;

class Auth {
    
    private $pdo;
    private $loginPath;
    public function __construct ($pdo, $loginPath) {
        $this->pdo = $pdo;
        $this->loginPath = $loginPath;
    }

    public function user(): ?User {
        if (session_status() ===  PHP_SESSION_NONE){
            session_start();
        }
        $id = $_SESSION['auth'] ?? null;
        if($id === null){
            return null;
        }
        $user = User::checkIdentifiant($id);
        return $user ?? null;
    }
    
    public function login($identifiant, $password): ?User{
        $user = User::checkIdentifiant($identifiant);
        if ($user === false) {
            return null;
        }
        if ( password_verify($password, $user->motDePasse)){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['auth'] = $user->identifiant;
            return $user;
        }
        return null;
    }
    
}
?>