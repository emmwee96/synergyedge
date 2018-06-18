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
        $this->load->model("Project_report_model");
        $this->load->model("Project_report_item_model");
        $this->load->model("Project_report_image_model");
        $this->load->model("Checklist_model");
        $this->load->model("User_model");
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
                'user_id' => $input['user_id'],
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

                foreach ($input["items"] as $item_row) {
                    $data = array(
                        "project_outlet_id" => $project_outlet_id,
                        "item_id" => $item_row
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

        $where = array(
            "role_id" => 3
        );

        $this->page_data["users"] = $this->User_model->get_where($where);

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
        $checklist = $this->Checklist_model->get_all();

        $project_outlet = $this->Project_outlet_model->get_project_outlets($project_id);

        $i = 0;
        foreach ($project_outlet as $row) {
            $project_outlet_checklist = $this->Project_outlet_checklist_model->get_where(array(
                "project_outlet_id" => $row["project_outlet_id"]
            ));
            foreach ($project_outlet_checklist as $project_outlet_checklist_row) {
                foreach ($checklist as $checklist_row) {
                    if ($project_outlet_checklist_row["checklist_id"] == $checklist_row["checklist_id"]) $project_outlet[$i][$checklist_row["checklist"]] = "YES";
                }
            }
            foreach ($checklist as $checklist_row) {
                if (empty($project_outlet[$i][$checklist_row["checklist"]])) $project_outlet[$i][$checklist_row["checklist"]] = "NO";
            }
            $i++;
        }
        // $this->debug($project_outlet);

        $this->page_data["checklist"] = $checklist;
        $this->page_data["project_outlet"] = $project_outlet;
        $this->page_data["project_outlet_item"] = $this->Project_outlet_item_model->get_project_outlet_items($project_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/detail");
        $this->load->view("admin/footer");
    }

    function edit($project_id)
    {

        $checklist = $this->db->get("checklist")->result_array();
        $outlets = $this->db->get_where("outlet")->result_array();
        if ($_POST) {
            $input = $this->input->post();

            // $this->debug($input);

            $error = false;

            if (!$error) {
                $where = array(
                    'project_id' => $project_id
                );

                $data = array(
                    'name' => $input['name'],
                    'user_id' => $input['user_id'],
                    'start_date' => date("Y-m-d", strtotime($input['startDate'])),
                    'end_date' => date("Y-m-d", strtotime($input['endDate'])),
                );

                $this->Project_model->update_where($where, $data);

                $this->Project_outlet_model->hard_delete_where($where);
                $this->Project_item_model->hard_delete_where($where);

                $project_outlet_checklists = $this->Project_outlet_checklist_model->get_project_outlet_checklists($project_id);
                $project_outlet_items = $this->Project_outlet_item_model->get_project_outlet_items($project_id);

                foreach ($project_outlet_checklists as $row) {
                    $where = array(
                        "project_outlet_checklist_id" => $row["project_outlet_checklist_id"]
                    );

                    $this->Project_outlet_checklist_model->hard_delete_where($where);
                }

                foreach ($project_outlet_items as $row) {
                    $where = array(
                        "project_outlet_item_id" => $row["project_outlet_item_id"]
                    );

                    $this->Project_outlet_item_model->hard_delete_where($where);
                }

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

                    foreach ($input["items"] as $item_row) {
                        $data = array(
                            "project_outlet_id" => $project_outlet_id,
                            "item_id" => $item_row
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

                redirect('project/detail/' . $project_id, "refresh");
            }
        }

        $where = array(
            "project_id" => $project_id
        );

        $project = $this->Project_model->get_where($where);

        $this->show_404_if_empty($project);

        $this->page_data['outlets'] = $outlets;
        $this->page_data['checklist'] = $checklist;
        $this->page_data["project"] = $project[0];
        $this->page_data["project_type"] = $this->Project_type_model->get_all();

        $where = array(
            "role_id" => 3
        );

        $this->page_data["users"] = $this->User_model->get_where($where);
        $this->page_data["project_outlets"] = $this->Project_outlet_model->get_project_outlets($project_id);
        $this->page_data["project_items"] = $this->Project_item_model->get_project_items($project_id);
        $this->page_data["project_outlet_checklists"] = $this->Project_outlet_checklist_model->get_project_outlet_checklists($project_id);

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/edit");
        $this->load->view("admin/footer");
    }

    function delete($project_id)
    {
        $this->Project_model->soft_delete($project_id);

        redirect("project", "refresh");
    }

    function project_outlet($project_id, $project_outlet_id)
    {
        $where = array(
            "project.project_id" => $project_id
        );

        $project = $this->Project_model->get_active_project_where($where);

        $this->show_404_if_empty($project);

        $this->page_data["project"] = $project[0];
        $this->page_data['project_outlet'] = $this->Project_outlet_model->get_where(array(
            "project_outlet_id" => $project_outlet_id
        ))[0];
        $this->page_data["project_outlet_item"] = $this->Project_outlet_item_model->get_where(array(
            'project_outlet_id' => $project_outlet_id
        ));

        $where = array(
            "project_outlet_id" => $project_outlet_id
        );

        $project_report = $this->Project_report_model->get_where($where);

        $i = 0;
        if (!empty($project_report)) {
            foreach ($project_report as $row) {
                $where = array(
                    "project_report_id" => $project_report[0]["project_report_id"]
                );

                $project_report_item = $this->Project_report_item_model->get_where_with_item($where);

                $time_12_3 = 0;
                $time_3_5 = 0;
                $time_6_9 = 0;
                $total = 0;

                foreach ($project_report_item as $item_row) {
                    $time_12_3 += $item_row["time_12_3"];
                    $time_3_5 += $item_row["time_3_5"];
                    $time_6_9 += $item_row["time_6_9"];
                    $total += $item_row["total"];
                }

                $project_report[$i]["items"] = $project_report_item;
                $project_report[$i]["time_12_3"] = $time_12_3;
                $project_report[$i]["time_3_5"] = $time_3_5;
                $project_report[$i]["time_6_9"] = $time_6_9;
                $project_report[$i]["total"] = $total;

                $i++;
            }
        }

        $this->page_data["project_report"] = $project_report;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/project_outlet");
        $this->load->view("admin/footer");
    }

    function add_report($project_id, $project_outlet_id)
    {

        $where = array(
            "project.project_id" => $project_id
        );

        $project = $this->Project_model->get_active_project_where($where);

        $this->show_404_if_empty($project);

        $project_outlet = $this->Project_outlet_model->get_where(array(
            "project_outlet_id" => $project_outlet_id
        ))[0];

        $project_outlet_item = $this->Project_outlet_item_model->get_where(array(
            'project_outlet_id' => $project_outlet_id
        ));

        if ($_POST) {
            $input = $this->input->post();

            $data = array(
                "title" => $input["title"],
                "date" => date("Y-m-d", strtotime($input["date"])),
                "report" => $input["report"],
                "status" => $input["status"],
                "project_id" => $project_id,
                "project_outlet_id" => $project_outlet_id,
                "created_by" => $this->session->userdata("login_id")
            );

            $project_report_id = $this->Project_report_model->insert($data);

            foreach ($project_outlet_item as $row) {
                $data = array(
                    "project_report_id" => $project_report_id,
                    "item_id" => $row["item_id"],
                    "feedback" => $input["item_" . $row["item_id"] . "_feedback"],
                    "time_12_3" => $input["item_" . $row["item_id"] . "_12_3"],
                    "time_3_5" => $input["item_" . $row["item_id"] . "_3_5"],
                    "time_6_9" => $input["item_" . $row["item_id"] . "_6_9"],
                    "total" => ($input["item_" . $row["item_id"] . "_12_3"] + $input["item_" . $row["item_id"] . "_3_5"] + $input["item_" . $row["item_id"] . "_6_9"])
                );

                $this->Project_report_item_model->insert($data);
            }

            if ($_FILES) {
                if (!empty($_FILES['report_images']['name'])) {
                    $urls = $this->multi_image_upload($_FILES, "report_images", "Report");

                    foreach ($urls as $url) {
                        $data = array(
                            "project_report_id" => $project_report_id,
                            "image" => $url
                        );

                        $this->Project_report_image_model->insert($data);
                    }
                }
            }

            redirect("project/project_outlet/" . $project_id . "/" . $project_outlet_id, "refresh");
        }

        $this->page_data["project"] = $project[0];
        $this->page_data['project_outlet'] = $project_outlet;
        $this->page_data["project_outlet_item"] = $project_outlet_item;

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/project/add_report");
        $this->load->view("admin/footer");
    }

}
