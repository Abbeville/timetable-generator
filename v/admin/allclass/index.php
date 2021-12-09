 
<div class="panel">
    <!-- Panel heading -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="panel-heading">
        <div class="panel-control">
            <ul class="pager pager-rounded">
                <li>
                    <a onclick="add_class()" ><i class="fa fa-plus"></i> Add Class</a>
                </li>
            </ul>
        </div>
        <h3 class="panel-title">     Class List</h3>
    </div>

</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-vcenter" id="table_export">
                <thead>
                    <tr>
                        <th class="min-w-td">#</th>
                        <th>Class Name</th>
                        <th>Programme</th>
                        <th>Department</th>
                        <th>Lecture Room</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $classes = get_classes();
                    foreach ($classes as $row) {
                        ?>
                        <tr class="odd gradeX">
                            <td class="min-w-td"><?php echo $count; ?></td>
                            <td><?php echo get_classname_from_id($row['classname_id']); ?></td>
                            <td><?php echo get_programmename_from_id($row['programme_id']); ?></td>
                            <td><?php echo get_departmentname_from_id($row['department_id']); ?></td>
                            <td><?php echo get_classroomname_from_id($row['classroom_id']); ?></td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-trans btn-icon btn-hover-danger fa fa-times add-tooltip" onclick="delete_class('<?php echo $row['id']; ?>', '<?php echo get_classname_from_id($row['classname_id']); ?>');"  data-original-title="Delete"></button>
                                    <!-- <button class="btn btn-white" onclick="edit_class('<?php echo $row['id']; ?>');" type="button">Delete</button> &nbsp -->
                                    <!-- <button class="btn btn-primary" onclick="edit_class('<?php echo $row['class_id']; ?>');" type="button"> View Timetable</button> -->
                                    <!--<button class="btn btn-white"  onclick="delete_teacher('<?php // echo $row['class_id'];                      ?>');"  type="button">Delete</button>-->
                                </div>
                            </td>
                            <?php $count++; ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 


<!--Profile  Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_profile" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Class</h4>
            </div>
            <div class="modal-body"  style="height:290px;; overflow:auto;">
                <?php // include 'view.php'; ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
