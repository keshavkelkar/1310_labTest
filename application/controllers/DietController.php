<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DietController extends CI_Controller {
    
        function __construct(){
                parent::__construct();
                $this->load->model('DietModel');
                $this->load->model('aiModel');
                $this->load->library('session');
                $this->load->database();
                $this->load->helper('form');
                $this->load->helper('url');

        }


    
        public function submitUserIntakeData() {
            
            if($this->session->userdata('user_id')!= NULL){
                        
            $totalCalories = 0;
            $totalProtein = 0;
            $totalFat =0;
            $totalCarbs=0;
            $bfcalories = 0;
            $bfProtiens = 0;
            $bfFat = 0;
            $bfCarbs = 0;
            $lunchCalories=0;
            $dinnerCalories=0;
            
            
            if(!empty($_POST['bf_list'])) {
                echo "Breakfast", '</br>','</br>';
                $bf_taken = array();
                foreach ($_POST['bf_list'] as $key => $value){
            
                   
                    $bf_taken[]['bf_item'] = $value;
                    
                    echo "\n dish selected =>";
                    echo $value,'</br>';
                    $calories = $this->DietModel->getCalories($value);
                    $protein = $this->DietModel->getProtein($value);
                    $fat = $this->DietModel->getFat($value);
                    $carbs = $this->DietModel->getCarbs($value);

                    echo "Calories => ",$calories, '</br>';
                    echo "Protiens => ",$protein, '</br>';
                    echo "Fats => ",$fat, '</br>';
                    echo "Carbs => ",$carbs, '</br>';
                    
                    echo '</br>';
                    
                    $totalCalories=$this->calculateCalories($calories,$totalCalories);
                    $totalProtein=$this->calculateProtein($protein,$totalProtein);
                    $totalFat=$this->calculateFat($fat,$totalFat);
                    $totalCarbs=$this->calculateCarbs($carbs,$totalCarbs);
                    
                }
                $bfcalories = $totalCalories;
                $bfProtiens = $totalProtein;
                $bfFat = $totalFat;
                $bfCarbs = $totalCarbs;
                
            }
            
            if(!empty($_POST['lunch_list'])) {
                
                echo "-----------------------------------------",'</br>','</br>';
                echo "Lunch", '</br>','</br>';
                $lunch_taken = array();
                
                foreach ($_POST['lunch_list'] as $key => $value){
                    
                    $lunch_taken[]['lunch_item'] = $value;
                    
                    echo "\n dish selected =>";
                    echo $value,'</br>';
                    $calories = $this->DietModel->getCalories($value);
                    $protein = $this->DietModel->getProtein($value);
                    $fat = $this->DietModel->getFat($value);
                    $carbs = $this->DietModel->getCarbs($value);

                    echo "Calories => ",$calories, '</br>';
                    echo "Protiens => ",$protein, '</br>';
                    echo "Fats => ",$fat, '</br>';
                    echo "Carbs => ",$carbs, '</br>';
                    
                    echo '</br>';

                    $totalCalories=$this->calculateCalories($calories,$totalCalories);
                    $totalProtein=$this->calculateProtein($protein,$totalProtein);
                    $totalFat=$this->calculateFat($fat,$totalFat);
                    $totalCarbs=$this->calculateCarbs($carbs,$totalCarbs);

                }
                $lunchCalories=$totalCalories - $bfcalories;
                $lunchProtiens = $totalProtein - $bfProtiens;
                $lunchFat = $totalFat - $bfFat;
                $lunchCarbs = $totalCarbs - $bfCarbs;
            }
            
            if(!empty($_POST['Dinner_list'])) {
                echo "-----------------------------------------",'</br>','</br>';
                echo "Dinner", '</br>','</br>';
                $Dinner_taken = array();
                foreach ($_POST['Dinner_list'] as $key => $value){
                    
                    $Dinner_taken[]['Dinner_item'] = $value;
                    
                    echo "\n dish selected =>";
                    echo $value,'</br>';
                    $calories = $this->DietModel->getCalories($value);
                    $protein = $this->DietModel->getProtein($value);
                    $fat = $this->DietModel->getFat($value);
                    $carbs = $this->DietModel->getCarbs($value);

                    echo "Calories => ",$calories, '</br>';
                    echo "Protiens => ",$protein, '</br>';
                    echo "Fats => ",$fat, '</br>';
                    echo "Carbs => ",$carbs, '</br>';
                    
                    echo '</br>';
                    
                    $totalCalories=$this->calculateCalories($calories,$totalCalories);
                    $totalProtein=$this->calculateProtein($protein,$totalProtein);
                    $totalFat=$this->calculateFat($fat,$totalFat);
                    $totalCarbs=$this->calculateCarbs($carbs,$totalCarbs);

                }
                $dinnerCalories=$totalCalories - ($lunchCalories + $bfcalories);
                $dinnerProtiens = $totalProtein - ($lunchProtiens + $bfProtiens);
                $dinnerFat = $totalFat - ($lunchFat + $bfFat);
                $dinnerCarbs = $totalCarbs - ($lunchCarbs + $bfCarbs);
            }
            
           $userId=$this->session->userdata('user_id');
           $date=date('Y-m-d');
           $hadBF=0;
           $hadLunch=0;
           $hadDinner=0;
           
           if($this->input->post('bf1') == 1) 
            $hadBF = 1;
           
           if($this->input->post('lunch1') == 1) 
            $hadLunch=1;
               
           if($this->input->post('Dinner1') == 1) 
            $hadDinner = 1;   
           
                         
              

           $userIntakeData = array(
               'userId'=>$userId,
               'date'=>$date,
               'totalCalories'=>$totalCalories,
                'totalProtein'=>$totalProtein,
                'totalFat'=>$totalFat,
                'totalCarbs'=>$totalCarbs,
               );
           
         //$this->aiModel->insertIntoUserIntake($userIntakeData);
         $data['balanced_diet'] = $this->aiModel->getBalancedDiet($userId);
         
         $balancedCalories = $data['balanced_diet']['balancedCalories'];
         $balancedProtein = $data['balanced_diet']['balancedProtein'];
         $balancedFat = $data['balanced_diet']['balancedFat'];
         $balancedCarbs = $data['balanced_diet']['balancedCarbs'];
         
         
         $requiredCalories = $totalCalories - $balancedCalories;
         $requiredProtein = $totalProtein - $balancedProtein;
         $requiredFat = $totalFat - $balancedFat;
         $requiredCarbs = $totalCarbs - $balancedCarbs;
         
         echo "-----------------------------------------",'</br>','</br>';
         echo "Total Consumed  - Suggested Diet", '</br>','</br>';

         echo "Calories => ",$requiredCalories,'</br>';
         echo "Protein => ",$requiredProtein,'</br>';
         echo "Fat => ",$requiredFat,'</br>';
         echo "Carbohydrates => ",$requiredCarbs, '</br>';
         
         $IntakeData = array(
                    'hadBF' => $hadBF,
                    'bfcalories'=>$bfcalories,
                    'bfProtiens'=>$bfcalories,
                    'bfFat'=>$bfcalories,
                    'bfCarbs'=>$bfcalories,
                    'hadLunch' => $hadLunch,
                    'lunchCalories'=>$lunchCalories,
                    'lunchProtiens'=>$lunchProtiens,
                    'lunchFat'=>$lunchFat,
                    'lunchCarbs'=>$lunchCarbs,
                    'hadDinner' => $hadDinner,
                    'dinnerCalories'=>$dinnerCalories,
                    'dinnerProtiens'=>$dinnerProtiens,
                    'dinnerFat'=>$dinnerFat,
                    'dinnerCarbs'=>$dinnerCarbs,
                    'totalCalories'=>$totalCalories,
                    'totalProtein'=>$totalProtein,
                    'totalFat'=>$totalFat,
                    'totalCarbs'=>$totalCarbs,
                );
         
                $this->suggestDiet($IntakeData, $bf_taken, $lunch_taken, $Dinner_taken);
            }
                
            else
                $this->showLogin ();
        
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
        
        public function showLogin(){
            $this->load->view('login');
        }
        
        
        //Rules
        public function suggestDiet($IntakeData, $bf_taken, $lunch_taken, $Dinner_taken) {
            
            $consumedBFCalories = number_format((($IntakeData["bfcalories"] / $IntakeData["totalCalories"])*100),0);

            $consumedLunchCalories = number_format((($IntakeData["lunchCalories"] / $IntakeData["totalCalories"])*100),0);

            $consumedDinnerCalories = number_format((($IntakeData["dinnerCalories"] / $IntakeData["totalCalories"])*100),0);
            
            
            $breakfast_items['bf_dishes'] = $bf_taken;
            
            $Lunch_items['lunch_dishes'] = $lunch_taken;
            
            $Dinner_items['dinner_dishes'] = $Dinner_taken;
            
            
            //Rule 1
            if($IntakeData["hadBF"] == 1 && ($consumedBFCalories > 10)  && ($consumedBFCalories < 20)){       
                  $rule1 = TRUE;
            }
            
            //Rule 2
            if($IntakeData["hadBF"] == 1 && ($consumedBFCalories > 20)){       
                  $rule2 = TRUE;
            }
            
            //Rule 3
            if($IntakeData["hadBF"] == 1 && ($consumedBFCalories < 10)){       
                  $rule3 = TRUE;
            }
            
            //Rule 4
            if($IntakeData["hadLunch"] == 1 && ($consumedLunchCalories == 50)){       
                  $rule4 = TRUE;
            }
            
            //Rule 5
            if($IntakeData["hadLunch"] == 1 && ($consumedLunchCalories > 50)){       
                  $rule5 = TRUE;
            }
            
            //Rule 6
            if($IntakeData["hadLunch"] == 1 && ($consumedLunchCalories < 50)){       
                  $rule6 = TRUE;
            }
            
            //Rule 7
            if($IntakeData["hadDinner"] == 1 && ($consumedDinnerCalories == 50)){       
                  $rule7 = TRUE;
            }
            
            //Rule 8
            if($IntakeData["hadDinner"] == 1 && ($consumedDinnerCalories > 50)){       
                  $rule8 = TRUE;
            }
            
            //Rule 9
            if($IntakeData["hadDinner"] == 1 && ($consumedDinnerCalories < 50)){       
                  $rule9 = TRUE;
            }
            
            
            
            
         }
}


