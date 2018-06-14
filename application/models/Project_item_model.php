<?php

class Project_item_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_item";
    }
    
    function get_project_items($project_id){
        $this->db->select("*");
        $this->db->from("project_item");
        $this->db->join("project", "project_item.project_id = project.project_id", "left");
        $this->db->join("item", "project_item.item_id = item.item_id", "left");
        $this->db->where("project_item.project_id", $project_id);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}