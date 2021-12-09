<?php
// test();          
$count = 1;
$teachers = get_teachers();
?>

<div class="panel">

    <!-- Panel heading -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="panel-heading">
        <div class="panel-control">

            <ul class="pager pager-rounded">
                <!--                <li>
                                    <a onclick="newsubclass('<?php echo $class_id; ?>');"><i class="fa fa-plus"></i> SubClass</a>
                                </li>-->
                <li>
                    <button id="editable-sample_new" class="btn btn-primary" onclick="add_teacher()">
                        Add New  Teacher <i class="fa fa-plus"></i>
                    </button>
                    <!--<a href="<?php // echo URL;           ?>student/add"><i class="fa fa-plus"></i> Add Student</a>-->
                </li>
            </ul>
        </div>
        <h3 class="panel-title">Teachers</h3>
    </div>

</div>


<div class="tab-base">

    <!-- Nav tabs -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <ul class="nav nav-tabs">
        <li class="active">
            <a aria-expanded="true" href="#demo-search-tab-2" data-toggle="tab">  Teacher List <span class="badge badge-primary"><?php echo count($teachers); ?></span></a>
        </li>
    </ul>


    <!-- Tabs Content -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="tab-content">

        <!-- USERS SEARCH -->
        <!--===================================================-->
        <div class="tab-pane fade active in" id="demo-search-tab-2">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-vcenter">
                    <thead>
                        <tr>


                            <th class="min-w-td">#</th>
                            <th class="min-w-td">Photo</th>
                            <th>Name</th> 
                            <th>Email</th> 
                            <th class="min-w-td text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($teachers as $row) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $count; ?></td>
                                <td>
                                    <img src="<?php echo get_image_url('teacher', $row['id']); ?>" 
                                         class="img-circle" width="40px" height="40px">
                                </td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td class="min-w-td text-center">
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-success fa fa-pencil add-tooltip"  onclick="edit_teacher('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"data-original-title="Edit"></button>
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-info fa fa-eye add-tooltip"  onclick="teacher_profile('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"data-original-title="Profile"></button>
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-danger fa fa-times add-tooltip" onclick="delete_teacher('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"  data-original-title="Delete"></button>
                                    <!--<button class="btn btn-sm btn-trans btn-icon btn-hover-warning fa fa-file-text add-tooltip"  onclick="showMarksheet('<?php echo $row['admission_no']; ?>', '<?php echo $row['name']; ?>');" data-original-title="View Result"></button>-->
                                </td>                           
                                <?php $count++; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!--<hr class="hr-wide">-->

                <div class="text-right">
                    <ul class="pagination mar-no">
                        <li class="disabled">
                            <a class="fa fa-angle-double-left" href="#"></a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><span>...</span>
                        </li>
                        <li><a href="#">13</a>
                        </li>
                        <li>
                            <a class="fa fa-angle-double-right" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--===================================================-->

    </div>
</div>
<!--
<section class="panel">
    <header class="panel-heading">
        Teachers List
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
        </span>
    </header>
    <div class="panel-body">



        <section id="flip-scroll">
            <div class="clearfix">
                <div class="btn-group">
                    <button id="editable-sample_new" class="btn btn-primary" onclick="add_teacher()">
                        Add New  Teacher <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div style=""  class="table table-hover table-responsive">
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
foreach ($teachers as $row) {
    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $count; ?></td>
                                        <td>
                                            <img src="<?php echo get_image_url('teacher', $row['id']); ?>" 
                                                 class="img-circle" width="40px" height="40px">
                                        </td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-white" onclick="edit_teacher('<?php echo $row['username']; ?>');" type="button">Edit</button>
                                                <button class="btn btn-white" onclick="teacher_profile('<?php echo $row['username']; ?>');" type="button">Profile</button>
                                                <button class="btn btn-white"  onclick="delete_teacher('<?php echo $row['username']; ?>');"  type="button">Delete</button>
                                                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                                            Action <span class="caret"></span>
                                                                                        </button>
                                                                                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                                                            <li>
                                                                                                <a href="<?php echo URL . "teachers/teacherProfile/" . $row['username']; ?>" onclick="">
                                                                                                    <i class="entypo-user"></i> Profile
                                                                                                </a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="<?php echo URL . "teachers/editTeacher/" . $row['username']; ?>" onclick="">
                                                                                                    <i class="entypo-pencil"></i> Edit
                                                                                                </a>
                                                                                            </li>
                                                                                            <li class="divider"></li>
                                                                                            <li>
                                                                                                <a href="#" onclick="confirm_modal('delete_teacher', <?php echo $row['username']; ?>)">
                                                                                                    <i class="entypo-cancel-circled"></i> Delete
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                            </div>
                                        </td>
    <?php $count++; ?>
                                    </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</section>-->

<!--Profile  Modal 
-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_profile" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Teacher</h4>
            </div>
            <div class="modal-body"  style="height:359px; overflow:auto;">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script>
    //USAGE: $("#form").serializefiles();
//    var serializefiles = function(sel) {
//        var obj = sel;
////        console.log($(obj).find("input[type='file']"));
//        /* ADD FILE TO PARAM AJAX */
//        var formData = new FormData();
//        $.each($(obj).find("input[type='file']"), function(i, tag) {
//            $.each($(tag)[0].files, function(i, file) {
//                formData.append(tag.name, file);
//            });
//        });
//        var params = $(obj).serializeArray();
//        $.each(params, function(i, val) {
//            formData.append(val.name, val.value);
//        });
////        console.log(formData);
//        return formData;
//    };

    function add_teacher() {
        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/attendance/staff/add", {headless: true}, function (resp) {
            jQuery('#modal_profile .modal-body').html(resp);
        });
    }

    function edit_teacher(username) {
        // LOADING THE AJAX MODAL
        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/attendance/staff/edit/" + username, {headless: true}, function (resp) {
            jQuery('#modal_profile .modal-body').html(resp);
        });
//        window.location = "http://localhost/attendance/staff/edit/" + username;
    }

    function teacher_profile(username) {
        // LOADING THE AJAX MODAL
        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/attendance/staff/view/" + username, {headless: true}, function (resp) {
            jQuery('#modal_profile .modal-body').html(resp);
        });
    }
    function delete_teacher(username) {
        alertify.confirm("Delete Teacher", "Do You Really Want To Delete " + username + "?", function () {
            $.post("http://localhost/attendance/staff/delete/", {who: username}, function (resp) {
//                jQuery('#modal_profile .modal-body').html(resp);
                window.location = "http://localhost/attendance/staff/";
            });
        }, function () {

        });
    }
//    delete_teacher
</script>