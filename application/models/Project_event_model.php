<?php

class Project_event_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_event";
    }
    
    function get_active_project_events(){
        $this->db->select("project_event.*, project.name AS project");
        $this->db->from("project_event");
        $this->db->join("project", "project_event.project_id = project.project_id", "left");
        $this->db->where("project_event.deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_active_project_events_where($where){
        $this->db->select("project_event.*, project.name AS project");
        $this->db->from("project_event");
        $this->db->join("project", "project_event.project_id = project.project_id", "left");
        $this->db->where("project_event.deleted = 0");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}