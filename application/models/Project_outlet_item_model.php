<?php

class project_outlet_item_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_outlet_item";
    }

    function get_project_outlet_items($project_id){
        $this->db->select("*");
        $this->db->from("project_outlet_item");
        $this->db->join("project_outlet", "project_outlet_item.project_outlet_id = project_outlet.project_outlet_id", "left");
        $this->db->join("outlet", "project_outlet.outlet_id = outlet.outlet_id", "left");
        $this->db->join("item", "project_outlet_item.item_id = item.item_id", "left");
        $this->db->where("project_outlet.project_id", $project_id);

        $query = $this->db->get();

        return $query->result_array();
    }

    function get_where($cond){
        $this->db->select("*");
        $this->db->from("project_outlet_item");
        $this->db->join("item", "project_outlet_item.item_id = item.item_id","left");
        $this->db->where($cond);
        $items= $this->db->get()->result_array();

        return $items;
        
    }
    
}