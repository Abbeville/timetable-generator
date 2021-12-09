          
<section class="panel">

    <div class="panel-body">
        <?php
        $teacher_id = get_teacher_id_from_name($this->teacher);
        $edit_data = get_teacher_info($teacher_id);
        foreach ($edit_data as $row) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                Edit Teacher
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo URL; ?>staff/editTeacher/<?php echo $row['username']; ?>" method="post" 
                                  class="form-horizontal form-groups-bordered validate edit_teacher" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" data-validate="required" 
                                               data-message-required="value required" value="<?php echo $row['name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Address</label>

                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control" 
                                                  id="field-ta"><?php echo $row['address']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Phone</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="phone" class="form-control" id="field-1" value="<?php echo $row['phone']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Birth Date</label>

                                    <div class="col-sm-7">
                                        <!--                                        <div class="date-and-time">
                                                                                    <input type="text" name="birthday" class="form-control datepicker" 
                                                                                           data-format="D, dd MM yyyy" placeholder="date here"  
                                                                                           value="<?php // if ($row['birthday'] != '') echo date("D, d M Y", $row['birthday']);       ?>">
                                                                                </div>-->
                                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date dpYears">
                                            <input readonly="" value="<?php if ($row['birthday'] != '') echo $row['birthday']; ?>" name="birthday" size="16" class="form-control" type="text">
                                            <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Sex</label>

                                    <div class="col-sm-9">
                                        <select name="sex" class="form-control">
                                            <option value="male" <?php if ($row['sex'] == 'male') echo 'selected'; ?>>Male</option>
                                            <option value="female" <?php if ($row['sex'] == 'female') echo 'selected'; ?>>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Photo</label>

                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-7">
                                        <button type="submit" class="btn btn-info" id="submit-button">Update</button>
                                        <span id="preloader-form"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>


<script>
    $(function() {
//    alertify.alert("Ready");

//    serializefiles(){
//        var data = new FormData();
//        $.each($('#file')[0].files, function(i, file) {
//            data.append(, file);
//        });
//    }
    var validateForm = function(selector) {
        $(document).on("submit", selector, function(e) {

            var inputs = $(selector + " input");
            var resp = "safe";
            $.each(inputs, function(id, obj) {
                if ($(obj).val() === "") {

                    if ($(obj).attr("type") === "file") {

                    } else {
                        e.preventDefault();
                        $(obj).css({
                            "border": "1px solid red"
                        });
                        resp = "unsafe";
                        alertify.alert("Please fill all required fields");
                        return;
                    }
                }
            });
//            alertify.alert("hello");s
        });

    };

    $('.dpYears').datepicker();
    validateForm(".edit_teacher");
    });
</script>



