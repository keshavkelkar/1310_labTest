<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        function __construct(){
                parent::__construct();
                $this->load->model('DietModel');
                $this->load->model('aiModel');
                $this->load->library('session');
                $this->load->database();
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->model('insert_Into');

        }
    
        
	public function index()
	{
             $this->load->view('homePage');
	}
        // Display Expert Tips on Right Bottom
        public function getTipsOfExpert() {
            if($this->session->userdata('user_id')!= NULL){
                $data['tips']= $this->insert_Into->getExpertAddrives();
                $this->load->view('userProfile', $data);
            }
            else
                $this->showLogin ();
        }
      
        public function showProfile(){
            if($this->session->userdata('user_id')!= NULL){    
                $data['tips']= $this->insert_Into->getExpertAddrives();                 
                $this->load->view('userProfile',$data);
            }
            else
                $this->showLogin ();
        }
            
        
        public function showHome(){
            $this->load->view('homepage');
        }
        
        public function guestForm(){
            $this->session->sess_destroy();
            $this->load->view('guest_V');
        }
        
        public function showFruits(){
            if($this->session->userdata('user_id')!= NULL){    
                $this->load->view('fruits');
            }
            else
                $this->showLogin ();    
        }
        
        public function getDietician(){
            if($this->session->userdata('user_id')!= NULL){    
                $data['doctors']= $this->aiModel->getDoctors();                 
                $this->load->view('joinDietician',$data);
            }
            else
                $this->showLogin ();
        }
        
        public function addDietician(){
            echo $this->input->post('doctors');
            if($this->session->userdata('user_id')!= NULL){ 
                $dieticianId = $this->input->post('doctors');
               $doctor_data = array(
               //'dietPatId' => ;
               'dieticianId' => set_value('doctors'),
               'patientId'=>$this->session->userdata('user_id') 
               );
               
               $this->load->model('aiModel');
         
               $this->aiModel->addDoctors($doctor_data);
            
            
            //$this->load->view('donorHome');
            }
            else
                $this->showLogin ();
        }
        
        
        public function showLogin(){
            $this->load->view('login');
        }
        
        public function Logout(){
            $this->session->sess_destroy();
            $this->load->view('homepage');
            
        }

        public function calCalori(){
            if($this->session->userdata('user_id')!= NULL){
                $this->load->view('calCalori');
            }
            else
                $this->showLogin ();   
        }
        
        public function showIntake(){
            if($this->session->userdata('user_id')!= NULL){
                $this->load-> model('getDishes');
                $data['breakfast'] = $this->getDishes->getBreakfast();
                $data['lunch'] = $this->getDishes->getLunch();
                $data['dinner'] = $this->getDishes->getDinner();
                $this->load->view('userIntake', $data);
            }
            else
                $this->showLogin ();   
        }        
}
