<?php

class LogOut extends controller {

    function __construct() {
        parent::__construct();
//        $this->loadmodel("AllClass");
    }

    function login() {
        $common = new CommonModelmod();
        $common->login();
    }

    function index() {
        $common = new CommonModelmod();
        $common->logout();
    }

}
