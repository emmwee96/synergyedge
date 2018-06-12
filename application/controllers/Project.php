<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Project extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Project_model");
        $this->load->model("Project_event_model");
        $this->load->model("Project_type_model");
        $this->load->model("Project_item_model");
        $this->load->model("Project_outlet_model");
        $this->load->model("Project_outlet_checklist_model");
        $this->load->model("Project_outlet_item_model");
        $this->load->model("Checklist_model");
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
        $checklist = $this->db->get("checklist")->result_array();
        $outlets = $this->db->get_where("outlet")->result_array();
        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $data = array(
                'name' => $input['name'],
                'start_date' => date("Y-m-d", strtotime($input['startDate'])),
                'end_date' => date("Y-m-d", strtotime($input['endDate'])),
                "created_by" => $this->session->userdata("login_id")
            );

            $project_id = $this->Project_model->insert($data);

            foreach ($input["items"] as $row) {
                $data = array(
                    "project_id" => $project_id,
                    "item_id" => $row
                );

                $this->Project_item_model->insert($data);

            }


            $checklist = $this->Checklist_model->get_all();

            foreach ($input["outlets"] as $row) {
                $data = array(
                    "project_id" => $project_id,
                    "outlet_id" => $row
                );

                $project_outlet_id = $this->Project_outlet_model->insert($data);

                foreach ($input["items"] as $row) {
                    $data = array(
                        "project_outlet_id" => $project_outlet_id,
                        "item_id" => $row
                    );
    
                    $this->Project_outlet_item_model->insert($data);
    
                }
    
                foreach ($checklist as $checklist_row) {
                    if (!empty($input["checklist_" . $checklist_row["checklist_id"] . "_" . $row])) {
                        $data = array(
                            "project_outlet_id" => $project_outlet_id,
                            "checklist_id" => $checklist_row["checklist_id"]
                        );

                        $this->Project_outlet_checklist_model->insert($data);
                    }
                }
            }

            redirect("project", "refresh");

        }

        $this->page_data['outlets'] = $outlets;
        $this->page_data['checklist'] = $checklist;
        $this->page_data["project_type"] = $this->Project_type_model->get_all();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/add");
        $this->load->view("admin/footer");
    }

    function detail($project_id)
    {

        $where = array(
            "project.project_id" => $project_id
        );

        $project = $this->Project_model->get_active_project_where($where);

        $this->show_404_if_empty($project);

        $this->page_data["project"] = $project[0];
        $this->page_data["events"] = $this->Project_event_model->get_active_project_events_where($where);

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
                    'year' => $input['year'],
                    'project_type_id' => $input['project_type_id'],
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
        $this->page_data["project_type"] = $this->Project_type_model->get_all();

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
