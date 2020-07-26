<?php 
namespace App;
class AllInformation {
    protected $query, $params, $sortable;
    public function __construct() {
        $this->query = $query;
        $this->params = $params;
        $this->sortable = $sortable;
    }

    protected function getRecherche($q, $nameRestaurant) {
        if (!empty($q)) {
            $this->query .= " WHERE $nameRestaurant LIKE :$nameRestaurant";
            $this->params[$nameRestaurant] = "%" . $q . "%";
        }
    }
    protected function getInformation ($sort, $dir) {
        self::organisation($sort, $dir);
        $selectR = App::getPDO()->prepare($this->query);
        $selectR->execute($this->params);
        $restaurants = $selectR->fetchAll();
        return $restaurants;
    }

    protected function organisation($sort, $dir) {
        if(!empty($sort) && in_array($sort, $this->sortable)) {
            $direction = $dir ?? 'asc';
            if( !in_array($direction, ['asc', 'desc'])) {
                $direction = 'asc';
            }
            $this->query .= " ORDER BY " . $sort . " $direction";
        }
    }
}

?>