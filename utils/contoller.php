<?php

class controller {

//    private $view;
//    private $model;
    function __construct($nm = NULL) {
        $this->view = new view();
        $this->loadmodel($nm);
//        $this->session();
    }

    public function loadmodel($name) {
        $nm = "m/" . $name . ".php";
        if (file_exists($nm)) {
            include $nm;
            $name = $name . "mod";
            $this->model = new $name();
        }
    }

   /* public function session() {
        @session_start();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
//            $this->staff_home();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {
                $this->view->show_index("login", TRUE);
//                return;
                
            }
        }
    }*/

}
