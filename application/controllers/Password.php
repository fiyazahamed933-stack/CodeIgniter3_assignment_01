<?php

class Password extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    public function ChangePassword(){
        $this->load->view('ChangePassword');
    }
    public function update_password(){
        $this->form_validation->set_rules('cuurent_password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('new_password', ' New Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('Comfirm_password', 'Comfirm Password', 'trim|required|min_length[8]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('ChangePassword');
            return;
        }
        $cur_password = trim($this->input->post('cuurent_password'));
        $new_password = trim($this->input->post('new_password'));
        $conf_password = trim($this->input->post('Comfirm_password'));
        $password_hash = password_hash($new_password,PASSWORD_DEFAULT);
        $session_email = $this->session->userdata('email');
        $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
        $json = file_get_contents($json_file);
        $users = json_decode($json, true);
        foreach ($users as $key => $user){
        if($user['email'] == $session_email ){
            if($user['email'] == $session_email){
                if($user['password'] != $password_hash){
                    $this->session->set_flashdata('error','Current password is incorrect.');
                    redirect('Password/ChangePassword');
                }
                
                $users[$key]['password'] = $password_hash;
                file_put_contents(("$json_file"),json_encode($users, JSON_PRETTY_PRINT));
                $this->session->set_flashdata('success','update the password successfully');
                redirect('Password/ChangePassword');
            }
            }
            
            
        }
        
    }

    

    }




?>
        