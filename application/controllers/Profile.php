<?php

    class Profile extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->library('form_validation');

        }
        public function details(){
            $this->load->view('profiledetails.php');
        }
       
    }
?>