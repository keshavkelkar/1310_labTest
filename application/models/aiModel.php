<?php

class aiModel extends CI_Model{
    
    
            //$this->db->insert('donor', $donordata);
            
           
             
             
             public function insertIntoUserIntake( $userIntakeData){
                  $this->db->insert('userIntake', $userIntakeData);
             }
             
             public function getCalories($value){
                 //echo "value in model ";
                 //echo $value;
                 $this->load->database();
                 
                 echo $value;

                 $query = $this->db->query("select Calories from item where itemname = '$value'");
                // echo $query;
                //$usrdata=$query->result_array();
                $row = $query->row();
                $calories=$row->Calories;
                
                
                //echo $calories;
                return $calories;
//                $this->load->controller('aiController');
//                $this->aiController->calculateCalories($calo);


               // print_r($calo);
              // var_dump($calo);
             }
             
             public function getProtein($value){
                 //echo "value in model ";
                 //echo $value;
                 $this->load->database();

                 $query = $this->db->query("select Protein from item where itemname = '$value'");
                
                $row = $query->row();
                $protein=$row->Protein;
                //echo $protein;
                return $protein;
               
             }
             
             public function getFat($value){
                 //echo "value in model ";
                 //echo $value;
                 $this->load->database();

                 $query = $this->db->query("select Fat from item where itemname = '$value'");
                
                $row = $query->row();
                $fat=$row->Fat;
                //echo $fat;
                return $fat;
               
             }
             
             public function getCarbs($value){
                 //echo "value in model ";
                 //echo $value;
                 $this->load->database();

                 $query = $this->db->query("select Carbs from item where itemname = '$value'");
                
                $row = $query->row();
                $carbs=$row->Carbs;
                //echo $carbs;
                return $carbs;
               
             }
             
            public function getBalancedDiet($userId){
                $this->load->database();
                $query = $this->db->query("select * from balanced_diet where user_id = '$userId'");
                $row = $query->row();
                $balanced_diet = array(
                    'balancedCalories' => $row->calories,
                    'balancedProtein' => $row->protein,
                    'balancedFat' => $row->fat,
                    'balancedCarbs' => $row->carbs,
                );
                
                return $balanced_diet;
            }
            
            
            public function getDoctors(){
                $this->load->database();
                $query = $this->db->query("select * from userlogin where user_type = 'Patient'");
                $row = $query->row();
                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                    $data[] = $row;
                     }
                return $data;
                }
            return false;
            }
             
             public function addDoctors($doctor_data){
                  $this->db->insert('dietPat', $doctor_data);
                
            }
}