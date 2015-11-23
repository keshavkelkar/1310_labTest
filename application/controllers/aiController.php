<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aiController extends CI_Controller {
    public function index()
	{
            $this->load->helper('url'); 
            $this->load->view('userIntake');
	}
        
        public function goForUserIntake() {
            $this->load->helper('url'); 
             $this->load->view('userIntake');
        }
        
        public function submitUserIntakeData() {
            
            $this->load->database();   
            $totalCalories = 0;
            $totalProtein = 0;
            $totalFat =0;
            $totalCarbs=0;
            
            if(!empty($_POST['check_list'])) {
                foreach ($_POST['check_list'] as $key => $value){
                    $this->load->model('aiModel');
                    
                    $calories = $this->aiModel->getCalories($value);
                    $protein = $this->aiModel->getProtein($value);
                    $fat = $this->aiModel->getFat($value);
                    $carbs = $this->aiModel->getCarbs($value);

                    echo $calories;
                    echo " ";
                    
                    $totalCalories=$this->calculateCalories($calories,$totalCalories);
                    $totalProtein=$this->calculateProtein($protein,$totalProtein);
                    $totalFat=$this->calculateFat($fat,$totalFat);
                    $totalCarbs=$this->calculateCarbs($carbs,$totalCarbs);

                }
            }
            
            $userId="keshav.kelkar@gmail.com";
            $date="2014-10-29";
            

           $userIntakeData = array(
               'userId'=>$userId,
               'date'=>$date,
               'totalCalories'=>$totalCalories,
                'totalProtein'=>$totalProtein,
                'totalFat'=>$totalFat,
                'totalCarbs'=>$totalCarbs,
               );
         $this->load->model('aiModel');
         $this->aiModel->insertIntoUserIntake($userIntakeData);
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

         echo "Calories => ",$requiredCalories,'</br>';
         echo "Protein => ",$requiredProtein,'</br>';
         echo "Fat => ",$requiredFat,'</br>';
         echo "Carbohydrates => ",$requiredCarbs;
         
          $this->load->helper('url'); 
          $this->load->view('homePage');
        }
        
         public function calculateCalories($calories,$totalCalories) {
            $totalCalories = $totalCalories + $calories ;
            return $totalCalories;
        }
        public function calculateProtein($protein,$totalProtein) {
            $totalProtein = $totalProtein + $protein ;
            return $totalProtein;
        }
        public function calculateFat($fat,$totalFat) {
            $totalFat = $totalFat + $fat ;
            return $totalFat;
        }
        public function calculateCarbs($carbs,$totalCarbs) {
            $totalCarbs = $totalCarbs + $carbs ;
            return $totalCarbs;
        }
    
}


