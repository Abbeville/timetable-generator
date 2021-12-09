<?php
$student_id = get_student_id_from_name($this->student);
$edit_data = get_student_info($student_id);
foreach ($edit_data as $row) {
    ?> 

    <div class="panel"  >
        <div class="panel-heading">
            <h3 class="panel-title">Edit Student</h3>
        </div>
        <!--        <div class="panel-heading">
                        <div class="panel-title" >
                            <i class="entypo-plus-circled"></i>
                            Edit Student
                        </div>
                    </div>-->

        <form style="padding-top: 0px;"  action="<?php echo URL; ?>student/editStudent/<?php echo $row['username']; ?>" method="post" 
              class="form-horizontal form-groups-bordered validate edit_student panel-body" enctype="multipart/form-data">
            <div style="padding-top: 0px;"  class="panel-body">

                <input type="hidden" name="student_id"  value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label for="field-1" class=" control-label">Name</label>

                    <!--<div class="">-->
                    <input type="text" class="form-control" name="name" data-validate="required" 
                           data-message-required="value required"  value="<?php echo $row['name']; ?>">
                    <!--</div>-->
                </div>

                <div class="form-group">
                    <label for="field-ta" class=" control-label">Class</label>

                    <div class="">
                        <select name="class_id" class="form-control">
                            <?php
                            $classes = get_classes();
                            foreach ($classes as $row2) {
                                ?>
                                <option value="<?php echo $row2['class_id']; ?>" <?php if ($row2['class_id'] == $row['class_id']) echo 'selected'; ?>>
                                    Class <?php echo $row2['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class=" control-label">Birth Date</label>

                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="02-12-2012" class="input-append date dpYears">
                        <input readonly="" value="<?php if ($row['birthday'] != '') echo $row['birthday']; ?>" name="birthday" size="16" class="form-control" type="text">
                        <span class="input-group-btn add-on" >
                            <button class="btn btn-primary" type="button" style="margin-left: -33px !important;"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div> 
                </div>

                <div class="form-group">
                    <label for="field-ta" class=" control-label">Sex</label>

                    <div class="">
                        <select name="sex" class="form-control">
                            <option value="male" <?php if ($row['sex'] == 'male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if ($row['sex'] == 'female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class=" control-label">Address</label>

                    <div class="">
                        <textarea name="address" 
                                  class="form-control" id="field-ta"><?php echo $row['address']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class=" control-label">Phone</label>

                    <div class="">
                        <input type="text" name="phone" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class=" control-label">Email</label>

                    <div class="">
                        <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                    </div>
                </div>

                <!--                <div class="form-group">
                                    <label for="field-1" class=" control-label">Photo</label>
                
                                    <div class="">
                                        <input type="file" name="image" class="form-control" >
                                    </div>
                                </div>-->
                <div class="form-group">
                    <label class="col-md-3 control-label">Photo</label>
                    <div class="col-md-9">
                        <span class="pull-left btn btn-warning btn-file" >
                            Browse...   <input type="file" name="image" id="student_profile" class="form-control" >
                        </span>
                        &nbsp; &nbsp;
                        <span class="badge badge-info" id="image_name">No file selected</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary pull-right" id="submit-button">Update</button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
            </div>
        </form>

    </div> 
<?php } ?>
<script>
    $(function () {


        $(document).on("change", "#student_profile", function () {
            $("#image_name").html($(this).val());
//           $("#image_pin").html();
//           $("#image_pin").html().replace("Browse","Change")
//                   .replace("Browse","Change");
//            alert(txt);
        });
        var validateForm = function (selector) {
            $(document).on("submit", selector, function (e) {
                var inputs = $(selector + " input");
                $.each(inputs, function (id, obj) {
                    if ($(obj).val() === "") {
                        if ($(obj).attr("type") === "file") {
                        } else {
                            e.preventDefault();
                            $(obj).css({
                                "border": "1px solid red"
                            });
                            alertify.alert("Info", "Please fill all required fields");
                            return;
                        }
                    }
                });
            });
        };
        $('.dpYears').datepicker();
        validateForm(".edit_student");

    });
</script>