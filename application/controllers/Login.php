<?php

    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
        }
        public function signin(){
            $this->load->view('login_form.php');
        }
        public function login_user(){
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('password', 'password' ,'required|trim' );
            if($this->form_validation->run() == FALSE){
                $this->load->view('login');
                return;
            }
            if($this->input->server('REQUEST_METHOD') == 'POST') {
                $email = trim($this->input->post('email'));
                $password = trim($this->input->post('password'));
                $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
                $users = [];
                if(file_exists($json_file)){
                    $users = json_decode(file_get_contents($json_file), true) ?? [];
                }
                $email_exits = false;
                foreach($users as $user){
                    if ($user['email'] == $email) {
                        $email_exits = true;
                        if (password_verify($password,$user["password"])) {
                            $this->session->set_userdata('email', $email);
                            redirect('user/home');
                            exit();
                        }
                        else{
                            $this->session->set_flashdata('error', 'Incorrect Password');
                             redirect('Login/signin');
                        }
                    }                  
                }
                 if(!$email_exits){
                        $this->session->set_flashdata('error', 'Invalid gmail');
                         redirect('Login/signin');
                    }
            }
        }
        public function home(){
            $this->load->view('home');
            
        }
    }
?>