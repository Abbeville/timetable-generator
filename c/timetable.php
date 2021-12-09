<?php

class timetable extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("timetable");
        define("manager", "timetable");
    }

    public function index() {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->home();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {

                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function home() {
        $this->view->render("timetable/home");
    }

    public function add($class_id, $class_name, $programme) {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->Regtimetable($class_id, $class_name, $programme);
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {
                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function addTimetable() {

        $t = create_timetable();
        if ($t === 'fail') {
            echo 'Time Table already exists';
        } else {
            // echo $t;
            $department =get_departmentId_from_classes($_POST["class_id"]);
            header("Location: " . URL . "timetable/class_list/" . 1);
        }
    }

    public function editTimetable($timetable) {
        if (edit_timetable(trim($timetable))) {
            header("Location: " . URL . "timetable/view/$timetable");
        }
    }

    public function class_list($department) {
        $this->view->department = $department;
        $this->view->render("timetable/index");
    }

    public function Regtimetable($class_id, $class_name, $programme) {
    	$this->view->class_id = $class_id;
        $this->view->render("timetable/add", TRUE);
    }

    public function filter($class) {
        Session::init();
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->filter_class();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else {

                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function filter_class() {
//        echo 'class id ' .$classid;
        $this->view->render("timetable/index", TRUE);
    }

    public function view($class_id) {
//        echo 'class id ' .$classid;
        if (isset($_GET["headless"]) && $_GET["headless"] == true) {
            $this->view->class_id = $class_id;
            $this->view->display("timetable/view");
        } else {
            $role = $_SESSION["type"];

            if ($role == 'admin') {
                $this->view->class_id = $class_id;

                if(classHaveTimetable($class_id) == true){

                    $this->view->render("timetable/view", TRUE);
                }else{
                    echo "No Time table for this class yet";
                }
            }elseif ($role == 'lecturer') {
                // var_dump('expression');exit();
                $this->view->lecturer_id = $class_id;

                if(lecturerHaveTimetable($class_id) == true){

                    $this->view->render("timetable/view", TRUE);
                }else{
                    echo "No timetable for you yet";
                }
            }else{
                $this->view->class_id = $class_id;
                if(classHaveTimetable($class_id) == true){

                    $this->view->render("timetable/view", TRUE);
                }else{
                    echo "No Time table for your class yet";
                }
            }
            
        }
    }

        public function edit($timetable ) {
            if (isset($_GET["headless"]) && $_GET["headless"] == true) {
                $this->view->timetable = $timetable;
                $this->view->display("timetable/edit");
            } else {
                $this->view->timetable = $timetable;
                $this->view->render("timetable/edit", TRUE);
            }
        }

        public function delete(){
            $class = $_POST['which'];

            delete_timetable($class);

            header("Location: " . URL . "timetable/class_list/" . $_POST['department']);
        }
}
