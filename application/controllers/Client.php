<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Role_model");
        $this->load->model("Client_model");
    }

    function index()
    {
        $this->page_data["client"] = $this->Client_model->get_all_with_role();

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/client/all");
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
                    'email' => $input['email'],
                    'contact' => $input['contact'],
                    'password' => $hash['password'],
                    'salt' => $hash['salt']
                );

                $this->Client_model->insert($data);

                redirect("client", "refresh");
            }
        }

        $this->page_data["role"] = $this->Role_model->get_type("CLIENT");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/client/add");
        $this->load->view("admin/footer");
    }

    function detail($client_id)
    {

        $where = array(
            "client_id" => $client_id
        );

        $client = $this->Client_model->get_where_with_role($where);

        $this->show_404_if_empty($client);

        $this->page_data["client"] = $client[0];

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/client/detail");
        $this->load->view("admin/footer");
    }

    function edit($client_id)
    {

        if ($_POST) {
            $input = $this->input->post();

            $error = false;

            $exists = $this->check_exists($input["username"], $client_id);

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
                    'client_id' => $client_id
                );

                $data = array(
                    'username' => $input['username'],
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'contact' => $input['contact'],
                    'role_id' => $input['role_id']
                );

                if (!empty($input['password'])) {
                    $hash = $this->hash['password'];
                    $data['password'] = $hash['password'];
                    $data['salt'] = $hash['salt'];
                }

                $this->Client_model->update_where($where, $data);

                redirect('client/detail/' . $client_id, "refresh");
            }
        }

        $where = array(
            "client_id" => $client_id
        );

        $client = $this->Client_model->get_where_with_role($where);

        $this->show_404_if_empty($client);

        $this->page_data["client"] = $client[0];
        $this->page_data["role"] = $this->Role_model->get_type("CLIENT");

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/client/edit");
        $this->load->view("admin/footer");
    }

    function delete($client_id)
    {
        $this->Client_model->soft_delete($client_id);

        redirect("Client", "refresh");
    }

}
