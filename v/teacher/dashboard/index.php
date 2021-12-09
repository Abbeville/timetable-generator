<style>
    .count{
        font-weight: bold;
        font-size: 43px;
        padding-top: 27px;
    }
    .widget-h {
        color: #afaebc;
        font-size: 16px;
        text-transform: uppercase;
        margin: 0px 0px 10px 0px;
        text-align: center;
        font-weight: bold;
    }
    .calend {
        margin-left: auto;
        margin-right: auto;
        width: 75%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="row">

            <!--CALENDAR-->
            <!--col-md-8 col-xs-8-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-warning" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            Calendar
                        </div>
                    </div>
                    <div class="panel-body" style="padding: 9px;">
                        <div class="calendar-env">
                            <div class="calendar-body table table-hover table-responsive">
                                <div id="calendar" class="has-toolbar"></div>
                                <div id="notice_calendar"  class="has-toolbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>

<script>
    jQuery(document).ready(function ($)
    {
        var calendar = $('#notice_calendar');
        $('#notice_calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: false,
            firstDay: 1,
            height: 430,
            droppable: false,
            events: [
<?php
$notices = get_noticeboards();
foreach ($notices as $row) {
    $start_date = explode("/", $row['create_timestamp']);
    $end_date = explode("/", $row['end_timestamp']);
    ?>
                    {
                        title: "<?php echo $row['notice_title']; ?>",
                        start: new Date(<?php echo $start_date[2] ?>,
    <?php echo $start_date[1] - 1 ?>,
    <?php echo $start_date[0] ?>),
                        end: new Date(<?php echo $end_date[2] ?>,
    <?php echo $end_date[1] - 1 ?>,
    <?php echo $end_date[0] ?>)
                    },
<?php } ?>
            ]
        });
    });
</script>



<!--
<script>
    jQuery(document).ready(function ($)
    {
        var calendar = $('#notice_calendar');
        $('#notice_calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            editable: false,
            firstDay: 1,
            height: 430,
            droppable: false,
            events: [
<?php
$notices = get_noticeboards();
//print_r($notices);
foreach ($notices as $row) {
    $start_date = explode("/", $row['create_timestamp']);
    $end_date = explode("/", $row['end_timestamp']);
    ?>
                                    {
                                        title: "<?php echo $row['notice_title']; ?>",
                                        start: new Date(<?php echo $start_date[2] ?>,<?php echo $start_date[1] * 1 ?>,<?php echo $start_date[0] * 1 ?>),
                                        end: new Date(<?php echo $end_date[2] * 1 ?>,<?php echo $end_date[1] * 1 ?>,<?php echo $end_date[0] * 1 ?>)
                                    },
<?php } ?>
            ]
        });
    });
</script>-->