<?php

class Role_access_model extends Base_Model{
    
    function __construct(){
        parent::__construct();
        
        $this->table_name = "role_access";
    }
    
}