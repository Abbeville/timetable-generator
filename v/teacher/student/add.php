<!--<link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>assets/css/jquery.datepick.css">   


<script src="<?php echo LIBS; ?>assets/js/jquery.plugin.js"></script>  

<script src="<?php echo LIBS; ?>assets/js/jquery.datepick.js"></script> -->

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Add Student</h3>
    </div>

    <!--VALIDATION STATES-->
    <!--===================================================-->
    <form style="padding-top: 0px;" action="<?php echo URL; ?>student/addStudent" method="post" 
          class="form-horizontal form-groups-bordered validate add_student panel-body" enctype="multipart/form-data">




        <div  style="padding-top: 0px;"  class="panel-body">

            <div class="form-group">
                <label for="field-1" class="  control-label">Name</label> 
                <input type="text" placeholder="Student Name" class="form-control" name="name" data-validate="required" 
                       data-message-required="value required">
            </div>

            <div class="form-group">
                <label for="field-ta" class=" control-label">Class</label>
                <div class="">
                    <select name="class_id" class="form-control allclasses">
                        <option selected="" disabled="">
                            Select Class
                        </option>
                        <?php
                        $classes = get_classes();
                        foreach ($classes as $row) {
                            ?>
                            <option value="<?php echo $row['class_id']; ?>">
                                Class <?php echo $row['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-ta" class=" control-label">Sub Class</label>

                <div class="">
                    <select name="sub_class_id" class="form-control subclass">

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class=" control-label">Birth Date</label>
                <div>
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date dpYears ">
                        <input readonly="" value="" name="birthday" placeholder="Birth Date" size="16" class="form-control" type="text">
                        <span class="input-group-btn add-on">
                            <button class="btn btn-primary" id="date_pick_pin" type="button" style="margin-left: -31px !important;"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                </div>
            </div>

<!--            <div class="form-group">
                <label for="field-1" class=" control-label">Birth Date</label>

                <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="02-12-2012" class="input-append date dpYears">
                    <input readonly=""   name="birthday" size="16" class="form-control" type="text">
                    <span class="input-group-btn add-on" >
                        <button class="btn btn-primary" type="button" style="margin-left: -33px !important;"><i class="fa fa-calendar"></i></button>
                    </span>
                </div> 
            </div>-->

            <!--            <div class="form-group">
                            <label class="control-label col-md-3">Start with years viewMode</label>
                            <div class="col-md-4 col-xs-11">
                                <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                                    <input type="text" readonly="" value="12-02-2012" size="16" class="form-control">
                                    <span class="input-group-btn add-on">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                                <span class="help-block">Select date</span>
                            </div>
                        </div>-->

            <!--            <div class="col-sm-9">
                            <input type="text" placeholder="Select Date" id="form-field-1" class="form-control dateadded dateex">
                        </div>-->




            <div class="form-group">
                <label for="field-ta" class=" control-label">Sex</label>

                <div class="">
                    <select name="sex" class="form-control">
                        <option selected="" disabled="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field-ta" class=" control-label">Address</label>

                <div class="">
                    <textarea name="address" placeholder="Address" class="form-control html5editor" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class=" control-label">Phone</label>

                <div class="">
                    <input type="text" name="phone" class="form-control" id="field-1" >
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class=" control-label">Email</label>

                <div class="">
                    <input type="email" name="email" class="form-control" placeholder="E-mail" id="field-1" >
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class=" control-label">  Username</label>

                <div class="">
                    <input type="text" name="username" placeholder="Username" class="form-control" id="field-1"  data-validate="required" 
                           data-message-required="value required">
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class=" control-label">Password</label>

                <div class="">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="field-1"  data-validate="required" 
                           data-message-required="value required">
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
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-primary pull-right" id="submit-button">Submit</button>
                    <span id="preloader-form"></span>
                </div>
            </div>

        </div>
    </form>
    <!--===================================================-->
    <!--END OF VALIDATION STATES-->

</div>


<!--<script src="<?php echo URL; ?>libs/js/jquery2.1.3.min.js"></script>-->
<script src="<?php echo URL; ?>libs/js/jquery-ui.js"></script>

<!--<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/jquery-multi-select/js/jquery.quicksearch.js"></script>-->
<!--<script src="<?php echo URL; ?>libs/js/advanced-form.js"></script>-->

<script>

//    $(".dateadded").datepick({
//        dateFormat: 'yyyy-mm-dd',
//        yearRange: 'c-30:c+20'
//    });
</script>


<?php ?>   
<script>
    $(function () {
//        $(document).on("click", "#date_pick_pin", function () {
//            $(".dateadded").trigger("focus");
//        });
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
                            alertify.alert("Info", "Please fill all required fields");
                            return;
                        }
                    }
                });

            });
        };
        $('.dpYears').datepicker();
        validateForm(".add_student");

    });
    $(document).ready(function () {

        $(document).on("change", "#student_profile", function () {
            $("#image_name").html($(this).val());
//           $("#image_pin").html();
//           $("#image_pin").html().replace("Browse","Change")
//                   .replace("Browse","Change");
//            alert(txt);
        });

        $(document).on("change", ".allclasses", function () {
            var subclass = $('.allclasses').find(":selected").val();
// alert(subclass);
            $.post("http://localhost/attendance/student/getsubclass", {
                subclass: subclass
            },
                    function (r) {
//           alert(r)


                        var result = JSON.parse(r);

                        //                alert(result)


                        if (result.length === 0) {
                            $(".subclass").empty();
                            $(".subclass").append("   <option value='' disabled='' class=''> Select Class Subclass</option>");

                        } else {
                            $(".subclass").empty();
                            $(".subclass").append("<option value='' disabled='' class=''> Select Class Subclass</option> ");
                            $.each(result, function (res, res) {
                                console.log(res)
                                var sub_classname = res.sub_classname;
                                var sub_classid = res.id;
//                           alert(sub_classid)
                                var opt = ' <option value="' + sub_classid + '">' + sub_classname + '</option>';
                                $(".subclass").append(opt);
                            });

                        }
                        //           }
                    });
        })


    });
</script>




