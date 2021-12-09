<?php

define("URL", "http://localhost/pr-timetable/");
define("LIBS", "http://localhost/pr-timetable/libs/");
define("VIEWS", "http://localhost/pr-timetable/v/");
//echo $_GET["url"];
include "./utils/contoller.php";
include "./utils/view.php";
include "./utils/model.php";
include "./utils/Database.php";
include "./utils/Session.php";
include "./utils/CommonModel.php";

function setHead() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type');
}

setHead();
//require './public/head.css'; 
$url = isset($_GET['url']) ? $_GET['url'] : null;
//print_r($url);
$url = rtrim($url, "/");
$url = explode("/", $url);
// print_r($url); 
//session_destroy();
Session::init();
//$_SESSION["CustoAttendance_LOGGEDIN"] = true;
//$_SESSION["type"] = "admin";
/*if (Session::get("CustoAttendance_LOGGEDIN") == false) {
    require './c/allclass.php';
    $controller = new allclass();
    $controller->index();
    return;
}*/

if (empty($url[0])) {
    Session::init();

    define("CURRENT", "home");
//    require './c/noticeboard.php';
//    $controller = new noticeboard();
    require './c/dashboard.php';
    $controller = new dashboard();

    $controller->index();
//    }
    return false;
}

$file = "c/" . $url[0] . ".php";

if (file_exists($file)) {
    include $file;
    $controller = new $url[0];
    define("CURRENT", "$url[0]");
    // calling methods
    if (isset($url[1])) {
        if (method_exists($controller, $url[1])) {
            if (isset($url[4])) {
                $controller->{$url[1]}($url[2], $url[3], $url[4]);
            } else if (isset($url[3])) {
                $controller->{$url[1]}($url[2], $url[3]);
            } else if (isset($url[2])) {
//                print_r($url);
                $controller->{$url[1]}(urlencode($url[2]));
            } else {
                $controller->{$url[1]}();
            }
        } else {
            if ($url[0] == "news") {
                $controller->index($url[1]);
            } else {
                $controller->index();
            }
        }
    } else {
        $controller->index();
    }
} else {
    echo 'page NOt Found';
}
   





