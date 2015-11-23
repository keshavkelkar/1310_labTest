<?php

class Customer_signup_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------


 

      	function SaveForm($form_data)
	{
		$this->db->insert('userlogin', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return $form_data['user_id'];
		}
		
		return FALSE;
	}
        
        function SaveDiet($form_data)
	{
		$this->db->insert('balanced_diet', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return $form_data['user_id'];
		}
		
		return FALSE;
	}
}
?>