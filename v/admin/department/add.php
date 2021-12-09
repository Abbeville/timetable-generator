<!--<section class="panel">
    <div class="panel-body">-->
        <div id="wizard">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel " data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title" >
                                <i class="entypo-plus-circled"></i>
                                Add Department
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo URL; ?>department/addDepartment" method="post" 
                                  class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
<!--                    <input type="hidden" name="action" value="ekattor_form_submit">
                    <input type="hidden" name="task" value="add_class">-->

                                 <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" data-validate="required" 
                                               data-message-required="value required">
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Faculty</label>

                                    <div class="col-sm-9">
                                        <select name="faculty_id" class="form-control">
                                            <option>Select Faculty</option>
                                            <?php
                                            $faculties = get_faculties();
                                            foreach ($faculties as $row) {
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
</section>


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
