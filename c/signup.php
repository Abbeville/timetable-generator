<?php

class signup extends controller {

    function __construct() {
        parent::__construct();
        $this->loadmodel("signup");
             // define("manager", "lecturer");
    }

    public function index()
    {
    	$this->view->departments = get_departments();
        $this->view->show_index("signup", TRUE);
    }

    public function create()
    {
        // echo json_encode($_POST);
    	$query = create_student();

    	if ($query == 'success') {
    		echo '1';
    	}else{
    		echo '0';
    	}
    }

    public function fetchClass()
    {
        $classes = get_classes_by_department($_POST['department_id']);

        $options = '';

        foreach ($classes as $row) {
            $options .= '<option value="'. $row['id'].'">'. get_classname_from_id($row['classname_id']).'
                                        </option>';
         }

        $result = '<div class="input-group-addon"><i class="icon user"></i></div>
                    <select name="class_id" class="form-control class_id">
                        <option>Select Class</option>'.
                        $options
                    .'</select>';
        echo $result;
    }

}