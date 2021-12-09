 
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
    }

    function add_room() {
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/pr-timetable/lecture_room/add", {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
            popShiiUp("Add Lecture Room", resp);
        });
    }

    function edit_room(room_id) {
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/pr-timetable/lecture_room/edit/" + room_id, {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
            popShiiUp("Edit Lecture Room", resp);
        });
    }

        function delete_room(username, department) {
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
