<?php

class dashboard extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("dashboard");
           define("manager", "dashboard");
    }

    public function index() {
        Session::init();
//        $_SESSION["CustoAttendance_LOGGEDIN"] = true;
        if (Session::get("CustoAttendance_LOGGEDIN") == true) {
            $this->dashboard_home();
        } else {
            if (isset($_POST["username"])) {
                $common = new CommonModelmod();
                $common->login();
            } else { 
                $this->view->show_index("login", TRUE);
            }
        }
    }

    public function dashboard_home() {
           $this->view->allnotice = $this->model->getallnotice();
        $this->view->render("dashboard/index", TRUE);
    }
    public function addnew() {
          if (isset($_GET["headless"]) && $_GET["headless"] == true) {
      $this->view->display("dashboard/addnew");
        } else {
         $this->view-> render("dashboard/addnew",TRUE);
        }
 
          
    }
    
    public function editnotice($trans_id) {
             if (isset($_GET["headless"])&& $_GET["headless"]==true) {
                      $this->view->editnotice = $this->model->editnotice($trans_id);
   $this->view->display("dashboard/editnotice");
        } else {
            $this->view->render("dashboard/editnotice", TRUE);
        } 
        
    }
         public function newnotice() {
        $this->model->newnotice();
    }
        public function update() {
        $this->model->update();
    }
    public function delete() {
        $this->model->delete();
    }
    
}
