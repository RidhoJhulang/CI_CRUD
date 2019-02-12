<?php 
	class MY_Controller extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->database();
			$this->load->library(array('form_validation','session'));
			$this->load->helper(array('url','text','form'));
			$this->load->model(array('member_m'));
		}
		public function login(){
			if($_POST){
			//tampung data dari form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//mendapatkan data member berdasarkan username
			$customers =$this->member_m->get_customers_by_username($username);

			//pengecekan password dari form dan database
			if(password_verify($password, $customers->password)){ 
				$this->session->set_userdata(array(
					'customer_id'	=>$customers->customer_id,
					'name'			=>$customers->name,
					'customers_loggedin' => TRUE
				));
			}	else {
				die('LOGIN FAILED');
			}
		}
	}
}	
?>    