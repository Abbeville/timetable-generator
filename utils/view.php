<?php

class view {

    function __construct() {
        
    }

    function render($page) {
        // var_dump($_SESSION['type']);exit();
        $role = $_SESSION["type"];

        require_once "./v/$role/navigation/header.php";
        include "./v/$role/$page.php";
        require_once "./v/$role/navigation/sidebar.php";
//        require_once "./v/$role/navigation/rightbar.php";
        require_once "./v/$role/navigation/footer.php";
        $frag = explode("/", $page);
        $script = "./v/$role/$frag[0]/script.php";
        if (file_exists($script)) {
            require_once $script;
        }
    }

///home/abbeville/Desktop/Link to htdocs/school/v/navigation/header.php

    function display($page) {
        $role = $_SESSION["type"];
        include "./v/$role/" . $page . '.php';
//        require_once "./v/$role/navigation/footer.php";
    }
    
    function show_index($name, $noInclude = false) {
        $path = 'v/' . $name . '.php';
        if (strpos($name, "html") > -1) {
            $path = 'views/' . $name;
        }
        if ($noInclude == true) {
//        require_once "./v/navigation/header.php"; 
//            require_once "./v/navigation/sidebar.php";
            require $path;
        } else {
            require $path;
            require $path;
            require$path;
        }
    }

}
