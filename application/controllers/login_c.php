<?php
class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('insert_Into');
        $this->load->library('session');
        $this->load->database();
	$this->load->helper('form');
	$this->load->helper('url');
        
    }
    
    public function do_logout(){
    $this->session->sess_destroy();
        redirect('index.php/home');
     }
    public function index(){
            
            $this->session->set_userdata('user_id');
          
            $sess_id = $this->session->userdata('user_id');
           
        
            if( $sess_id == "")
            { 
                 $this->load->view('login');
            }
    }
    public function index1($msg){
            
            $this->session->set_userdata('user_id');
          
            $sess_id = $this->session->userdata('user_id');
           
        
            if( $sess_id == "")
            {
               
                 
                 $this->load->view('login',$msg);
            }
    }
    
            
     public function process(){
                // Load the mode
                $this->load->model('login_model');
                
                // Validate the user can login
                $result = $this->login_model->validate();
                
                // Now we verify the result
                if(! $result){
                        $msg = '<font color=red>Invalid username and/or password.</font><br />';
                        $this->index1($msg);
                }

                else{
                    if($this->session->userdata('last_page') == "" ){
                        $data['tips']= $this->insert_Into->getExpertAddrives();
                        $this->load->view('userProfile', $data);
                    }
                    else{
                       redirect( $this->session->userdata('last_page')) ; 
                    }
                }        
    }
 }

?>
