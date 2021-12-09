<?php
$class_id = $this->class_id;
$courses = get_courses();
$periods = get_periods();
$lecturers = get_lecturers();
$days = get_days();

?>

<div class="panel ">
    <div class="panel-heading">
        <h3 class="panel-title">Add Time Table</h3>
    </div>

    <!--VALIDATION STATES-->
    <!--===================================================-->
    <div class="row">
            <form style="padding-top: 0px;" action="<?php echo URL; ?>timetable/addTimetable" method="post" 
                  class="form-horizontal form-groups-bordered validate panel-body" enctype="multipart/form-data">

                  <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                <div  style="padding-top: 0px;"  class="panel-body">

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Period/Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                          </tr>
                        </thead>
                        <tbody id="setTimetable">
                            <?php
                                $lecture_counter = 0; 
                                $i = 1 ;
                            while ($i < count($periods) + 1) {
                                # code...
                            ?>
                          <tr>
                            <td><?php echo $periods[$i - 1]['time']; ?></td>
                                <?php
                                    $j = 1;
                                    // while ($j < 6) {
                                    while ($j < count($days) - 1){
                                        # code...
                                ?>
                            <td>
                                <input type="hidden" name="lecture[<?php echo $lecture_counter; ?>][period_id]" value="<?php echo $periods[$i - 1]['id']; ?>">
                                <input type="hidden" class="form-control" name="lecture[<?php echo $lecture_counter; ?>][day_id]" value="<?php echo $days[$j - 1]['id']; ?>">
                                <select class="form-control" name="lecture[<?php echo $lecture_counter; ?>][course_id]">
                                    <option value="">Select Course</option>
                                    <?php
                                    foreach ($courses as $row) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['course_code']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <select class="form-control" name="lecture[<?php echo $lecture_counter; ?>][lecturer_id]" onchange="selectLecturer(this, <?= $i; ?>)">
                                    <option value="">Set Lecturer</option>
                                    <?php
                                    foreach ($lecturers as $row) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                                <?php
                                    $j = $j + 1;
                                    $lecture_counter++;
                                }
                                ?>
                          </tr>
                          <?php $i = $i + 1; } ?>
                        </tbody>
                      </table>

                      <div class="form-group col-md-3 space-left" style="margin-left: 5px;">
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-lg btn-primary pull-right" id="submit-button">Submit</button>
                              <span id="preloader-form"></span>
                          </div>
                      </div>
                </div>
                </div>
            </form>    
    </div>
    
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

<script type="text/javascript">
    $(document).ready(function(){

        Window.lectures = [];

    });

    function selectLecturer(el, period) {
        var lecturer_id = el.value;
        //Check if lecturer exists in unvailableStack
        var busy = lecturerIsInStack(lecturer_id, period);

        if (busy) {
            alert('This lecturer is already having a period');
            //reset the selectedLecturer to null.
            el.value = "";
            return;
        }

        makeUnavailable(lecturer_id, period);
    }

    function makeUnavailable(lecturer_id, period) {
        Window.lectures.push(
                {
                    id : lecturer_id,
                    period_id : period
                }
            );
    }

    function lecturerIsInStack(lecturer_id, period) {
        if (Window.lectures.length < 1) {
            return false;
        }

        return Window.lectures.some(function(lec){
            return lec.id === lecturer_id && lec.period_id === period;
        });
    }


</script>

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




