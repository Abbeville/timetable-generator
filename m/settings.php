<?php

class settingsmod extends model {

    function __construct() {
        parent::__construct();
            global $DATABASE;
        $DATABASE = $this->db;
    }
 
    public function encrypt($data) {
    
     

    $iv = "1234567812345678";
    $pass = '1234567812345678';
    $method = 'aes-128-cbc';
    $cyper= openssl_encrypt ($data, $method, $pass, true, $iv);
//   $plain= decrypt($cyper);
    return $cyper;
    
}
public function decrypt($data) {
    
     

    $iv = "1234567812345678";
    $pass = '1234567812345678';
    $method = 'aes-128-cbc';
    $plain= openssl_decrypt ($data, $method, $pass, true, $iv);
//    return $plain;
    
}
    
      public function curr_settings() {
       
       return $this->db->select("SELECT * FROM ysr_settings order by settings_id");
       
       
    }  
    
      public function all_sesions() {
       
       return $this->db->select("SELECT * FROM ysr_sessions");
       
       
    }  
    
      public function all_terms() {
       
       return $this->db->select("SELECT * FROM ysr_terms");
       
       
    }  

    public function save() {
//         $system_name = $_POST['system_name'];
//         $saddress = $_POST['address'];
//         $phone = $_POST['phone'];
         $system_email = $_POST['system_email'];
//         $current_session = $_POST['current_session'];
//         $current_term= $_POST['current_current'];
         $submit_settings_website= $_POST['submit_settings_website'];
         $submit_settings_motto= $_POST['submit_settings_motto'];
         $submit_settings_next= $_POST['submit_settings_next'];
        
         $changepix= $_POST['changepix'];
//         $saddress = $_POST['address'];
        if ($changepix==="true") {
             $pixTemp= $_POST['pixTemp'];
                $this->savefile($pixTemp);
//                echo 'image';
        }
    
        
     
         $this->update_setting_row("next_term_begin", $submit_settings_next);
         
         ////////////////////////////
//         $this->update_setting_row("system_name", $this->encrypt($system_name));
//         $this->update_setting_row("address", $this->encrypt($saddress));
//          $this->update_setting_row("phone", $this->encrypt($phone));
         
         //////////////
//        
         $this->update_setting_row("system_email", $system_email);
//         $this->update_setting_row("current_session", $current_session);
//         $this->update_setting_row("current_term", $current_term);
         $this->update_setting_row("motto", $submit_settings_motto);
         $this->update_setting_row("website", $submit_settings_website);
         echo 1;
         
         
    }
    
    public function save2() {
         $system_name = $_POST['system_name'];
         $saddress = $_POST['address'];
         $phone = $_POST['phone'];
         
 
//         $submit_settings_website= $_POST['submit_settings_website'];
//         $submit_settings_motto= $_POST['submit_settings_motto'];
//         $submit_settings_next= $_POST['submit_settings_next'];
        
//         $changepix= $_POST['changepix'];
////         $saddress = $_POST['address'];
//        if ($changepix==="true") {
//             $pixTemp= $_POST['pixTemp'];
//                $this->savefile($pixTemp);
////                echo 'image';
//        }
    
        
     
//         $this->update_setting_row("next_term_begin", $submit_settings_next);
         
         ////////////////////////////
         $this->update_setting_row("system_name", $this->encrypt($system_name));
         $this->update_setting_row("address", $this->encrypt($saddress));
          $this->update_setting_row("phone", $this->encrypt($phone));
         
         //////////////
 
         echo 1;
         
         
    }
    

    public function switchs() {
 
         $current_session = $_POST['current_session'];
         $current_term= $_POST['current_current'];
         $this->getallstudent();
         
         
         $this->update_setting_row("current_session", $current_session);
         $this->update_setting_row("current_term", $current_term);

         
         
         echo 1;
         
         
    }
       
        public function get_current_termid() {
 
        $result= $this->db->select("SELECT * FROM `ysr_settings` ");
 
          if (!empty($result)) {
//              echo 'hhhhhhhh'.$result[5]["description"];
         return $result[5]["description"];
              
        } else {
//            return [];
        }
        }
               public function get_current_sessionid() {
 
        $result= $this->db->select("SELECT * FROM `ysr_settings` ");
//        print_r($result);
          if (!empty($result)) {
         
 
            
            return $result[0]["description"];
              
        } else {
//            return ;
        }
        }
        
    public function getallstudent() {
             $allstudent=$this->get_student();
                       foreach ($allstudent as $std) {
//                       echo $std ["id"];
//                       $tudent_id=$std ["id"] old varaible;
                       $admission_no=$std ["admission_no"];
                       $student_id=$std ["id"];
                       $c_session=  $this->get_current_sessionid();
                       $c_term=  $this->get_current_termid();
                       $class_id=$std ["class_id"];
                       $class_sub_id=$std ["class_sub_id"];
                       $this->checkifdetailexist($student_id, $admission_no, $c_session, $c_term, $class_id, $class_sub_id);
                      
                        }
    }
    
          public function get_student() {
//            $classname ='Diamondee';
        $result= $this->db->select("SELECT * FROM `ysr_student`");
 
          if (!empty($result)) {
//            return $result[0]['id']; 
            return $result; 
              
        } else {
            return [];
        }
        }
        
     function checkifdetailexist($student_id, $admission_no, $c_session, $c_term, $class_id, $class_sub_id) {
                 $result= $this->db->select("SELECT * FROM `ysr_students_archive` where  `ysr_students_archive`.`st_id` ='".$student_id."' AND `ysr_students_archive`.`admission_no`='".$admission_no."' AND `ysr_students_archive`.`session`='".$c_session."' AND  `ysr_students_archive`.`class_id`='".$class_id."' AND `ysr_students_archive`.`class_sub_id`='".$class_sub_id."'AND `ysr_students_archive`.`term`='".$c_term."' ORDER BY `st_id` ASC ");
 
          if (count($result) < 1) {
              
 
               $this->insertintoarchive($student_id, $admission_no, $c_session, $c_term, $class_id, $class_sub_id);
 
              
        } else {
 
        }
        }
    public function insertintoarchive($student_id,$admission_no,$c_session,$c_term,$class_id,$class_sub_id) {
       $date = date("Y-m-d");
            $time = date("H:i:s");
            $data = array(
                'st_id' => $student_id,
                'admission_no' => $admission_no,
                'session' => $c_session,
                'class_id' => $class_id,
                'class_sub_id' => $class_sub_id,
                'term' => $c_term
            );
            $this->db->insert('ysr_students_archive', $data);

           
            }
 
     public function savefile($file) {
        $name = "";
        for ($i = 0; $i < 30; $i++) {
            $key = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
            $name.= $key [array_rand($key)];
        }

 
        if (file_put_contents("data/school/" . $name."", "$file", FILE_USE_INCLUDE_PATH)) {
   $this->update_setting_row("logo", $name);  
        }
    }

    
     public function update_setting_row($title, $descrip) {
      $array = array("description" =>$descrip);

         $up_id=$this->type_to_id($title);
        $this->db->update("ysr_settings", $array, "settings_id=$up_id");
    
        }
        
      public function type_to_id($type) {
                $param288 = array(
            ':st' => "$type" 
                 );
         
         $aj=$this->db->select("SELECT settings_id FROM ysr_settings WHERE (type=:st)", $param288);
         return $aj[0]["settings_id"];
      }  
     
}
 