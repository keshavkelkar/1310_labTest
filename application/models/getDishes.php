<?php

class getDishes extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	
        function getBreakfast()
	{
            $this->db->select('itemname')
                    ->from('item') 
                    ->where('itemType ="Breakfast"');
       
                $query = $this->db->get();
                                
                if ( $query->num_rows() > 0 ){
                    foreach ($query->result() as $row) {
                        $data[] = $row; 
                    }
                   return $data;
                    
                }
                else return false;
        }
        
        function getLunch()
	{
            $this->db->select('itemname')
                    ->from('item') 
                    ->where('itemType ="LD"');
       
                $query = $this->db->get();
                                
                if ( $query->num_rows() > 0 ){
                    foreach ($query->result() as $row) {
                        $data[] = $row; 
                    }
                   return $data;
                    
                }
                else return false;
        }
        
        function getDinner()
	{
            $this->db->select('itemname')
                    ->from('item') 
                    ->where('itemType ="LD"');
       
                $query = $this->db->get();
                                
                if ( $query->num_rows() > 0 ){
                    foreach ($query->result() as $row) {
                        $data[] = $row; 
                    }
                   return $data;
                    
                }
                else return false;
        }

}