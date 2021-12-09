<?php

class allclass extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("allclass");
             define("manager", "class");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Class_home();
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
            $this->view->display("allclass/add");
        } else {
            $this->view->render("allclass/add", TRUE);
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

    public function Class_home() {
        $this->view->render("allclass/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addClass() {
        create_class();
        header("Location: " . URL . "allclass");
    }
    public function addsub_Class() {
        create_sub_class();
     header("Location: " . URL . "student/class_list/" . $_POST["classid"]);
    }

    public function editClass() {
        edit_class($_POST['class_id']);
        header("Location: " . URL . "allclass");
    }

    public function delete(){
        $class = $_POST['which'];

        delete_class($class);
    }
}
