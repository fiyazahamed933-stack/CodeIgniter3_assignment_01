<?php

class Profile extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    public function details(){
        $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
        $session_email = $this->session->userdata('email');
        
        $json = file_get_contents($json_file);  
        $users = json_decode($json , true );
       
        $data['user'] = null;
        foreach($users as $user){
            if($user['email'] == $session_email ){
                $data['user'] = $user;
                break;
            }

        }

        if($data['user'] === NULL){
            echo "user not found ";
            return;
        }
        $this->load->view('profiledetails', $data);
    }
    public function update(){
       

    $this->form_validation->set_rules(
        'first_name',
        'First Name',
        'required|trim'
    );
    $this->form_validation->set_rules(
        'last_name',
        'last Name',
        'required|trim'
    );
    $this->form_validation->set_rules('email', 'Email', 'required');

   


    if($this->form_validation->run() == FALSE){
        $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
        $session_email = $this->session->userdata('email');
        $json = file_get_contents($json_file);
        $users = json_decode($json, true);
        $data['user'] = null;
        foreach($users as $user){
            if($user['email'] == $session_email){
            $data['user'] = $user;
            break;
            }
        }
          if ($data['user'] === null) {

                echo "user not found";

                return;
            }
        $this->load->view('profiledetails', $data);
        return;
    }
    $first_name = trim($this->input->post('first_name'));
    $last_name = trim($this->input->post('last_name'));
    $user_email = trim($this->input->post('email'));
    $session_email = $this->session->userdata('email');
    $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
    $json = file_get_contents($json_file);
    $users = json_decode($json, true);
    
    foreach ($users as $key => $user){
        if($user['email'] == $session_email ){
            $users[$key]['first_name'] = $first_name;
            $users[$key]['last_name'] = $last_name;
            $users[$key]['email'] = $user_email;
            break;
        }
    }
    $update_json = json_encode($users,JSON_PRETTY_PRINT);   
    file_put_contents($json_file,$update_json);
    $this->session->set_userdata('email', $user_email);
    redirect('profile/details');
}
}



?>
        