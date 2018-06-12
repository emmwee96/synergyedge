<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Admin_model");
    }

    function getLocations(){
        $search = $this->input->post("search");

        $sql = "SELECT * FROM outlet WHERE outlet LIKE ? OR address_2 LIKE ? OR customer_name LIKE ? or customer_code LIKE ?";
        $result = $this->db->query($sql,array(
            "%".$search."%",
            "%".$search."%",
            "%".$search."%",
            "%".$search."%"
        ))->result_array();

        die(json_encode(array(
            "status" => true,
            "data" => $result
        )));
    }


    function getProducts(){

        $search = $this->input->post("search");
        $sql = "SELECT * FROM item LEFT JOIN item_category ON item.item_category_id = item_category.item_category_id WHERE UPPER(item.item) LIKE UPPER(?) or UPPER(item_category.name) LIKE UPPER(?) ";
        $result = $this->db->query($sql,array(
            "%". $search ."%",
            "%". $search . "%"
        ))->result_array();

        die(json_encode(array(
            "status" => true,
            "data" => $result,
        )));
    }
}
