<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Admin_model");
    }

    function index()
    {
        $this->page_data["admin"] = $this->Admin_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/all");
        $this->load->view("admin/footer");
    }

    function add()
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"]);

            if ($exists) {
                $error = true;
                $this->page_data["error"] = "Username already exists.";
                $this->page_data["input"] = $input;
            }
            if ($input["password"] != $input["password2"]) {
                $error = true;
                $this->page_data["error"] = "Passwords do not match";
                $this->page_data["input"] = $input;
            }

            if (!$error) {
                $hash = $this->hash($input['password']);

                $data = array(
                    'username' => $input['username'],
                    'role_id' => $input['role_id'],
                    'name' => $input['name'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt']
                );

                $this->Admin_model->insert($data);

                redirect("admin", "refresh");
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("ADMIN");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/add");
        $this->load->view("admin/footer");
    }

    function detail($admin_id)
    {

        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where_with_role($where);

        $this->show_404_if_empty($admin);

        $this->page_data["admin"] = $admin[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/detail");
        $this->load->view("admin/footer");
    }

    function edit($admin_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $admin_id);

            if ($exists) {
                $error = true;
                $this->page_data["error"] = "Username already exists.";
                $this->page_data["input"] = $input;
            }
            if (!empty($input['password'])) {
                if ($input["password"] != $input["password2"]) {
                    $error = true;
                    $this->page_data["error"] = "Passwords do not match";
                    $this->page_data["input"] = $input;
                }
            }

            if (!$error) {
                $where = array(
                    'admin_id' => $admin_id
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'role_id' => $input['role_id']
                );

                if (!empty($input['password'])) {
                    $hash = $this->hash['password'];
                    $data['password'] = $hash['password'];
                    $data['salt'] = $hash['salt'];
                }

                $this->Admin_model->update_where($where, $data);

                redirect('admin/detail/' . $admin_id, "refresh");
            }
        }

        $where = array(
            "admin_id" => $admin_id
        );

        $admin = $this->Admin_model->get_where_with_role($where);

        $this->show_404_if_empty($admin);

        $this->page_data["admin"] = $admin[0];
        $this->page_data["role"] = $this->Role_model->get_type("ADMIN");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/admin/edit");
        $this->load->view("admin/footer");
    }

    function delete($admin_id)
    {
        $this->Admin_model->soft_delete($admin_id);

        redirect("admin", "refresh");
    }

}
