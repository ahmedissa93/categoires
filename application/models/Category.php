<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_categories() {
        $query = $this->db->get("categories");
        return $query->result();
    }
    public function get_sub($id){

        $sql1 = 'SELECT * FROM categories WHERE id = ?';
        $binds = array($id);
        $query = $this->db->query($sql1, $binds)->result();
        $explode =explode(",",$query[0]->parent_id);

        $this->db->from('categories');
        $this->db->where_in('id',$explode);
        return $this->db->get()->result();
    }

}