<?php

class Project_report_item_model extends Base_model
{

    function __construct()
    {
        parent::__construct();

        $this->table_name = "project_report_item";
    }

    function get_where_with_item($where)
    {
        $this->db->select("project_report_item.*, item.item AS item");
        $this->db->from("project_report_item");
        $this->db->join("item", "project_report_item.item_id = item.item_id", "left");
        $this->db->where($where);

        $query = $this->db->get();

        return $query->result_array();
    }
}