<div style="text-align: center;text-align: center;
font-weight: bold;
font-size: 15px;">
    Design and Developed by Foenet Systems ( 07030831269)
</div>
</section>
</section>
</section>
<!--<script src="<?php echo URL; ?>libs/js/jquery.js"></script>-->
<script src="<?php echo URL; ?>libs/js/jquery2.1.3.min.js"></script>
       <script src="<?php echo LIBS; ?>js/jQuery.print.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>libs/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo URL; ?>libs/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo URL; ?>libs/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo URL; ?>libs/js/easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo URL; ?>libs/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo URL; ?>libs/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>libs/js/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="<?php echo URL; ?>libs/js/advanced-form.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo URL; ?>libs/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo URL; ?>libs/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.pie.resize.js"></script>
 <script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.selection.js"></script>
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo URL; ?>libs/js/flot-chart/jquery.flot.time.js"></script>
<!--<script src="<?php echo URL; ?>libs/js/flot.chart.init.js"></script>-->

<!--///-->
<script src="<?php echo URL; ?>libs/js/chart-js/Chart.js"></script>
<script src="<?php echo URL; ?>libs/js/chartjs.init.js"></script>
<!--common script init for all pages-->
<script src="<?php echo URL; ?>libs/js/scripts.js"></script>

<script src="<?php echo URL; ?>libs/js/toggle-init.js"></script>

<script>

    var neonCalendar = neonCalendar || {};
    ;
    (function($, window, undefined)
    {
        "use strict";
        $(document).ready(function()
        {
            neonCalendar.$container = $(".calendar-env");
            $.extend(neonCalendar, {isPresent: neonCalendar.$container.length > 0});
            if (neonCalendar.isPresent)
            {
                neonCalendar.$sidebar = neonCalendar.$container.find('.calendar-sidebar');
                neonCalendar.$body = neonCalendar.$container.find('.calendar-body');
                var $cb = neonCalendar.$body.find('table thead input[type="checkbox"], table tfoot input[type="checkbox"]');
                $cb.on('click', function()
                {
                    $cb.attr('checked', this.checked).trigger('change');
                    calendar_toggle_checkbox_status(this.checked);
                });
                neonCalendar.$body.find('table tbody input[type="checkbox"]').on('change', function()
                {
                    $(this).closest('tr')[this.checked ? 'addClass' : 'removeClass']('highlight');
                });
                if ($.isFunction($.fn.fullCalendar))
                {
                    var calendar = $('#calendar');
                    calendar.fullCalendar({header: {left: 'title', right: 'month,agendaWeek,agendaDay today prev,next'}, editable: true, firstDay: 1, height: 600, droppable: true, drop: function(date, allDay) {
                            var $this = $(this), eventObject = {title: $this.text(), start: date, allDay: allDay, className: $this.data('event-class')};
                            calendar.fullCalendar('renderEvent', eventObject, true);
                            $this.remove();
                        }});
                    $("#draggable_events li a").draggable({zIndex: 999, revert: true, revertDuration: 0}).on('click', function()
                    {
                        return false;
                    });
                }
                else
                {
                    alert("Please include full-calendar script!");
                }
                $("body").on('submit', '#add_event_form', function(ev)
                {
                    ev.preventDefault();
                    var text = $("#add_event_form input");
                    if (text.val().length == 0)
                        return false;
                    var classes = ['', 'color-green', 'color-blue', 'color-orange', 'color-primary', ''], _class = classes[Math.floor(classes.length * Math.random())], $event = $('<li><a href="#"></a></li>');
                    $event.find('a').text(text.val()).addClass(_class).attr('data-event-class', _class);
                    $event.appendTo($("#draggable_events"));
                    $("#draggable_events li a").draggable({zIndex: 999, revert: true, revertDuration: 0}).on('click', function()
                    {
                        return false;
                    });
                    fit_calendar_container_height();
                    $event.hide().slideDown('fast');
                    text.val('');
                    return false;
                });
            }
        });
    })(jQuery, window);
    function fit_calendar_container_height()
    {
        if (neonCalendar.isPresent)
        {
            if (neonCalendar.$sidebar.height() < neonCalendar.$body.height())
            {
                neonCalendar.$sidebar.height(neonCalendar.$body.height());
            }
            else
            {
                var old_height = neonCalendar.$sidebar.height();
                neonCalendar.$sidebar.height('');
                if (neonCalendar.$sidebar.height() < neonCalendar.$body.height())
                {
                    neonCalendar.$sidebar.height(old_height);
                }
            }
        }
    }
    function reset_calendar_container_height()
    {
        if (neonCalendar.isPresent)
        {
            neonCalendar.$sidebar.height('auto');
        }
    }
    function calendar_toggle_checkbox_status(checked)
    {
        neonCalendar.$body.find('table tbody input[type="checkbox"]' + (checked ? '' : ':checked')).attr('checked', !checked).click();
    }
</script>
<!--script for this page-->
<style>
    html,body{
        width: 100%;
        height: 100%;
    }
    .leftside-navigation{
        height: calc(100% - 75px);
    }
</style>
</body>
</html> 