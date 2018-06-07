<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project_event_date extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Project_event_model");
        $this->load->model("Project_event_date_model");
        $this->load->model("Project_model");
    }

    function add($project_event_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'date_from' => date("Y-m-d", strtotime($input['date_from'])),
                'date_to' => date("Y-m-d", strtotime($input['date_to'])),
                'description' => $input['description'],
                'project_event_id' => $project_event_id,
                "created_by" => $this->session->userdata("login_id")
            );

            $this->Project_event_date_model->insert($data);

            redirect("project_event/detail/" . $project_event_id, "refresh");

        }

        $where = array(
            "project_event_id" => $project_event_id
        );

        $project_event = $this->Project_event_model->get_active_project_events_where($where);

        $this->page_data["project_event"] = $project_event[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/date/add");
        $this->load->view("admin/footer");
    }

    function detail($project_event_id)
    {

        $where = array(
            "project_event.project_event_id" => $project_event_id
        );

        $project_event_date = $this->Project_event_date_model->get_active_project_event_dates_where($where);

        $this->show_404_if_empty($project_event_date);

        $this->page_data["project_event_date"] = $project_event_date[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/date/detail");
        $this->load->view("admin/footer");
    }

    function edit($project_event_date_id)
    {
        $where = array(
            "project_event_date.project_event_date_id" => $project_event_date_id
        );

        $project_event_date = $this->Project_event_date_model->get_active_project_event_dates_where($where);

        $this->show_404_if_empty($project_event_date);

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            if (!$error) {
                $where = array(
                    'project_event_date_id' => $project_event_date_id
                );

                $data = array(
                    'description' => $input['description'],
                    'date_from' => date("Y-m-d", strtotime($input['date_from'])),
                    'date_to' => date("Y-m-d", strtotime($input['date_to']))
                );

                $this->Project_event_date_model->update_where($where, $data);

                redirect('project_event_date/detail/' . $project_event_date[0]['project_event_id'], "refresh");
            }
        }

        $this->page_data["project_event_date"] = $project_event_date[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/event/date/edit");
        $this->load->view("admin/footer");
    }

    function delete($project_event_date_id)
    {
        $where = array(
            "project_event_date_id" => $project_event_date_id
        );

        $project_event_date = $this->Project_event_date_model->get_active_project_event_dates_where($where);

        $this->Project_event_date_model->soft_delete($project_event_date_id);

        redirect("project_event/detail/" . $project_event_date[0]["project_event_id"], "refresh");
    }

}
