<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Outlet_model");
    }

    function index()
    {
        $this->page_data["outlet"] = $this->Outlet_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/outlet/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            
                $data = array(
                    'outlet' => $input['outlet']
                );

                $this->Outlet_model->insert($data);

                redirect("outlet", "refresh");
            
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/outlet/add");
        $this->load->view("admin/footer");
    }

    function detail($outlet_id)
    {

        $where = array(
            "outlet_id" => $outlet_id
        );

        $outlet = $this->Outlet_model->get_where($where);

        $this->show_404_if_empty($outlet);

        $this->page_data["outlet"] = $outlet[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/outlet/detail");
        $this->load->view("admin/footer");
    }

    function edit($outlet_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'outlet_id' => $outlet_id
                );

                $data = array(
                    'outlet' => $input['outlet']
                );

                $this->Outlet_model->update_where($where, $data);

                redirect('outlet/detail/' . $outlet_id, "refresh");
            }
        }

        $where = array(
            "outlet_id" => $outlet_id
        );

        $outlet = $this->Outlet_model->get_where($where);

        $this->show_404_if_empty($outlet);

        $this->page_data["outlet"] = $outlet[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/outlet/edit");
        $this->load->view("admin/footer");
    }

    function delete($outlet_id)
    {
        $this->Outlet_model->soft_delete($outlet_id);

        redirect("outlet", "refresh");
    }

}
