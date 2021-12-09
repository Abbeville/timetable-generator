<?php
$class_id = $this->class;
$students = get_students($class_id);
?>
<style>
    .ffff {
        font-weight: bold;
        border: 1px solid black;
        height: auto;
        padding-top: 8px;
        text-align: center;
        /*margin-left: auto;
        margin-right: auto;
        width: 55%;*/
        padding: 12px;
    }
</style>
<script>
    var thisclassid = <?php echo $class_id; ?>
</script>
<!--<div id="page-title" class="">
    <h1 class="page-header text-overflow"></h1>
</div>-->


<div class="panel">

    <!-- Panel heading -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="panel-heading">
        <div class="panel-control">
            <div class="btn-group btn-group-sm ">
                <button aria-expanded="false" class="btn btn-dark btn-active-dark dropdown-toggle" data-toggle="dropdown" type="button">
                    Sort: <i class="dropdown-caret fa fa-caret-down"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header"> Select Sub Class </li>

                    <!--<option value="">Select Sub Class</option>-->
                    <?php
                    $classes = get_all_subslass($class_id);
                    foreach ($classes as $row) {
                        ?>
                        <li>
                            <a class="" href="<?php echo URL; ?>student/sub_class_list/<?php echo $row['id']; ?>">   <?php echo $row['sub_classname']; ?></a>
                        </li>
                    <?php } ?> 
                </ul>
            </div> 
            <ul class="pager pager-rounded">
                <li>
                    <a onclick="newsubclass('<?php echo $class_id; ?>');"><i class="fa fa-plus"></i> SubClass</a>
                </li>
<!--                <li>
                    <a href="<?php echo URL; ?>student/add"><i class="fa fa-plus"></i> Add Student</a>
                </li>-->
            </ul>
        </div>
        <h3 class="panel-title">Students</h3>
    </div>

</div>


<div class="tab-base">

    <!-- Nav tabs -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <ul class="nav nav-tabs">
        <li class="active">
            <a aria-expanded="true" href="#demo-search-tab-2" data-toggle="tab"> <?php echo get_class_name_from_id($class_id); ?>: Students   <span class="badge badge-primary"><?php echo count($students); ?></span></a>
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
                            <th>Address</th>
                            <th>Email</th>
                            <!-- <th>Sub Class</th> -->
                            <th>Attendance(Present/Absent Day(s))</th>
                            <th class="min-w-td text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($students as $row) {
//                        print_r($students);
                            ?>
                            <tr>
                                <td class="min-w-td"><?php echo $count; ?></td>
                                <td><img src="<?php echo get_image_url('student', $row['id']); ?>" alt="<?php echo $row['name']; ?>" class="img-circle img-sm">
                                </td>
                                <td><a class="btn-link" href="<?php echo URL . "student/view/" . $row['username']; ?>"><?php echo $row['name']; ?></a>
                                </td>
                                <td><?php echo $row['address']; ?></td>
                                <td><span class="label label-info text-lg"><?php echo $row['email']; ?></span>
                                </td>
                                <!-- <td><?php echo $row['class_sub_id']; ?></td> --> 
                                <td><button class="btn btn-sm btn-success"><?php echo getTotalDaysOfPresence($row['id']); ?></button>&nbsp<button class="btn btn-sm btn-danger"><?php echo getTotalDaysOfAbsence($row['id']); ?></button></td>

                                <td class="min-w-td text-center">
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-success fa fa-pencil add-tooltip"  onclick="edit_profile('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"data-original-title="Edit"></button>
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-info fa fa-eye add-tooltip"  onclick="profile_show('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"data-original-title="Profile"></button>
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-danger fa fa-times add-tooltip" onclick="delete_student('<?php echo $row['username']; ?>', '<?php echo $row['name']; ?>');"  data-original-title="Delete"></button>
                                </td>
                            </tr> 

                            <?php
                            $count++;
                        }
                        ?>

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




