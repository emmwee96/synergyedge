<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project_event extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Project_event_model");
        $this->load->model("Project_model");
        $this->load->model("Project_event_date_model");
        $this->load->model("Outlet_model");
    }

    function add($project_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;


            $data = array(
                'name' => $input['name'],
                'outlet_id' => $input['outlet_id'],
                'description' => $input['description'],
                'project_id' => $project_id,
                "created_by" => $this->session->userdata("login_id")
            );

            $this->Project_event_model->insert($data);

            redirect("project/detail/" . $project_id, "refresh");

        }

        $where = array(
            "project_id" => $project_id
        );

        $project = $this->Project_model->get_where($where);
        $this->page_data["outlet"] = $this->Outlet_model->get_all();

        $this->page_data["project"] = $project[0];


        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/add");
        $this->load->view("admin/footer");
    }

    function detail($project_event_id)
    {

        $where = array(
            "project_event.project_event_id" => $project_event_id
        );

        $project_event = $this->Project_event_model->get_active_project_events_where($where);

        $this->show_404_if_empty($project_event);

        $this->page_data["project_event"] = $project_event[0];
        $this->page_data["dates"] = $this->Project_event_date_model->get_active_project_event_dates_where($where);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/detail");
        $this->load->view("admin/footer");
    }

    function edit($project_event_id)
    {
        $where = array(
            "project_event_id" => $project_event_id
        );

        $project_event = $this->Project_event_model->get_active_project_events_where($where);

        $this->show_404_if_empty($project_event);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'project_event_id' => $project_event_id
                );

                $data = array(
                    'name' => $input['name'],
                    'description' => $input['description'],
                    'outlet_id' => $input['outlet_id']
                );

                $this->Project_event_model->update_where($where, $data);

                redirect('project_event/detail/' . $project_event[0]['project_event_id'], "refresh");
            }
        }

        $this->page_data["project_event"] = $project_event[0];
        $this->page_data["outlet"] = $this->Outlet_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/edit");
        $this->load->view("admin/footer");
    }

    function delete($project_event_id)
    {
        $where = array(
            "project_event_id" => $project_event_id
        );

        $project_event = $this->Project_event_model->get_active_project_events_where($where);

        $this->Project_event_model->soft_delete($project_event_id);

        redirect("project/detail/" . $project_event[0]["project_id"], "refresh");
    }

}
