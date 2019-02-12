<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table = "suppliers";

    public $supplier_id;
    public $name;
    public $address;
    public $phone_number;
    

    public function rules()
    {
        return [

            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'address',
            'label' => 'Address',
            'rules' => 'required'],

            ['field' => 'phone_number',
            'label' => 'Phone_number',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["supplier_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->supplier_id = uniqid();
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->phone_number = $post["phone_number"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->supplier_id = $post["id"];
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->phone_number = $post["phone_number"];
		
        $this->db->update($this->_table, $this, array('supplier_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("supplier_id" => $id));
	}

}
