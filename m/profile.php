<?php

class profilemod extends model {

    function __construct() {
        parent::__construct();
        global $DATABASE;
        $DATABASE = $this->db;
    }

    function upload_dir() {
        $resp = array(
            'basedir' => '/opt/lampp/htdocs/school/data/',
            'baseurl' => URL . 'data/'
        );
        return $resp;
    }

}
