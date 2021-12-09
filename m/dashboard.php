<?php

class dashboardmod extends model {

    function __construct() {
        parent::__construct();
        
        global $DATABASE;
        $DATABASE = $this->db;
    }
 
        public function newnotice() {
 
//        $date_created = date("Y-m-d");
 $Notice_title = $_POST["Notice_title"];
        $Noticebo = $_POST["Noticebo"];
        $startingDate = $_POST["startingDate"];
        $EndingDate = $_POST["EndingDate"];
         
        $notice_data = array(
            'notice_title' => ucwords($Notice_title),
            'notice' => ucwords($Noticebo),
     'create_timestamp' =>$startingDate,
            'end_timestamp' => $EndingDate,
         'status' => "0"
        );
      $this->db->insert("ysr_dashboard", $notice_data);
   
    }
 
        public function update() {
 
//        $date_created = date("Y-m-d");
 $id = $_POST["id"];
 $edit_notice_title = $_POST["edit_notice_title"];
        $edit_notice_data = $_POST["edit_notice_data"];
        $edit_stating_date = $_POST["edit_stating_date"];
        $edit_ending_date = $_POST["edit_ending_date"];
         
    $notice_data = array(
            'notice_title' => ucwords($edit_notice_title),
            'notice' => ucwords($edit_notice_data),
     'create_timestamp' =>$edit_stating_date,
            'end_timestamp' => $edit_ending_date,
         'status' => "0"
        );
    $this->db->update("ysr_dashboard",$notice_data , "id=$id");
    }
    public function delete() {
 $id = $_POST["id"];
  $data = array(
  'status' => "1"
        );
    $this->db->update("ysr_dashboard",$data , "id=$id");
    }
    
    public function getallnotice() {
          return $this->db->select("SELECT * FROM `ysr_dashboard` WHERE `status`='0'  ORDER BY `id` DESC");
        
    }
    public function editnotice($id) {
          return $this->db->select("SELECT * FROM `ysr_dashboard` WHERE `status`='0'AND id ='".$id."'");
        
    }
    
}
 
