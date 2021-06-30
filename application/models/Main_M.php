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
	
	public function getCriteria(){
        $result =  $this->db->get('tbl_criteria');
        return $result->result();
    }
    public function getVaccine(){
        $result =  $this->db->get('tbl_vaccine');
        return $result->result();
    }
    public function getBarangay(){
        $result =  $this->db->query('select tbl_barangay.* from tbl_barangay,tbl_zone,tbl_person where tbl_barangay.barangay_id=tbl_zone.barangay_id AND tbl_zone.zone_id = tbl_person.zone_id group by barangay_name');
        return $result->result();
    }
    public function getStations(){
        $result =  $this->db->get('tbl_vaccine_station');
        return $result->result();
    }
    public function getList($bid){
        $result = $this->db->query('select tbl_person.* from tbl_person,tbl_zone,tbl_barangay where tbl_zone.zone_id=tbl_person.zone_id AND tbl_zone.barangay_id=tbl_barangay.barangay_id AND tbl_barangay.barangay_id='.$bid." order by tbl_person.person_lastName");
        return $result->result();
    }
}
