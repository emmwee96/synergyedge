<?php

class Project_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project";
    }
    
    function get_active_projects(){
        $this->db->select("*,
        (SELECT username FROM admin WHERE admin.admin_id = project.created_by) AS pic,
        (SELECT project_type FROM project_type WHERE project_type.project_type_id = project.project_type_id) AS project_type");
        $this->db->from("project");
        $this->db->where("deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_active_project_where($where){
        $this->db->select("*,
        (SELECT username FROM admin WHERE admin.admin_id = project.created_by) AS pic,
        (SELECT project_type FROM project_type WHERE project_type.project_type_id = project.project_type_id) AS project_type");
        $this->db->from("project");
        $this->db->where("deleted = 0");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}