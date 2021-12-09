<?php

class attendance extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("attendance");
        define("manager", "attendance");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->attendance_home();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {
                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function manage() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Manageattendance();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {
                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function today() {
        $this->view->all_classes = $this->model->get_all_classes();
        $this->view->my_classes = $this->model->getClassByTeacher();

        $this->view->render("attendance/today", TRUE);
    }

    public function attendance_home() {
        $this->view->all_classes = $this->model->get_all_classes();
        $this->view->my_classes = $this->model->getClassByTeacher();

        $this->view->render("attendance/index", TRUE);
    }

    public function Manageattendance() {
        $this->view->all_classes = $this->model->get_all_classes();

        $this->view->render("attendance/addnew", TRUE);
    }

    public function view_to_manage() {


        $this->view->current_class_attendance = $this->model->current_class_attendance();

        $this->view->display("attendance/manage_by_class");
    }

    public function add_to_today() {


        $this->view->current_marking_date = $_GET['viewing_date'];
        $this->view->all_class_students = $this->model->all_class_students();

        $this->view->display("attendance/add_today");
    }

    public function view_to_view() {


        $this->view->current_class_attendance = $this->model->current_class_attendance();

        $this->view->display("attendance/view_class");
    }

    public function update_att_with_present() {
        $this->model->update_att_with_present();
    }

    public function update_att_with_absent() {
        $this->model->update_att_with_absent();
    }

    public function mark_att_with_present() {
        $this->model->mark_att_with_present();
    }

    public function mark_att_with_absent() {
        $this->model->mark_att_with_absent();
    }

//  public function edit($exam) {
//           if (isset($_GET["headless"]) && $_GET["headless"] == true) {
//            $this->view->display("exam/edit");
//        } else {
//            $this->view->render("exam/edit", TRUE);
//        }
//  }
//  public function add() {
//           if (isset($_GET["headless"]) && $_GET["headless"] == true) {
//            $this->view->display("exam/add");
//        } else {
//            $this->view->render("exam/add", TRUE);
//        }
//  }
}
