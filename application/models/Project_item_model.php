<?php

class Project_item_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "project_item";
    }
    
}