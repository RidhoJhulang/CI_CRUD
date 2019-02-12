<?php
    class Member extends MY_Controller {
        public function __construct(){
			parent::__construct();
		} 	
        public function index(){
            $this->load->view('admin/member');

        }
        public function member_login(){
            $this->login();
            echo 'Anda berhasil Login';
        }
    } 
?>