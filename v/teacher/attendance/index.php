 
<?php
// $all_classes = $this->all_classes
$my_classes = $this->my_classes;
?> 
<!--<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">
            Attendance
        </h3>
        <div class="panel-control">
            <a href="<?php echo URL; ?>attendance/today" class="btn btn-mint"><i class="fa fa-plus"></i> Mark Attendance</a>
        </div>
    </div>
</div>-->


<div class="panel">
    <!-- Panel heading -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="panel-heading">
        <div class="panel-control">
            <ul class="pager pager-rounded">
                <li>
                    <a href="<?php echo URL; ?>attendance/today" ><i class="fa fa-plus"></i> Mark Attendance</a>
                </li>
            </ul>
        </div>
        <h3 class="panel-title">Attendance</h3>
    </div>

</div>



<div class="panel">
    <div class="panel-body">
        <form action="#" class="form-horizontal">
            <!--<div class="form-group">-->
            <div class="col-sm-6">
                <div class="panel">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date("d-m-Y"); ?>"  class="input-append date dpYears">
                        <input type="text" readonly="" value="<?php echo date("d-m-Y"); ?>" size="16" class="form-control viewing_all_class_attendance_date">
                        <span class="input-group-btn add-on" >
                            <button class="btn btn-primary" type="button" style="margin-left: -31px;"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel">
                    <select class="form-control viewing_all_class_attendance">
                        <option disabled="true" selected="true">Select Class</option>
                        <?php foreach ($my_classes as $key => $value) { ?>
                            <option value="<?php echo $value["class_id"] ?>"><?php echo $value["name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12" style="text-align: center;">
                <button class="btn btn-primary viewing_class_attendance" type="button">VIEW<i class="fa fa-arrow-right"></i></button>
            </div>
            <!--</div>-->
        </form>
        <!--<br>-->
        <!--<hr>-->

    </div>
    <hr>
    <section id="flip-scroll" class="viewing_display_selected_att panel-body">


    </section>
</div>



<script>

    $(document).on("click", ".viewing_class_attendance", function (e) {
        $viewing_class_id = $(".viewing_all_class_attendance").val();
        $viewing_class_id_date = $(".viewing_all_class_attendance_date").val();
//        alert($viewing_class_id);
//        alert($viewing_class_id_date);
        if ($viewing_class_id === null || $viewing_class_id_date === "" || $viewing_class_id_date === "12-02-2012") {
            alert("Invalid Entry");
            return;
        }

        $.get("http://localhost/attendance/attendance/view_to_view/", {headless: true, class_id: $viewing_class_id, viewing_date: $viewing_class_id_date}, function (resp) {
//                alert(resp);
            $('.viewing_display_selected_att').html(resp);
        });

    });

</script>
