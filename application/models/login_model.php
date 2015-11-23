<?php 
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        $email =$this->input->post('username');
        $password =$this->input->post('password');
        $this->db->select('*')
          ->from('userlogin') 
          ->where('user_id' ,$email );
       
        $query = $this->db->get();
                
        $row=$query->row();
        if($row !=NULL){ 
            $passd=$row->password;
        
           $passwd = md5($password);
        
        
            if ($passd == $passwd)
            {
              
                    $row = $query->row();
                    $data = array(
                       'user_id' => $row->user_id,
                       'validated' => true
                    );
                    $this->session->set_userdata($data);
                   return true;
                
            }
            return false;
        }
    }
}
?>