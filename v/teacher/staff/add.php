 



<section class="panel">

    <div class="panel-body">

        <div id="wizard">


            <section>
                <form action="<?php echo URL; ?>staff/addTeacher" method="post" 
                      class="form-horizontal form-groups-bordered add_teacher" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" data-validate="required" 
                                   data-message-required="value required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" id="field-1"  data-validate="required" 
                                   data-message-required="value required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="field-1"  data-validate="required" 
                                   data-message-required="value required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-9">
                            <textarea name="address" class="form-control html5editor" id="field-ta" data-stylesheet-url="<?php echo URL . "v/"; ?>assets/css/wysihtml5-color.css"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-9">
                            <input type="text" name="phone" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Birth Date</label>

                        <div class="col-sm-7">
                            <!--                            <div class="date-and-time">
                                                            <input type="text" name="birthday" class="form-control datepicker" data-format="D, dd MM yyyy" 
                                                                   placeholder="date here">
                                                        </div>-->
                            <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date dpYears">
                                <input readonly="" value="12-02-2012" name="birthday" size="16" class="form-control" type="text">
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

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
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-lg btn-primary" id="submit-button">Submit</button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                </form>
            </section>






        </div>
    </div>
</section>








<script>
    $(function () {
//    alertify.alert("Ready");

//    serializefiles(){
//        var data = new FormData();
//        $.each($('#file')[0].files, function(i, file) {
//            data.append(, file);
//        });
//    }
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
        $('.dpYears').datepicker();
        validateForm(".add_teacher");

        $(document).on("change", "#student_profile", function () {
            $("#image_name").html($(this).val());
//           $("#image_pin").html();
//           $("#image_pin").html().replace("Browse","Change")
//                   .replace("Browse","Change");
//            alert(txt);
        });

    });
</script>
