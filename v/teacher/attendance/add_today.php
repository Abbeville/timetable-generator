<?php
$curr_marking_date = $this->current_marking_date;
$all_class_student = $this->all_class_students;
//print_r($all_class_student);
$class_count = count($all_class_student);
//echo "$att_count";
?>
<div class="col-md-12" style="text-align: center; margin: 18px;">
    <span class="label label-primary mad_date_ooo" style="font-size: large; margin-left: auto; margin-right: auto;"><?php echo $curr_marking_date ?></span> 
</div> 
<div class="col-sm-12">
    <div class="table-responsive">
        <table class="table  table-striped table-condensed cf">
            <thead class="c f">
        <!--<thead>-->
                <?php if ($class_count != 0) { ?>


                    <tr>
                        <th class="min-w-td"> #</th>

                        <th>Name</th>

                        <th class=" ">Mark Attendance</th>

                    </tr>
                <?php } ?>

                <?php if ($class_count === 0) { ?>
                    <tr>
                        <th>NO STUDENT IN SELECTED CLASS </th>
                    </tr>
                <?php } ?>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                foreach ($all_class_student as $key => $value) {
                    ?>
                    <tr class="">
                        <td class="min-w-td"><?php echo $sn; ?></td>
                        <td><?php echo $value["name"] ?></td>
                        <td class=" ">
                            <div class=" hiuouu">
                                <button  class="btn btn-primary btn-sm submit_att_present"  type="button" julesbianchi="<?php echo $value["id"] ?>" julesbianchi_cl="<?php echo $value["class_id"] ?>"><span class="fa fa-square"></span> &nbsp; Present&nbsp;</button>
                                <button  class="btn btn-danger btn-sm submit_att_absent"  type="button" ricardobianchi="<?php echo $value["id"] ?>" ricardobianchi_cl="<?php echo $value["class_id"] ?>"><span class="fa fa-square"></span> &nbsp; Absent&nbsp;</button>
                            </div>  
                        </td>
                    </tr>
                    <?php
                    $sn++;
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<div class="col-md-12 done-marking" style="text-align: center; margin: 18px; display: none;">
    <a  class="btn btn-primary btn-sm "  type="button" href="<?php echo URL; ?>attendance"><span class="fa fa-check"></span> &nbsp; Done!&nbsp;</a>
</div> 
<script>
    var checkCompletion = function () {
        var total_students =<?php echo $class_count; ?>;
        var doners = $(".attendance_done");
//        console.log()
        if (doners.length === total_students) {
            $('.done-marking').show("slow");
        }
//        console.log(doners.length);
    };
//    $(document).on("click", ".done-marking", function (e) {
//
//    });
    $(document).on("click", ".submit_att_present", function (e) {
        if ($(this).parent().attr("attendance-status") === "done") {
//        alert("to prevent repeat")

//            return;
        }
        $("[attendance-status~=done]").removeAttr("attendance-status");
        var me = $(this);
//        console.log(me.html());
        var done_txt = '<span class="fa fa-check-square"></span> &nbsp; Present&nbsp';
        $(this).parent().attr("attendance-status", "done");
        var txt = me.siblings("button").html();
        var peer = $(this).siblings("button");
        var parent = $(this).parent();
        var nxt_txt = txt.replace('<span class="fa fa-check-square"></span>', '<span class="fa fa-square"></span>');

        //      $(this).attr("attendance-status","done");
        var student_id = $(this).attr("julesbianchi");
        var class_id = $(this).attr("julesbianchi_cl");
        var t_date_id = $(".mad_date_ooo").text();
        if (student_id === "") {
            return;
        } else {
            $.post("<?php echo URL; ?>attendance/mark_att_with_present/",
                    {
                        "student_id": student_id,
                        "s_class_id": class_id,
                        "t_date": t_date_id

                    },
                    function (data) {
//                        console.log(log);
                        if (data === "1") {
//                            console.log(parent);
                            peer.html(nxt_txt);
                            parent.addClass("attendance_done");
                            me.html(done_txt);
                            $("[attendance-status~=done]").removeAttr("attendance-status");
                            checkCompletion();
                            return;
                        } else if (data === "112") {
                            alert("Attendance record Already exists \n\
You can change attendance record under\n\
 MANAGE ATTENDANCE ");
                            return;
                        } else {
//                            
                        }
                    });
        }

        return;
    });
    $(document).on("click", ".submit_att_absent", function (e) {
        if ($(this).parent().attr("attendance-status") === "done") {
            return;
        }
        $("[attendance-status~=done]").removeAttr("attendance-status");
        var me = $(this);
//        console.log(me.html());
        var done_txt = '<span class="fa fa-check-square"></span> &nbsp; Absent&nbsp';
        $(this).parent().attr("attendance-status", "done");
        var txt = $(this).siblings("button").html();
        var peer = $(this).siblings("button");
        var parent = $(this).parent();
        var nxt_txt = txt.replace('<span class="fa fa-check-square"></span>', '<span class="fa fa-square"></span>');

        var student_id = $(this).attr("ricardobianchi");
        var class_id = $(this).attr("ricardobianchi_cl");
        var t_date_id = "<?php echo $curr_marking_date ?>"

        if (student_id === "") {
            return
        } else {

            $.post("<?php echo URL; ?>attendance/mark_att_with_absent/",
                    {
                        "student_id": student_id,
                        "s_class_id": class_id,
                        "t_date": t_date_id

                    },
                    function (data) {
//                      alert(data);
//                      return ;
                        if (data === "1") {
//                            alert("MARKED ABSENT ");
//                     
//                            $("[attendance-status~=done]").text("STUDENT ATTENDANCE MARKED AS ABSENT");
                            peer.html(nxt_txt);
                            parent.addClass("attendance_done");
                            me.html(done_txt);
                            $("[attendance-status~=done]").removeAttr("attendance-status");
                            checkCompletion();
                        } else if (data === "112") {
                            alert("Attendance record Already exists \n\
You can change attendance record under\n\
 MANAGE ATTENDANCE ")
                        } else {
//                            alert("Error updating Subject");
//                            location.reload()
                        }
                    });
        }

    });
</script>