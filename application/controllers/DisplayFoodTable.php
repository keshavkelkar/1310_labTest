<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class DisplayFoodTable extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("FoodTable");
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function getFoodDet() {
        $data['food']= $this->FoodTable->getFoods();
        $this->load->view('allFruits', $data);
    }
    
}
?>

