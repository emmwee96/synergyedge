<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Project_model");
    }

    function index()
    {
        $this->page_data["project"] = $this->Project_model->get_active_projects();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            
                $data = array(
                    'name' => $input['name'],
                    'description' => $input['description'],
                    "created_by" => $this->session->userdata("login_id")
                );

                $this->Project_model->insert($data);

                redirect("project", "refresh");
            
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/add");
        $this->load->view("admin/footer");
    }

    function detail($project_id)
    {

        $where = array(
            "project_id" => $project_id
        );

        $project = $this->Project_model->get_where($where);

        $this->show_404_if_empty($project);

        $this->page_data["project"] = $project[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/detail");
        $this->load->view("admin/footer");
    }

    function edit($project_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'project_id' => $project_id
                );

                $data = array(
                    'name' => $input['name'],
                    'description' => $input['description']
                );

                $this->Project_model->update_where($where, $data);

                redirect('project/detail/' . $project_id, "refresh");
            }
        }

        $where = array(
            "project_id" => $project_id
        );

        $project = $this->Project_model->get_where($where);

        $this->show_404_if_empty($project);

        $this->page_data["project"] = $project[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/edit");
        $this->load->view("admin/footer");
    }

    function delete($project_id)
    {
        $this->Project_model->soft_delete($project_id);

        redirect("project", "refresh");
    }

}
