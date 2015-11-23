<?php

class Signup_c extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
                $this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('signup_m');
                $this->load->model('send_email_m');
	}	
	function index()
	{	
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');			
		$this->form_validation->set_rules('user_id', 'Email ID', 'required|valid_email|max_length[40]');			
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[80]');			
		$this->form_validation->set_rules('gender', 'Gender', 'required');			
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required|is_numeric|max_length[11]');			
		$this->form_validation->set_rules('weight', 'Weight', 'required|is_numeric');			
		$this->form_validation->set_rules('cen', 'Height', 'required');			
		$this->form_validation->set_rules('age', 'Age', 'required|is_numeric|max_length[3]');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('signup_v');
		}
		else // passed validation proceed to post success logic
		{
			
                        $utype = $this->input->post('usertype');
                        
			$form_data = array(
                                                'user_type'=>$utype,
					       	'name' => set_value('name'),
					       	'user_id' => set_value('user_id'),
					       	'address' => set_value('address'),
					       	'gender' => set_value('gender'),
					       	'contact_no' => set_value('contact_no'),
					       	'weight' => set_value('weight'),
					       	'height' => set_value('height'),
					       	'age' => set_value('age'),
                                                );
                        
                        $calories = $this->input->post('rc');                        $protein = $this->input->post('rp');

                        $fat = $this->input->post('rf');
                        $carbs =  $this->input->post('rh');
                                                
                        var_dump($calories);
                        $this->load->library('form_validation');
                        $token_string= base64_encode($utype.'&&'.$this->input->post('name').'&&'.$this->input->post('user_id').'&&'.$this->input->post('address').'&&'.$this->input->post('gender').'&&'.$this->input->post('contact_no').'&&'.$this->input->post('weight').'&&'.$this->input->post('height').'&&'.$this->input->post('age').'&&'.$calories.'&&'.$fat.'&&'.$protein.'&&'.$carbs);   
                        $sms='Please verify your account by clicking this link:'.base_url().'index.php/confirm_email_c/index?token='.$token_string;
                        
                       
                        $sub='Customer Account Verification (Diet Expert)';
                        $form_data = array(
                                            'registered_email_id' => $form_data['user_id'],
                                            'message' => $sms,
                                            'name' => set_value('name'),
                                            'subject'=>$sub
                                            );

                        $this->send_email_m->SaveForm($form_data);
            }
        }
}    
?>