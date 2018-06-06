<?php

class Base_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Admin_model");
        $this->load->model("User_model");
        $this->load->model("Client_model");
    }

    function hash($password)
    {
        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

    function debug($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }

    function check_exists($username, $exclude_id = "")
    {

        $where = array(
            "username" => $username
        );

        if ($exclude_id == "") {

            $admin = $this->Admin_model->get_where($where);
            $user = $this->User_model->get_where($where);
            $client = $this->Client_model->get_where($where);

            if (empty($admin) and empty($user) and empty($client)) {
                return false;
            } else {
                return true;
            }
        } else if ($exclude_id != "") {
            $admin = $this->Admin_model->get_where_and_primary_is_not($where, $exclude_id);
            $user = $this->User_model->get_where_and_primary_is_not($where, $exclude_id);
            $client = $this->Client_model->get_where_and_primary_is_not($where, $exclude_id);

            if (empty($admin) and empty($user) and empty($client)) {
                return false;
            } else {
                return true;
            }
        }

    }

    function show_404_if_empty($array)
    {
        if (empty($array)) show_404();
    }

}

?>
