<?php

class Project_outlet_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_outlet";
    }
    
    function get_project_outlets($project_id){
        $this->db->select("*");
        $this->db->from("project_outlet");
        $this->db->join("project", "project_outlet.project_id = project.project_id", "left");
        $this->db->join("outlet", "project_outlet.outlet_id = outlet.outlet_id", "left");
        $this->db->where("project_outlet.project_id", $project_id);

        $query = $this->db->get();

        return $query->result_array();
    }

}