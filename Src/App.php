<?php
namespace App;
use PDO;

class App {

    public static $pdo;

    public static function getPDO(): PDO 
    {
        if(!self::$pdo){
            $dsn = 'mysql:dbname=TpJojo;host=127.0.0.1';
            $user = 'Jojo';
            $password = 'bonjour';
            try {
                self::$pdo = new PDO($dsn, $user, $password,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            } catch (PDOException $e) {
                echo 'Connexion échouée : ' . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static $auth;

    public static function getAuth() {
        if (!self::$auth) {
            self::$auth = new Auth(self::$pdo, '../View/client.php?login');
        }
        return self::$auth;
    }
}
?>