 
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

    function add_class() {
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/attendance/allclass/add", {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
            popShiiUp("Add Class", resp);
        });
    }

    function edit_class(class_id) {
//        jQuery('#modal_profile').modal('show', {backdrop: 'true'});
        $.get("http://localhost/attendance/allclass/edit/" + class_id, {headless: true}, function (resp) {
//            jQuery('#modal_profile .modal-body').html(resp);
            popShiiUp("Edit Class", resp);
        });
    }

</script>
