<?php
$lecturer_id = $this->lecturer_id;
$periods = get_periods();
$days = get_days();

?>

<div class="panel ">
    <div class="panel-heading">
        <h3 class="panel-title">View Lecturer Time Table</h3>
    </div>

    <!--VALIDATION STATES-->
    <!--===================================================-->
    <div class="row">

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

                            ?>
                          <tr>
                            <td><?php echo $periods[$i - 1]['time']; ?></td>
                                <?php
                                    $j = 1;

                                    while ($j < count($days) - 1){

                                ?>
                            <td>
                                <?php echo getLecturerTimeTable($lecturer_id, $i, $j) == null ? 'Free Period' : strtoupper(get_coursename_from_id(getLecturerTimeTable($lecturer_id,$i, $j)['course_id'])).'<br><b style="margin-left: 100px">'.strtoupper(get_classname_from_id(getLecturerTimeTable($lecturer_id,$i, $j)['class_id'])); ?>
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
                </div>
                </div>
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

<script>

//    $(".dateadded").datepick({
//        dateFormat: 'yyyy-mm-dd',
//        yearRange: 'c-30:c+20'
//    });
</script>


<?php ?>   
<script>
    $(function () {

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




