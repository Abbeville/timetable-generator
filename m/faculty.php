<?php

class facultymod extends model {

    function __construct() {
        parent::__construct();
           global $DATABASE;
        $DATABASE =$this->db;
    }
     
}