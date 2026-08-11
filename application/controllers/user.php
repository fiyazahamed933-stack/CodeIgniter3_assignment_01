<?php
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');

        }
        public function signup(){
            $this->load->view('signup_form');
        }
        
        public function submit(){
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        if($this->form_validation->run() == FALSE){
            $this->load->view('signup_form');
            return;
        }
        if($this->session->userdata('user_email')) {
            redirect('user/signup_form');   
        }
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $first_name = trim($this->input->post('first_name'));
            $last_name = trim($this->input->post('last_name'));
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            $capssword = trim($this->input->post('cpassword'));
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $json_file = 'D:\xampp\htdocs\codeigniter\application\models\user_data.json';
            $users = [];
            if(file_exists($json_file)){
                $users = json_decode(file_get_contents($json_file), true) ?? [];
            }
            $email_exits = false;
            foreach($users as $user){
                if ($user['email'] == $email) {
                    $email_exits = true;
                    break;
                }
            }
            if($email_exits){
                $this->session->set_flashdata('error','email is already registrated');
                
            }
            else {
                $users[] = [
                    'first_name' => $first_name,
                    'last_name'  => $last_name,
                    'email'      => $email,
                    'password'   => $password_hash
                ];
                file_put_contents(("$json_file"),json_encode($users, JSON_PRETTY_PRINT));
                $this->session->set_flashdata('success','signup successfully');
                redirect('user/home');
            }
        }
      redirect('User/signup');
    }
        
        public function home(){
            $this->load->view('home');
            
        }
    }
?>