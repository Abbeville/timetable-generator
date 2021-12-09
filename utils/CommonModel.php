<?php

class CommonModelmod extends model {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $hooks = array(
            "users" => "admin",
            "lecturer" => "lecturer",
            "students" => "student",
            "parent" => "parent"
        );

        $username = $_POST['username'];
        $password = $_POST['pass'];

        $param = array(
            ":username" => $username,
            ":password" => $password
        );
        foreach ($hooks as $tbl => $role) {
            // $val = $this->db->select("select * from $tbl where username =:username AND password =:password", $param);
            $val = $this->db->select("select * from $tbl where username =:username AND password =:password", $param);
            $count = count($val);
            if ($count > 0) {
                @session_start();
                $_SESSION["CustoAttendance_LOGGEDIN"] = "true";
                $_SESSION["type"] = $role;
                $_SESSION["id"] = $username;
                $_SESSION["TIMEid"] = $val[0]['id'];
                if($role == 'student'){
                    $_SESSION['class_id'] = $val[0]['class_id'];
                }
                echo '1';
            } 
        }
    }

    function student_class_id($student_id) {


        $param = array(
            ":id" => "$student_id"
        );
        $query_result = $this->db->select("SELECT class_id FROM ysr_student WHERE id = :id ", $param);

        foreach ($query_result as $row) {
            return $row['class_id'];
        }
    }

    function get_all_classes() {


        $query_result = $this->db->select("SELECT * FROM ysr_class");

        return $query_result;
    }

    function logout() {
        session_start();
        session_destroy();
        //echo 'logged out';
        header("Location: http://localhost/pr-timetable");
    }

}

//=========================================== Utility Functions==========================================
function encrypt($data) {
    $iv = "1234567812345678";
    $pass = '1234567812345678';
    $method = 'aes-128-cbc';
    $cyper = openssl_encrypt($data, $method, $pass, true, $iv);
//   $plain= decrypt($cyper);
//    return "ecvry".$cyper."plain".$plain;
}

function decrypt($data) {
    $iv = "1234567812345678";
    $pass = '1234567812345678';
    $method = 'aes-128-cbc';
    $plain = openssl_decrypt($data, $method, $pass, true, $iv);
    return $plain;
}

function class_subject($class_id) {
    global $DATABASE;
    $param = array(
        ':st' => $class_id
    );

    $val = $DATABASE->select("SELECT * FROM ysr_subject WHERE (class_id=:st)", $param);


    foreach ($val as $key => $value) {
        $param2 = array(
            ':st' => $value["teacher_id"]
        );
//            echo  $cur["id"];
        $uname = $DATABASE->select("SELECT name FROM ysr_teacher WHERE (id=:st)", $param2);
//              array_push($array, $uname)
        if (count($uname) > 0) {
            $val[$key]["teacher_name"] = $uname[0]["name"];
        } else {
            $val[$key]["teacher_name"] = "NO TEACHER";
        }
//            array_push($val, $cur);
    }

    return $val;
}


// Get all notices.
function get_noticeboards() {
    global $DATABASE;
    $school_noticeboard = 'noticeboard';
    $query_result = $DATABASE->select("SELECT * FROM $noticeboard WHERE status=0");
    return $query_result;
}

function upload_dir() {
    $resp = array(
        'basedir' => 'C:/laragon/www/pr-timetable/data/',
        'baseurl' => URL . 'data/'
    );
    return $resp;
}

function username_exists($username) {
    global $DATABASE;
    $resp = null;
    $hook = array(
        "admin",
        "lecturer"
    );

    foreach ($hook as $search) {
        $result = $DATABASE->select("select * from $search where username =:username", array(":username" => $username));
        if (count($result) > 0) {
//            return ;
            $resp = "found";
        }
    }
    return $resp;
//    $_POST['username']
}

function email_exists($email) {
    global $DATABASE;
    $resp = false;
    $hook = array(
        "users",
        "lecturer"
    );

    foreach ($hook as $search) {
        $result = $DATABASE->select("select * from $search where email =:email", array(":email" => $email));
        if (count($result) > 0) {
            return true;
        }
    }
    return $resp;
}

function matric_exists($matric) {
    global $DATABASE;
    $resp = false;
    $hook = array(
        "students"
    );

    foreach ($hook as $search) {
        $result = $DATABASE->select("select * from $search where matric =:matric", array(":matric" => $matric));
        if (count($result) > 0) {
            return true;
        }
    }
    return $resp;
}

// Delete a student.
function delete_student($student_id = '') {
    $upload_dir = upload_dir();
    $sid = get_student_id_from_name($student_id);
    unlink($upload_dir['basedir'] . '/ysr/student_image/' . $sid . '.jpg');
    global $DATABASE;
    $DATABASE->delete('ysr_student', "id = $sid");
}

// Create new teacher.
function create_lecturer() {
    global $DATABASE;

    if (email_exists($_POST['email']) == false) {

        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['phone'] = $_POST['phone'];
        $data['sex'] = $_POST['sex'];
        $data['department'] = $_POST['department_id'];

        $lecturer_id = $DATABASE->insert('lecturer', $data);
        return "success";
    } else {
        return 'fail';
    }
}

// Create new student.
function create_student() {
    global $DATABASE;

    if (matric_exists($_POST['matric']) == false) {

        $data['fname'] = $_POST['fname'];
        $data['lname'] = $_POST['lname'];
        $data['username'] = $_POST['username'];
        $data['matric'] = $_POST['matric'];
        $data['department_id'] = $_POST['department_id'];
        $data['class_id'] = $_POST['class_id'];
        $data['password'] = $_POST['password'];
        $data['created_at'] = date('Y-m-d H:m:s', time());

        $lecturer_id = $DATABASE->insert('students', $data);
        return 'success';
    } else {
        return 'fail';
    }
}

// Get all lecturers.
function get_lecturers() {
    global $DATABASE;
    $school_lecturer = 'lecturer';

    $query_result = $DATABASE->select("SELECT * FROM $school_lecturer");
    if($query_result > 0){
        return $query_result;
    }else{
        return null;
    }
    
}

// Get all lecturers.
function get_students() {
    global $DATABASE;
    $school_lecturer = 'students';

    $query_result = $DATABASE->select("SELECT * FROM $school_lecturer");
    if($query_result > 0){
        return $query_result;
    }else{
        return null;
    }
    
}

// Get all Days of the week.
function get_days() {
    global $DATABASE;
    $week_days = 'days_of_the_week';

    $query_result = $DATABASE->select("SELECT * FROM $week_days");
    if($query_result > 0){
        return $query_result;
    }else{
        return null;
    }
    
}

// Get all Days of the week.
function get_periods() {
    global $DATABASE;
    $periods = 'periods';

    $query_result = $DATABASE->select("SELECT * FROM $periods");
    if($query_result > 0){
        return $query_result;
    }else{
        return null;
    }
    
}

// Get information of certain lecturer.
function get_lecturer_info($id = '') {
    global $DATABASE;
//       $lecturer_id = get_lecturer_name_from_id($id);
    $school_lecturer = 'lecturer';
    $param = array(
        ":lecturer_id" => $id
    );

    $query_result = $DATABASE->select("SELECT * FROM $school_lecturer WHERE id = :lecturer_id ", $param);
    return $query_result;
}

// Get lecturer name from lecturer id.
function get_lecturer_name_from_id($lecturer_id = '') {
    global $DATABASE;
    $param = array(
        ":lecturer_id" => $lecturer_id
    );
    $school_lecturer = 'lecturer';
    $query_result = $DATABASE->select("SELECT * FROM $school_lecturer WHERE lecturer_id = '$lecturer_id' ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

// Get lecturer name from lecturer id.
function get_lecturer_id_from_name($lecturer_name = '') {
    global $DATABASE;
    $param = array(
        ":lecturer_id" => "$lecturer_name"
    );
    $school_lecturer = 'lecturer';
    $query_result = $DATABASE->select("SELECT * FROM $school_lecturer WHERE username = :lecturer_id ", $param);

    foreach ($query_result as $row) {
        return $row['id'];
    }
}

// Edit lecturer information.
function edit_lecturer($lecturer_id = '') {
    global $DATABASE;
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['birthday'] = $_POST['birthday'];
    $data['sex'] = $_POST['sex'];
    $DATABASE->update('lecturer', $data, "username = '$lecturer_id'");
    $tid = get_lecturer_id_from_name($lecturer_id);
    $upload_dir = upload_dir();
    move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir['basedir'] . 'lecturer_image/' . $tid . '.jpg');
}

// Delete a lecturer.
function delete_lecturer($lecturer_id = '') {
    global $DATABASE;
    $DATABASE->delete('lecturer', "id= $lecturer_id");
}

function delete_course($course_id = '') {
    global $DATABASE;
    $DATABASE->delete('courses', "id= $course_id");
}

function delete_department($department_id = '') {
    global $DATABASE;
    $DATABASE->delete('department', "id= $department_id");
}

function delete_faculty($faculty_id = '') {
    global $DATABASE;
    $DATABASE->delete('faculty', "id= $faculty_id");
}

function delete_room($room_id = '') {
    global $DATABASE;
    $DATABASE->delete('lecture_room', "id= $room_id");
}

// Get information of certain admin.
function get_admin_info($id = '') {
    global $DATABASE;
//       $lecturer_id = get_teacher_name_from_id($id);
    $school_admin = 'ysr_admin';
    $param = array(
        ":admin_id" => $id
    );

    $query_result = $DATABASE->select("SELECT * FROM $school_admin WHERE id = :admin_id ", $param);
    return $query_result;
}

// Create new class.
function create_class() {
    global $DATABASE;

    if ($_POST['classname_id'] != "") {

        $data['classname_id'] = $_POST['classname_id'];
        $data['programme_id'] = $_POST['programme_id'];
        $data['department_id'] = $_POST['department_id'];
        $data['classroom_id'] = $_POST['classroom_id'];
        $data['set_status'] = 0;

        $DATABASE->insert('classes', $data);
    }
}

// Create timetable.
function create_timetable() {
    global $DATABASE;

    $classes = 'classes';
    $set_status = 1;
    $class_id = $_POST['class_id'];

    $param = array(
        ":set_status" => $set_status,
        ":id" => $class_id
    );
    /*This query checks if timetable exist for a class*/
    $query_result = $DATABASE->select("SELECT * FROM $classes WHERE set_status =  :set_status AND id = :id", $param);

    if(count($query_result) > 0){
        return 'fail';
    }

    $lectures = $_POST['lecture'];

    foreach ($lectures as $lecture) {

        if($lecture['course_id'] != ""){
            //Insert into database
            $data['class_id'] = $_POST['class_id'];
            $data['day_id'] = $lecture['day_id'];
            $data['period_id'] = $lecture['period_id'];
            $data['course_id'] = $lecture['course_id'];
            $data['lecturer_id'] = $lecture['lecturer_id'];

            $DATABASE->insert('lecture', $data);

            $to['set_status'] = 1;
            $class_id = $_POST['class_id'];
            $DATABASE->update('classes', $to, "id = $class_id");

        }else{
            continue;
        }
    }
}

function create_lectureRoom() {
    global $DATABASE;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['capacity'] = $_POST['capacity'];

        $DATABASE->insert('lecture_room', $data);
    }
}

function create_department() {
    global $DATABASE;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];
        $data['faculty_id'] = $_POST['faculty_id'];

        $DATABASE->insert('department', $data);
    }
}

function create_faculty() {
    global $DATABASE;

    if ($_POST['name'] != "") {

        $data['name'] = $_POST['name'];

        $DATABASE->insert('faculty', $data);
    }
}

function create_course() {
    global $DATABASE;

    if ($_POST['course_title'] != "") {

        $data['course_title'] = $_POST['course_title'];
        $data['course_code'] = $_POST['course_code'];
        $data['department_id'] = $_POST['department_id'];

        $DATABASE->insert('courses', $data);
    }
}

// Get Classes of a department.
function get_classes_by_department($department_id = '') {
    global $DATABASE;
    $classes = 'classes';
    $param = array(
        ":department_id" => $department_id
    );
    $query_result = $DATABASE->select("SELECT * FROM $classes WHERE department_id =  :department_id", $param);
    
    return $query_result;
}

function classHaveTimetable($class_id){
    global $DATABASE;
    $lecture = 'lecture';
    $param = array(
        ":class_id" => $class_id
    );
    $query_result = $DATABASE->select("SELECT * FROM $lecture WHERE class_id =  :class_id", $param);

    if(count($query_result) > 0){
        return true;
    }else{
        return false;
    }
}

function lecturerHaveTimetable($lecturer_id){
    global $DATABASE;
    $lecture = 'lecture';
    $param = array(
        ":lecturer_id" => $lecturer_id
    );
    $query_result = $DATABASE->select("SELECT * FROM $lecture WHERE lecturer_id =  :lecturer_id", $param);

    if(count($query_result) > 0){
        return true;
    }else{
        return false;
    }
}

// Get all classes.
function get_courses() {
    global $DATABASE;
    $courses = 'courses';
    $query_result = $DATABASE->select("SELECT * FROM $courses ");
    return $query_result;
}

// Get all classes.
function get_classes() {
    global $DATABASE;
    $school_class = 'classes';
    $query_result = $DATABASE->select("SELECT * FROM $school_class ");
    return $query_result;
}

// Get all classes.
function get_class_names() {
    global $DATABASE;
    $school_class = 'classnames';
    $query_result = $DATABASE->select("SELECT * FROM $school_class ");
    return $query_result;
}

function get_lecture_rooms() {
    global $DATABASE;
    $lecture_room = 'lecture_room';
    $query_result = $DATABASE->select("SELECT * FROM $lecture_room ");
    return $query_result;
}

function get_programmes() {
    global $DATABASE;
    $programmes = 'programmes';
    $query_result = $DATABASE->select("SELECT * FROM $programmes ");
    return $query_result;
}

function get_departments() {
    global $DATABASE;
    $departments = 'department';
    $query_result = $DATABASE->select("SELECT * FROM $departments ");
    return $query_result;
}

function get_faculties() {
    global $DATABASE;
    $faculties = 'faculty';
    $query_result = $DATABASE->select("SELECT * FROM $faculties ");
    return $query_result;
}

function get_classname_from_id($class_id = '') {
    global $DATABASE;
    $class = 'classnames';
    $param = array(
        ":id" => $class_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $class WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function get_lecturername_from_id($class_id = '') {
    global $DATABASE;
    $class = 'lecturer';
    $param = array(
        ":id" => $class_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $class WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function getLecture($class_id, $period_id, $day_id){
    global $DATABASE;
    $lecture = 'lecture';
    $param = array(
        ":class_id" => $class_id,
        ":period_id" => $period_id,
        ":day_id" => $day_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $lecture WHERE class_id = :class_id AND period_id = :period_id AND day_id = :day_id", $param);

    if(count($query_result) > 0){
        foreach ($query_result as $row) {
            return $row['course_id'];
        }
    }else{
        return null;
    }
    
}

function getLecturerTimeTable($lecturer_id, $period_id, $day_id){
    global $DATABASE;
    $lecture = 'lecture';
    $param = array(
        ":lecturer_id" => $lecturer_id,
        ":period_id" => $period_id,
        ":day_id" => $day_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $lecture WHERE lecturer_id = :lecturer_id AND period_id = :period_id AND day_id = :day_id", $param);

    if(count($query_result) > 0){
        foreach ($query_result as $row) {
            // return $row['course_id'];
            return $row;
        }
    }else{
        return null;
    }
    
}

function getStudentTimeTable($class_id, $period_id, $day_id){
    global $DATABASE;
    $lecture = 'lecture';
    $param = array(
        ":class_id" => $class_id,
        ":period_id" => $period_id,
        ":day_id" => $day_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $lecture WHERE class_id = :class_id AND period_id = :period_id AND day_id = :day_id", $param);

    if(count($query_result) > 0){
        foreach ($query_result as $row) {
            // return $row['course_id'];
            return $row;
        }
    }else{
        return null;
    }
    
}

function get_programmename_from_id($programme_id = '') {
    global $DATABASE;
    $programmes = 'programmes';
    $param = array(
        ":id" => $programme_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $programmes WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function get_coursename_from_id($course_id = '') {
    global $DATABASE;
    $courses = 'courses';
    $param = array(
        ":id" => $course_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $courses WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['course_title'];
    }
}

function get_departmentname_from_id($department_id = '') {
    global $DATABASE;
    $department = 'department';
    $param = array(
        ":id" => $department_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $department WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function get_facultyname_from_id($faculty_id = '') {
    global $DATABASE;
    $faculty = 'faculty';
    $param = array(
        ":id" => $faculty_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $faculty WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function get_classroomname_from_id($programme_id = '') {
    global $DATABASE;
    $programmes = 'programmes';
    $param = array(
        ":id" => $programme_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $programmes WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['name'];
    }
}

function get_coursetitle_from_id($course_id = '') {
    global $DATABASE;
    $courses = 'courses';
    $param = array(
        ":id" => $course_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $courses WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['course_title'];
    }
}

function get_departmentId_from_classes($class_id = '') {
    global $DATABASE;
    $classes = 'classes';
    $param = array(
        ":id" => $class_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $classes WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['department_id'];
    }
}

function get_coursecode_from_id($course_id = '') {
    global $DATABASE;
    $courses = 'courses';
    $param = array(
        ":id" => $course_id
    );

    $query_result = $DATABASE->select("SELECT * FROM $courses WHERE id = :id ", $param);

    foreach ($query_result as $row) {
        return $row['course_code'];
    }
}

function get_currentuserinfo() {
    global $current_user;

    return $current_user;
}

// Edit class information.
function edit_class($class_id = '') {
    global $DATABASE;
    $data['name'] = $_POST['name'];
    $data['name_numeric'] = $_POST['name_numeric'];
    $data['teacher_id'] = $_POST['teacher_id'];
    $DATABASE->update('ysr_class', $data, "class_id = $class_id");
}

// Delete a class.
function delete_class($class_id = '') {
    global $DATABASE;

    $DATABASE->delete('lecture', "class_id = $class_id");
    $DATABASE->delete('classes', "id = $class_id");
    // $DATABASE->delete('classes', array('id' => $class_id));
}

// Delete a timetable.
function delete_timetable($class_id = '') {
    global $DATABASE;

    $DATABASE->delete('lecture', "class_id = $class_id");
}

// Get all subjects.
function get_subjects() {
    global $DATABASE;
    $school_subject = 'ysr_subject';
    $query_result = $DATABASE->select("SELECT * FROM $school_subject", $param);
    return $query_result;
}

// Delete a subject.
function delete_subject($subject_id = '') {
    global $DATABASE;
    $DATABASE->delete('ysr_subject', array('subject_id' => $subject_id));
}

// Get image url.
function get_image_url($type = '', $id = '') {
    $upload_dir = upload_dir();
//    print_r($type);
    if (file_exists($upload_dir['basedir'] . '' . $type . '_image/' . $id . '.jpg')) {
        $image_url = $upload_dir['baseurl'] . '' . $type . '_image/' . $id . '.jpg';
//        echo $image_url;
    } else {

//        http://localhost/attendance/libs/assets/img/av1.png
//         if (empty($this->dp) || !file_exists(UPLOAD_DIR . $this->dp)) {
        $key = array(1, 2, 3, 4, 5, 6);
        $dp = $key [array_rand($key)];
//            return VIEWS . "/assets/images/placeholder/user$dp.jpg";
//        }
        $image_url = URL . "libs/nifty/av$dp.png";
        //plugins_url( 'assets/images/user.jpg', __FILE__ );
    }
    return $image_url;
}

function myid() {
    @session_start();

    $in = $_SESSION["id"];
    return uname2id($in);
}

function myuname() {
    @session_start();

    $in = $_SESSION["id"];
    return $in;
}