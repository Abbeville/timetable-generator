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

    function profile_show(username, fullname) {
    username = $.trim(username);
    // LOADING THE AJAX MODAL
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
    $.get("http://localhost/attendance/student/view/" + username, {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
    popShiiUp(fullname + "'s Profile", resp);
    });
    }

    function edit_profile(username, fullname) {
    username = $.trim(username); 
    window.location="http://localhost/attendance/student/edit/" + username;
//    $.get("http://localhost/attendance/student/edit/" + username, {headless: true}, function (resp) { 
//    popShiiUp("Edit " + fullname + "'s Profile", resp);
//    });
    }
    function newsubclass(classid) {
    // LOADING THE AJAX MODAL
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
    $.get("http://localhost/attendance/student/newsubclass/" + classid, {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
    popShiiUp("Add new Subclass", resp);
    });
    }

    function delete_student(username, fullname) {
    username = $.trim(username);
    alertify.confirm("Delete Student", "Do You Really Want To Delete " + fullname + "?", function () {
    $.post("http://localhost/attendance/student/delete/", {who: username}, function (resp) {
//                jQuery('#modal_profile .modal-body').html(resp);
    if (resp !== "fail") {
    window.location = "http://localhost/attendance/student/class_list/" + resp;
    }
    });
    }, function () {

    });
    }

    function showMarksheet(username, fullname) {
    username = $.trim(username);
    // LOADING THE AJAX MODAL
//        alert(username)
//var u = encodeURI(username);
//        jQuery('#modal_marksheet').modal('show', {backdrop: 'true'});
    $.get("http://localhost/attendance/exam/marksheet/" + username, {headless: true}, function (resp) {
//      alert(resp)
    popShiiUp(fullname + "'s Score Sheet", resp);
//            jQuery('#modal_marksheet .modal-body').html(resp);
    });
    }

</script>

