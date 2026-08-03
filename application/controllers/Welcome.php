<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
	    $this->load->helper('url');
        $this->load->library('session');
        $this->load->view('home');
		
	}
	public function save(){
		$this->load->helper('url');
        $this->load->library('session');
        $name = $this->input->post('name');
        $this->session->set_userdata('savename',$name);
        redirect('welcome');
		echo "Save function is working";


	}
	public function clear(){
		$this->load->helper('url');
		$this->load->library('session');
        $this->session->unset_userdata('savename');
		redirect('welcome');

	}
}
