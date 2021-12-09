<?php

class courses extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("courses");
             define("manager", "courses");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Course_home();
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
            $this->RegNewClass();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {

                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function add() {
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->display("course/add");
        } else {
            $this->view->render("course/add", TRUE);
        }
    }

    public function edit($class) {
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->class = $class;
            $this->view->display("course/edit");
        } else {
            $this->view->class = $class;
            $this->view->render("course/edit", TRUE);
        }
    }

    public function Course_home() {
        $this->view->render("course/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addCourse() {
        create_course();
        header("Location: " . URL . "courses");
    }

    public function delete() {
        $user = $_POST["who"];
        delete_course($user);
    }
}
