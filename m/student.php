<?php

class studentmod extends model {

    function __construct() {
        parent::__construct();
        global $DATABASE;
        $DATABASE = $this->db;
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        //  echo "$username";
        $val = $this->db->select("select * from users");
        foreach ($val as $key => $value) {
            if ($username == $value['Username'] && $password == $value['password']) {
                $name = "1";
                @session_start();
                $_SESSION["CustoAttendance_LOGGEDIN"] = $value["Username"];
                $_SESSION["MyAccessPoint"] = $value["usertype"];
                echo $name;
                return FALSE;
            }
        }
        echo "0";
    }

    function logout() {
        session_start();
        session_destroy();
//        echo 'logged out';
        header("Location: http://localhost/pharmacy");
    }
function get_all_subclass($id) {
 
  
    $query_result = $this->db->select("SELECT * FROM `ysr_class` ,`ysr_sub_class` where `ysr_class`.`class_id` = `ysr_sub_class`.`class_id` AND `ysr_class`.`class_id`='".$id."' ");

    echo json_encode($query_result);
}
function getclassidfromsubclass($id) {
 
  
    $query_result = $this->db->select("SELECT * FROM `ysr_sub_class` WHERE `id`='".$id."' ORDER BY `class_id` DESC  limit 1  ");
//    print_r($query_result);
    if (count($query_result)>0) {
        return $query_result [0] ["class_id"] ;
    }
    
}
function get_student_by_subclass($class_sub,$id) {
  $newarray = array();
   $school_student = 'ysr_student';
    $param = array(
        ":class_id" => $id,
        ":class_sub_id" => $class_sub,
    );
    $query_result = $this->db->select("SELECT * FROM $school_student WHERE class_id =  :class_id AND class_sub_id =  :class_sub_id", $param);
    
              foreach ($query_result as $rst) {
   $query_result2 = $this->db->select("SELECT * FROM `ysr_sub_class` where id ='".$rst["class_sub_id"]."'");
   if (count($query_result2)>0) {
        $subname = $query_result2[0]['sub_classname'];
               $rst["class_sub_id"] = $subname;
   }
 else {
     $rst["class_sub_id"] = "Not In Sub Class";  
   }
              
              
                 array_push($newarray, $rst);
  
            }
 
    echo json_encode($newarray);
}
 


}
