 
<div class="panel">
    <!-- Panel heading -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="panel-heading">
        <div class="panel-control">
            <ul class="pager pager-rounded">
                <li>
                    <a onclick="add_student()" ><i class="fa fa-plus"></i> Add Student</a>
                </li>
            </ul>
        </div>
        <h3 class="panel-title">     Students List</h3>
    </div>

</div>

<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-vcenter" id="table_export">
                <thead>
                    <tr>
                        <th class="min-w-td">#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Matric</th>
                        <!-- <th>Department</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    $lecturers = get_students();
                    foreach ($lecturers as $row) {
                        ?>
                        <tr class="odd gradeX">
                            <td class="min-w-td"><?php echo $count; ?></td>
                            <td><?php echo ucwords($row['fname'].' '.$row['lname']); ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['matric']; ?></td>
                            

                            <td>
                                <div class="btn-group">
                                    <!-- <button class="btn btn-white" onclick="edit_lecturer('<?php echo $row['id']; ?>');" type="button">Edit</button> &nbsp -->
                                    <button class="btn btn-danger" onclick="delete_student('<?php echo $row['id']; ?>');" type="button">Delete</button>
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
<script type="text/javascript">
    
        function delete_student(username) {
            alertify.confirm("Delete Student", "Do You Really Want To Delete? ", function () {
                $.post("http://localhost/pr-timetable/student/delete/", {who: username}, function (resp) {
    //                jQuery('#modal_profile .modal-body').html(resp);
                    window.location = "http://localhost/pr-timetable/student/";
                });
            }, function () {

            });
        }

</script>
