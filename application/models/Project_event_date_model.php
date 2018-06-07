<?php

class Project_event_date_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_event_date";
    }

    function get_active_project_event_dates_where($where){
        $this->db->select("project_event_date.*, project_event.name AS event, project.name AS project, project.project_id AS project_id");
        $this->db->from("project_event_date");
        $this->db->join("project_event", "project_event_date.project_event_id = project_event.project_event_id", "left");
        $this->db->join("project", "project_event.project_id = project.project_id", "left");
        $this->db->where("project_event_date.deleted = 0");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}