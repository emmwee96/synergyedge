<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_access extends Base_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Role_access_model");

        $this->page_data = array();
    }

    function generate_module()
    {
        $controllers = array();
        $this->load->helper('file');

        // Scan files in the /application/controllers directory
        // Set the second param to TRUE or remove it if you 
        // don't have controllers in sub directories
        $files = get_dir_file_info(APPPATH . 'controllers', false);

        // Loop through file names removing .php extension
        foreach (array_keys($files) as $file) {
            $controllers[] = str_replace('.php', '', $file);
        }

        $i = 0;
        foreach ($controllers as $row) {
            if ($row == "index.html") array_splice($controllers, $i, 1);
            $i++;
        }

        foreach ($controllers as $row) {
            $data = array(
                "module" => ucwords(str_replace("_", " ", $row)),
                "url" => strtolower($row),
            );

        }
    }
}
