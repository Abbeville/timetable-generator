<?php

class faculty extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("faculty");
             define("manager", "faculty");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Faculty_home();
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
            $this->view->display("faculty/add");
        } else {
            $this->view->render("faculty/add", TRUE);
        }
    }

    public function edit($class) {
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->class = $class;
            $this->view->display("faculty/edit");
        } else {
            $this->view->class = $class;
            $this->view->render("faculty/edit", TRUE);
        }
    }

    public function Faculty_home() {
        $this->view->render("faculty/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("faculty/addnew", TRUE);
    }

    public function addFaculty() {
        create_faculty();
        header("Location: " . URL . "faculty");
    }

    public function editClass() {
        edit_class($_POST['class_id']);
        header("Location: " . URL . "faculty");
    }


    public function delete() {
        $user = $_POST["who"];
        delete_faculty($user);
    }
}
