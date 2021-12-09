<?php

class loginout extends controller {

    function __construct() {
        parent::__construct();
//        $this->loadmodel("AllClass");
    }

    function index() {
//        echo 'hkjjmhh';
        $common = new CommonModelmod();
        $common->login();
    }

    function logout() {
        $common = new CommonModelmod();
        $common->logout();
    }

}
