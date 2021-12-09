<?php
// $all_classes = $this->all_classes
$my_classes = $this->my_classes;
?> 

<div class="panel">
    <div class="panel-body" style="margin-bottom: 0px;">
        <form action="#" class="form-horizontal ">
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="panel">
                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="<?php echo date("d-m-Y"); ?>"   class="input-append date dpYears">
                            <input type="text" readonly="" value="<?php echo date("d-m-Y"); ?>" size="16" class="form-control view_all_class_attendance_date">
                            <span class="input-group-btn add-on">
                                <button class="btn btn-primary" style="margin-left: -31px;" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel">
                        <select class="form-control view_all_class_attendance">
                            <option disabled="true" selected="true">Select Class</option>
                            <?php foreach ($my_classes as $key => $value) { ?>
                                <option value="<?php echo $value["class_id"] ?>"><?php echo $value["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12" style="text-align: center;">
                    <button class="btn btn-primary manage_class_attendance" type="button">Manage<i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
    <hr style="margin-top: 0px;">
    <div class="panel-body">
        <section id="flip-scroll" class="display_selected_att">
            
        </section>
    </div>

</div>
<script>

    $(document).on("click", ".manage_class_attendance", function (e) {
        $viewing_class_id = $(".view_all_class_attendance").val();
        $viewing_class_id_date = $(".view_all_class_attendance_date").val();
//        alert($viewing_class_id);
//        alert($viewing_class_id_date);
        if ($viewing_class_id === null || $viewing_class_id_date === "" || $viewing_class_id_date === "12-02-2012") {
            alert("Invalid Entry");
            return;
        }

        $.get("http://localhost/attendance/attendance/add_to_today/", {headless: true, class_id: $viewing_class_id, viewing_date: $viewing_class_id_date}, function (resp) {
//                alert(resp);
            $('.display_selected_att').html(resp);
        });

    });

</script>
