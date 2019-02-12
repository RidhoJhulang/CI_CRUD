<?php
    class Member_M extends CI_Model{
        public function get_customers_by_username($username){
            return $this->db->get_where('customers', array('username' => $username))->row();
        }
    }
?>