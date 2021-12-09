<?php

class coursesmod extends model {

    function __construct() {
        parent::__construct();
           global $DATABASE;
        $DATABASE =$this->db;
    }
     
}
 
