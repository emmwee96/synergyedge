<?php

class Project_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project";
    }
    
    function get_active_projects(){
        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }
    
}