<?php

class staffmod extends model {

    function __construct() {
        parent::__construct();
        global $DATABASE;
        $DATABASE =$this->db;
    }

    function upload_dir() {
        $resp = array(
            'basedir' => 'C:/laragon/www/attendance/data/',
            'baseurl' => URL . 'data/'
        );
        return $resp;
    }

// Create new teacher.
    function create_teacher() {
// Create  User role=teacher.
        if ($this->username_exists($_POST['username']) == null && $this->email_exists($_POST['email']) == false) {

//        // Adding to teacher table.
//        $data['ID'] = $user_id;
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['password'] = sha1($_POST['password']);
            $data['address'] = $_POST['address'];
            $data['phone'] = $_POST['phone'];
            $data['birthday'] = $_POST['birthday'];
            $data['sex'] = $_POST['sex'];
            $data['username'] = $_POST['username'];

            $teacher_id = $this->db->insert('ysr_teacher', $data);
//        $teacher_id = $this->db->lastInsertId(NULL); 
            $tid = $teacher_id[0]["id"];
            $upload_dir = $this->upload_dir();
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . 'teacher_image/' . $tid . '.jpg');

            return "success";
        } else {
            return 'fail: username or email exists';
        }
    }

    // Create new teacher.
    /*function create_teacher() {
// Create  User role=teacher.
        if ($this->username_exists($_POST['username']) == null && $this->email_exists($_POST['email']) == false) {

//        // Adding to teacher table.
//        $data['ID'] = $user_id;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = sha1($_POST['password']);
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $birthday = $_POST['birthday'];
            $sex = $_POST['sex'];
            $username = $_POST['username'];

            $teacher_id = $this->db->insertDB("insert into ysr_teacher(name,email,password,address,phone,birthday,sex,username) values('$name','$email','$password','$address','$phone','$birthday','$sex','$username')");
//        $teacher_id = $this->db->lastInsertId(NULL); 
            $tid = $teacher_id[0]["id"];
            $upload_dir = $this->upload_dir();
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . 'teacher_image/' . $tid . '.jpg');

            return "success";
        } else {
            return 'fail: username or email exists';
        }
    }*/

    function username_exists($username) {

        $resp = null;
        $hook = array(
            "admin",
            "teacher",
            "student",
            "parent"
        );

        foreach ($hook as $search) {
            $result = $this->db->select("select * from ysr_$search where username =:username", array(":username" => $username));
            if (count($result) > 0) {
//            return ;
                $resp = "found";
            }
        }
        return $resp;
//    $_POST['username']
    }

    function email_exists($email) {

        $resp = false;
        $hook = array(
            "admin",
            "teacher",
            "student",
            "parent"
        );

        foreach ($hook as $search) {
            $result = $this->db->select("select * from ysr_$search where email =:email", array(":email" => $email));
            if (count($result) > 0) {
                return true;
            }
        }
        return $resp;
    }

}
