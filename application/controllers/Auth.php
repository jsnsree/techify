<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	 
	public function redirect_if_logged_in() {
		
		if($this->aauth->is_loggedin()){
			
			redirect('welcome');
			
		}
		
    }
	
	public function index(){
		
		$this->login();
		
	}
	
	public function login($errors = array()){
		
		$this->redirect_if_logged_in();
		
		$this->load->view('auth/login_form.php', $errors);
		
	}
	
	public function logout(){
		
		$this->aauth->logout();
		
		redirect('/');
		
	}
	
	public function do_login(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		// check string here
		
		$login = $this->aauth->login($username, $password);
		
		if($login){
			
			redirect('welcome');
			
		}else{
			
			$errors = $this->aauth->get_errors_array();
			
			$this->login(array('errors' => $errors));
			
			
		}
		
	}
	
	public function create(){
		
		var_dump($this->aauth->create_user('jsn@uoc.org', 'jsn@123', 'jsnsree'));
		
	}
	 
}
