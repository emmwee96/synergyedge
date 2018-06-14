<?php

class Project_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project";
    }
    
    function get_active_projects(){
        $this->db->select("*,
        (SELECT username FROM admin WHERE admin.admin_id = project.created_by) AS pic,
        (SELECT name FROM user WHERE user.user_id = project.user_id) AS supervisor");
        $this->db->from("project");
        $this->db->where("deleted = 0");

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_active_project_where($where){
        $this->db->select("*,
        (SELECT username FROM admin WHERE admin.admin_id = project.created_by) AS pic,
        (SELECT name FROM user WHERE user.user_id = project.user_id) AS supervisor");
        $this->db->from("project");
        $this->db->where("deleted = 0");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
    
}