<?php

class lecturer extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("lecturer");
             define("manager", "lecturer");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Lecturer_home();
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
            $this->view->display("lecturer/add");
        } else {
            $this->view->render("lecturer/add", TRUE);
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

    public function Lecturer_home() {
        $this->view->render("lecturer/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addLecturer() {
        create_lecturer();
        header("Location: " . URL . "lecturer");
    }
    
    public function delete() {
        $user = $_POST["who"];
        delete_lecturer($user);
    }
}
