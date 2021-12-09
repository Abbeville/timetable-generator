 
 
<section class="panel">
    <header class="panel-heading">
        Student List
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a> 
        </span>
    </header>
    <div class="panel-body">
        <section id="unseen">
            <table class="table table-bordered table-striped table-condensed">
                <thead class="">
   <!--<thead>-->
                    <tr>
                        <th> # </th> 
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td>1</td> 
                        <td>
                            <img src="libs/images/chat-avatar2.jpg" 
                                 class="img-circle" width="40px" height="40px">
                        </td>
                        <td>Omotunde Johnnie</td>
                        <td>Lagos Nigeria</td>
                        <td>holhushehun@gmail.com</td>
                        <td>
                            <div class="btn-group">
                                <!--<button class="btn btn-white" type="button">Action</button>-->
                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">Action&nbsp;<span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick="profile_show();">
                                            <i class="entypo-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <!--editStudent-->
                                        <a href= "#" onclick="edit_student_profile()">
                                            <i class="entypo-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <!--ajax_call('student-show-marksheet', <?php // echo $row['student_id'];                 ?>)-->
                                        <a href="#" onclick="showMarksheet()">
                                            <i class="entypo-chart-bar"></i> View Marksheet
                                        </a>
                                    </li>

                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick=" ">
                                            <i class="entypo-cancel-circled"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</section>

<!--Edit Profile  Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_editprofile" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Student</h4>
            </div>
            <div class="modal-body"  style="height:500px; overflow:auto;">
                <?php // include 'view.php'; ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> 
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!--Profile  Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_profile" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body"  style="height:500px; overflow:auto;">
                <?php // include 'view.php'; ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> 
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!--Marksheet  Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_marksheet" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Student MarkSheet</h4>
            </div>
            <div class="modal-body"  style="height:500px; overflow:auto;">
                <?php // include 'view.php'; ?>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button> 
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script>
    alert("ghhgh")
    function profile_show() {
        // LOADING THE AJAX MODAL
        jQuery('#modal_profile').modal('show', {backdrop: 'true'});

        $.get("http://localhost/attendance/index.php?page=students&action=view&type=headless", function(resp) {
            
            jQuery('#modal_profile .modal-body').html(resp);
        });
    }
    function edit_student_profile() {
        // LOADING THE AJAX MODAL
        jQuery('#modal_editprofile').modal('show', {backdrop: 'true'});

        $.get("http://localhost/attendance/Student/edit"", function(respo) {
        alert(respo)
            jQuery('#modal_editprofile .modal-body').html(resp);
        });
   
    function showMarksheet() {
        // LOADING THE AJAX MODAL
        jQuery('#modal_marksheet').modal('show', {backdrop: 'true'});

        $.get("http://localhost/attendance/index.php?page=students&action=marksheet&type=headless", function(resp) {
            jQuery('#modal_marksheet .modal-body').html(resp);
        });
    }
</script>

   