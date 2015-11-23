<?php

class DietModel extends CI_Model{
    
    
            public function insertIntoUserIntake( $userIntakeData){
                  $this->db->insert('userIntake', $userIntakeData);
             }
             
            public function getCalories($value){
                
                $this->load->database();
                $query = $this->db->query("select Calories from item where itemname = '$value'");
                
                $row = $query->row();
                $calories=$row->Calories;
                
                return $calories;
             }
             
            public function getProtein($value){
                $this->load->database();

                $query = $this->db->query("select Protein from item where itemname = '$value'");
                
                $row = $query->row();
                $protein=$row->Protein;
                
                return $protein;
               
             }
             
            public function getFat($value){
                 
                $this->load->database();
                
                $query = $this->db->query("select Fat from item where itemname = '$value'");
                $row = $query->row();
                $fat=$row->Fat;
                return $fat;
                
             }
             
            public function getCarbs($value){
                $this->load->database();

                $query = $this->db->query("select Carbs from item where itemname = '$value'");
                
                $row = $query->row();
                $carbs=$row->Carbs;
               
                return $carbs;
               
            }
             
            public function getBalancedDiet(){
                $this->load->database();
                $query = $this->db->query("select * from balanced_diet");
                return $query;
            }             
}