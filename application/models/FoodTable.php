<?php

/**
 * Description of FoodTable
 *
 * @author Avesh
 */
class FoodTable extends CI_Model{
    public function __construct() {
	$this -> load -> database();
	$this -> load -> library('session');
    }
    
    public function getFoods() {
        $query = $this -> db -> query("SELECT itemname,Calories,Carbs,Fat,Protein FROM item");
        return $query->result();
    }
}
