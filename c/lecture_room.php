<?php

class lecture_room extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("lecture_room");
             define("manager", "lecture_room");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->lectureRoom_home();
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
            $this->view->display("lecture_room/add");
        } else {
            $this->view->render("lecture_room/add", TRUE);
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

    public function lectureRoom_home() {
        $this->view->render("lecture_room/index", TRUE);
    }

    public function RegNewClass() {
        $this->view->render("allclass/addnew", TRUE);
    }

    public function addRoom() {
        create_lectureRoom();
        header("Location: " . URL . "lecture_room");
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
        delete_room($user);
    }
}
