<?php
    class user extends CI_Controller{
        public function signup(){
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->view('signup_form');
        }
        
        public function submit(){
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name' ,'required|trim' );
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
            $this->form_validation->set_rules('', 'Username', 'required|min_length[5]');
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
      redirect('user/signup');
    }

        public function login(){
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->view('login_form');
        }
        public function login_user(){
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('password', 'password' ,'required|trim' );
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
                            $this->session->set_userdata('user_email',$user['email']);
                            redirect('user/home');
                            exit();
                        }
                        else{
                            $this->session->set_flashdata('error', 'Incorrect Password');
                             redirect('user/login');
                        }
                    }                  
                }
                 if(!$email_exits){
                        $this->session->set_flashdata('error', 'Invalid gmail');
                         redirect('user/login');
                    }
            }
        }
        public function home(){
            $this->load->helper('url');
            $this->load->view('home');
            
        }
}
?>