<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_M extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	}

    public function login($data){
        $this->db->where($data);
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0)
        {
            return $query->result_object();
        }
        else
        {
            return false;
        }
    }
	
}
