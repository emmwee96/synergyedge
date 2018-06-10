<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Item_model");
    }

    function index()
    {
        $this->page_data["item"] = $this->Item_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/item/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            
                $data = array(
                    'item' => $input['item'],
                    'price' => $input['price'],
                );

                $this->Item_model->insert($data);

                redirect("item", "refresh");
            
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/item/add");
        $this->load->view("admin/footer");
    }

    function detail($item_id)
    {

        $where = array(
            "item_id" => $item_id
        );

        $item = $this->Item_model->get_where($where);

        $this->show_404_if_empty($item);

        $this->page_data["item"] = $item[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/item/detail");
        $this->load->view("admin/footer");
    }

    function edit($item_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'item_id' => $item_id
                );

                $data = array(
                    'item' => $input['item'],
                    'price' => $input['price']
                );

                $this->Item_model->update_where($where, $data);

                redirect('item/detail/' . $item_id, "refresh");
            }
        }

        $where = array(
            "item_id" => $item_id
        );

        $item = $this->Item_model->get_where($where);

        $this->show_404_if_empty($item);

        $this->page_data["item"] = $item[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/item/edit");
        $this->load->view("admin/footer");
    }

    function delete($item_id)
    {
        $this->Item_model->soft_delete($item_id);

        redirect("item", "refresh");
    }

}
