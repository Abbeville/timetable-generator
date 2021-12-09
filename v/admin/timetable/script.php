<script>

    function popShiiUp(title, content) {
//title=
    bootbox.dialog({
    message: content,
            title: title.toUpperCase(),
            buttons: {
//                success: {
//                    label: "Success!",
//                    className: "btn-success",
//                    callback: function () {
//                        $.niftyNoty({
//                            type: 'success',
//                            icon: 'fa fa-check',
//                            message: '<strong>Well done!</strong> You successfully read this important alert message. ',
//                            container: 'floating',
//                            timer: 3000
//                        });
//                    }
//                },

            danger: {
            label: "Close!",
                    className: "btn-danger",
                    callback: function () {
//                        $.niftyNoty({
//                            type: 'danger',
//                            icon: 'fa fa-times',
//                            message: '<strong>Oh snap!</strong> Change a few things up and try submitting again.',
//                            container: 'floating',
//                            timer: 3000
//                        });
                    }
            },
//                main: {
//                    label: "Click ME!",
//                    className: "btn-primary",
//                    callback: function () {
//                        $.niftyNoty({
//                            type: 'primary',
//                            icon: 'fa fa-thumbs-o-up',
//                            message: "<strong>Heads up!</strong> This alert needs your attention, but it's not super important.",
//                            container: 'floating',
//                            timer: 3000
//                        });
//                    }
//                }
            },
            animateIn: 'flipInY',
            animateOut: 'flipOutY'
    });
// Zoom in/out
    // =================================================================
//        $('#demo-bootbox-zoom').on('click', function () {
//        bootbox.confirm({
//            message: "<h4 class='text-thin'>Zoom In/Out</h4><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>",
//            buttons: {
//                confirm: {
//                    label: "Save"
//                }
//            },
//            callback: function (result) {
//                //Callback function here
//            },
//            animateIn: 'zoomInDown',
//            animateOut: 'zoomOutUp'
//        });
//        });


    }

    function timetable_show(class_id, fullname) {
    class_id = $.trim(class_id);
    // LOADING THE AJAX MODAL
    /*$.get("http://localhost/pr-timetable/timetable/view/" + class_id, {headless: true}, function (resp) {
    popShiiUp(fullname + "'s Profile", resp);
    });*/
        window.location="http://localhost/pr-timetable/timetable/view/" + class_id;
    }

    function add_timetable(class_id, class_name, programme) {
    class_id = $.trim(class_id); 
    class_name = $.trim(class_name); 
    programme = $.trim(programme); 
    window.location="http://localhost/pr-timetable/timetable/add/" + class_id +'/'+ class_name + '/'+programme;
    }

    function delete_timetable(username, department) {
    username = $.trim(username);
    department = $.trim(department);
    alertify.confirm("Delete Time Table", "Do You Really Want To Delete this time table?", function () {
    $.post("http://localhost/pr-timetable/timetable/delete/", {which: username, department : department}, function (resp) {
//                jQuery('#modal_profile .modal-body').html(resp);
    if (resp !== "fail") {
    window.location = "http://localhost/pr-timetable/timetable/class_list/" + resp;
    }
    });
    }, function () {

    });
    }

</script>

