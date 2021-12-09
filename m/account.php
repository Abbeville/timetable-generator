<?php

class accountmod extends model {

    function __construct() {
        parent::__construct();
        
        global $DATABASE;
        $DATABASE = $this->db;
    }
 
    public function newexpenses() {
 
        $date_created = date("Y-m-d");
          $time = date("H:i:s");
 $Particular = $_POST["Particular"];
        $Amount = $_POST["Amount"];
        
         
        $acc_data = array(
            'particular' => ucwords($Particular),
            'amount' => $Amount,
            'date' => $date_created,
            'time' => $time,
         'status' => "0"
        );
      $this->db->insert("ysr_account", $acc_data);
   
    }
    public function edit_expense() {
 
//        $date_created = date("Y-m-d");
 $id = $_POST["id"];
 $Particular = $_POST["Particular"];
        $Amount = $_POST["Amount"];
        
         
        $acc_data = array(
            'particular' => ucwords($Particular),
            'amount' => $Amount,
         'status' => "0"
        );
//      $this->db->insert("ysr_transport", $trans_data);
    $this->db->update("ysr_account",$acc_data , "id=$id");
    }
    public function delete_expenses() {
 $id = $_POST["id"];
  $trans_data = array(
  'status' => "1"
        );
    $this->db->update("ysr_account",$trans_data , "id=$id");
    }
    
    public function getallexpenses() {
          return $this->db->select("SELECT * FROM `ysr_account` WHERE `status`='0' ORDER BY `id` DESC");
        
    }
    public function editexpenses($id) {
          return $this->db->select("SELECT * FROM `ysr_account` WHERE `status`='0'AND id ='".$id."'");
        
    }
}
 
