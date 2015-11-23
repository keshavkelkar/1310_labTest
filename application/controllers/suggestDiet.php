<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class suggestDiet extends CI_Controller {
    
    function __construct()
	{
 		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
                $this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('suggest_dish_model');
        }
    
   public function index($IntakeData){
       
       var_dump($IntakeData);
       /*
        $bfCalories= $this->session->userdata('bfcalories');
        $lunchCalories= $this->session->userdata('lunchCalories');
        $dinnerCalories= $this->session->userdata('dinnerCalories');
        
        $hadbf = $this->session->userdata('hadBF') ;
        $hadLunch = $this->session->userdata('hadLunch');
        $hadDinner = $this->session->userdata('hadDinner');     
        
         $query = $this->aiModel->getBalancedDiet();
         $row = $query->row();
         $balancedCalories = $row->calories;
         $balancedProtein = $row->protein;
         $balancedFat = $row->fat;
         $balancedCarbs = $row->carbs;

         $requiredCalories = $totalCalories - $balancedCalories;
         $requiredProtein = $totalProtein - $balancedProtein;
         $requiredFat = $totalFat - $balancedFat;
         $requiredCarbs = $totalCarbs - $balancedCarbs;
        */
        
       
       
       
        $this->load->view('showDietPlan', $data);        
        
    }
}
