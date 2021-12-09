<?php

class student extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("students");
             define("manager", "students");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->student_home();
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
            $this->view->display("student/add");
        } else {
            $this->view->render("student/add", TRUE);
        }
    }

    public function edit($class) {
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->class = $class;
            $this->view->display("allclass/edit");
        } else {
            $this->view->class = $class;
            $this->view->render("allclass/edit", TRUE);
        }
    }

    public function student_home() {
        $this->view->render("student/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addStudent() {
        // create_student();
        header("Location: " . URL . "student");
    }
    
    public function delete() {
        $user = $_POST["who"];
        delete_lecturer($user);
    }
}
