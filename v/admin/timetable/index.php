<?php
$department_id = $this->department;
$classes = get_classes_by_department($department_id);
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
    var thisdepartmentid = <?php echo $department_id; ?>
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
                
            </div> 
            <ul class="pager pager-rounded">
                <li>
                   <!--  <a onclick="newsubclass('<?php echo $department_id; ?>');"><i class="fa fa-plus"></i> SubClass</a> -->
                </li>
<!--                <li>
                    <a href="<?php echo URL; ?>student/add"><i class="fa fa-plus"></i> Add Student</a>
                </li>-->
            </ul>
        </div>
        <h3 class="panel-title">Time Table</h3>
    </div>

</div>


<div class="tab-base">

    <!-- Nav tabs -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    


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
                            <th>Name</th>
                            <th>Programme</th>
                            <th class="min-w-td text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($classes as $row) {
                            $class_name = get_classname_from_id($row['classname_id']);
                            $programme = get_programmename_from_id($row['programme_id']);
//                        print_r($classes);
                            ?>
                            <tr>
                                <td class="min-w-td"><?php echo $count; ?></td>
                                <td><?php echo get_classname_from_id($row['classname_id']); ?></td>
                                </td>
                                <td><?php echo get_programmename_from_id($row['programme_id']); ?></td>
                                </td>
                                <td class="min-w-td text-center">
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-success fa fa-pencil add-tooltip"  onclick="add_timetable('<?php echo $row['id']; ?>', '<?php echo $class_name; ?>', '<?php echo $programme; ?>');" data-original-title="Add Time Table"></button>

                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-info fa fa-eye add-tooltip"  onclick="timetable_show('<?php echo $row['id']; ?>');" data-original-title="View Time Table"></button>

                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-danger fa fa-times add-tooltip" onclick="delete_timetable('<?php echo $row['id']; ?>', <?php echo $department_id; ?>);"  data-original-title="Delete Time Table"></button>
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




