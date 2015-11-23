<?php

class insert_Into extends CI_Model {
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function __construct() {
        $this->load->database();
        $this->load->library('session');
    }
    //insert data into suggestion from Expert
    public function insertInto_Suggestion(){
        $query = $this->db->query("insert into Suggestion_table_name ('')");
        return $query->result();
    }
    
    //get data from suggestion of Expert
    public function get_Suggestion(){
        $query = $this->db->query("select suggestion_details, user_id, expert_id from Suggestion_table");
        return $query->result();
    }
    
    //insert data into suggestion from User
    public function insertInto_Feedback(){
        $query = $this->db->query("insert into Feedback_table_name ('')");
        return $query->result();
    }
    
    //get data from feedback of Expert
    public function get_Feedback(){
        $query = $this->db->query("select feedbk_details, user_id, expert_id from Feedback_table");
        return $query->result();
    }
    
    // Get latests 5 tips of 
    public function getExpertAddrives(){
        $query = $this->db->query("select d.d_fname,d.d_lname,e.tips,e.timeoftip from experttips e,doctor d where 
            d.doctorid=e.doctorid and e.userid='UI001' order by e.dateoftip,e.timeoftip limit 5");  // For users put session userID.
        return $query->result();
    }

}