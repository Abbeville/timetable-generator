<?php

class Profile extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("profile");
        define("manager", "profile");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->edit();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {

                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function add_() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->view();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {

                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function editTeacher($username) {
        edit_teacher($username);
        header("Location: " . URL . "$type/view/" . $username);
    }

    public function edit($user) {
        $type = $_SESSION["type"];
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->teacher = $user;
            $this->view->display("$type/edit");
        } else {
            $this->view->teacher = $user;
            $this->view->render("$type/edit", TRUE);
        }
    }

    public function view($user) {
        $type = $_SESSION["type"];
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->$type = $user;
            $this->view->display("profile/view");
        } else {
            $this->view->teacher = $user;
            $this->view->render("$type/view", TRUE);
        }
    }
    public function view2($user) {
        $type = $_SESSION["type"];
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->user = $user;
            $this->view->display("$type/view");
        } else {
            $this->view->user = $user;
            $this->view->render("student/view", TRUE);
        }
    }

//        public function edit($user) {
//        edit_teacher($user);
//        header("Location: " . URL . "teachers/teacherProfile/" . $user);
//    }
// 
}
