<?php

class Module_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "module";
    }
    
}