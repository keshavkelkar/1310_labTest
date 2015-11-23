<?php

class suggest_dish_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
        
        function getOWFood()
	{
		$this->db->select('bf_name')
                    ->from('breakfast') 
                    ->where('overweight=1')
                    ->DISTINCT('bf_name');
       
                $query = $this->db->get();
                                
                if ( $query->num_rows() > 0 ){
                    foreach ($query->result() as $row) {
                        $data[] = $row; 
                    }
                   return $data;
                    
                }
                else {return 0;}
        }
}
	