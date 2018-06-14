<?php

class Project_outlet_checklist_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_outlet_checklist";
    }
    
    function get_project_outlet_checklists($project_id){
        $this->db->select("*");
        $this->db->from("project_outlet_checklist");
        $this->db->join("project_outlet", "project_outlet_checklist.project_outlet_id = project_outlet.project_outlet_id", "left");
        $this->db->where("project_outlet.project_id", $project_id);

        $query = $this->db->get();

        return $query->result_array();
    }

}