<?php
namespace App;
use PDO;
class Restaurants extends AllInformation{
    public $numRestaurant, $nameRestaurant, $image, $avis;
    public function __construct () {}

    public function selectRestaurants ($q, $sort, $dir) {
        $this->query = "SELECT * FROM restaurants";
        $this->params = [];
        $this->sortable = ['numRestaurant', 'nameRestaurant', 'image', 'avis'];
        self::getRecherche($q, 'nameRestaurant');
        $restaurants = self::getInformation($sort, $dir);
        return $restaurants;
    }

    public static function selectNameRestaurants () {
        $selectName = App::getPDO()->prepare("SELECT nameRestaurant FROM restaurants");
        $selectName->execute();
        return $selectName->fetchAll();
    }
}

?>