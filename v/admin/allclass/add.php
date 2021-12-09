<!--<section class="panel">
    <div class="panel-body">-->
        <div id="wizard">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel " data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                Add Class
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo URL; ?>allclass/addClass" method="post" 
                                  class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
<!--                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_class">-->

                                <!-- <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" data-validate="required" 
                                               data-message-required="value required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label">Sub Class Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subname" placeholder="e.g (Jss1 Gold)"data-validate="required" 
                                               data-message-required="value required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Numeric Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name_numeric" >
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Name</label>

                                    <div class="col-sm-9">
                                        <select name="classname_id" class="form-control">
                                            <option>Select Name</option>
                                            <?php
                                            $names = get_class_names();
                                            foreach ($names as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Programme</label>

                                    <div class="col-sm-9">
                                        <select name="programme_id" class="form-control">
                                            <option>Select Programme</option>
                                            <?php
                                            $programmes = get_programmes();
                                            foreach ($programmes as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Department</label>

                                    <div class="col-sm-9">
                                        <select name="department_id" class="form-control">
                                            <option>Select Department</option>
                                            <?php
                                            $departments = get_departments();
                                            foreach ($departments as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Lecture Room</label>

                                    <div class="col-sm-9">
                                        <select name="classroom_id" class="form-control">
                                            <option>Select Lecture Room</option>
                                            <?php
                                            $rooms = get_lecture_rooms();
                                            foreach ($rooms as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-7">
                                        <button type="submit" class="btn btn-info" id="submit-button">Submit</button>
                                        <span id="preloader-form"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<!--    </div>
</section>-->


<script>
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

                        alertify.alert("Please fill all required fields");
                        return;
                    }
                }
            });

        });
    };
//    $('.dpYears').datepicker();
    validateForm(".validate");


</script>
