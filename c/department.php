<?php

class department extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("department");
             define("manager", "department");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Department_home();
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
            $this->view->display("department/add");
        } else {
            $this->view->render("department/add", TRUE);
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

    public function Department_home() {
        $this->view->render("department/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addDepartment() {
        create_department();
        header("Location: " . URL . "department");
    }
    public function addsub_Class() {
        create_sub_class();
     header("Location: " . URL . "student/class_list/" . $_POST["classid"]);
    }

    public function editClass() {
        edit_class($_POST['class_id']);
        header("Location: " . URL . "allclass");
    }

    public function delete() {
        $user = $_POST["who"];
        delete_course($user);
    }
}
