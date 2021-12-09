
<?php
//define("URL", "http://localhost/sui/");
?>   
<?php ?>

<!DOCTYPE html>
<html class=" overthrow-enabled" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ================================================= -->
        <!--                 STYLESHEET                        -->
        <!-- ================================================= -->

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/js/bootstrap-datepicker/css/datepicker.css" />
        <!--calendar css-->
        <link href="<?php echo URL; ?>libs/assets/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>libs/assets/fullcalendar/style.css" rel="stylesheet" />

        <!--<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/ui/semantic.min.css">-->

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/ui/components/icon.css">

        <!-- Bootstrap Core -->
        <link href="<?php echo URL; ?>libs/nifty/bootstrap.css" rel="stylesheet">


        <!-- Roboto Font -->
        <!--<link href="<?php echo URL; ?>libs/nifty/css.css" rel="stylesheet" type="text/css">-->


        <!-- Admin Core -->
        <link href="<?php echo URL; ?>libs/nifty/nifty.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/ui/components/segment.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/ui/components/card.css">
        <link href="<?php echo URL; ?>libs/assets/css/alertify.css" rel="stylesheet"> 
        <link href="<?php echo URL; ?>libs/assets/css/fonts.css" rel="stylesheet" media="screen">
        <link href="<?php echo URL; ?>libs/assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo URL; ?>libs/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" media="screen">

        <!--Page load progress bar -->
        <script src="<?php echo URL; ?>libs/nifty/pace.js"></script>
        <!-- ================================================================= -->

        <!-- jQuery Version 2.1.1 -->
        <script src="<?php echo URL; ?>libs/nifty/jquery-2.js"></script>
        <script src="<?php echo URL; ?>libs/js/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="<?php echo URL; ?>libs/js/autocomplete.min.js"></script>

        <style>
            .alertify .ajs-header {
                margin: -24px;
                margin-bottom: 0;
                padding: 16px 24px;
                background-color: #fff;
                display: none;
            }
            .alertify .ajs-body {
                min-height: 56px;
                word-wrap: break-word;
                font-weight: bold;
            }
            .alertify .ajs-footer .ajs-buttons.ajs-primary .ajs-button {
                margin: 4px;
                background: #458FD2;
                color: #fff;
                border: none;
            }
            .panel{
                margin-bottom: 12px;
            }
            .nav-tabs a{
                text-transform: capitalize;
            }

            .custo-select {
                border: 1px solid #ccc;
                width: 100%;
                border-radius: 3px;
                overflow: hidden;
                background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
            }

            .custo-select select option{
                /*width: 80%;*/
                height: 25px;
                line-height: 25px;
                text-transform: capitalize;
                background: #fff;
                border-bottom: 1px solid #eee;
            }
            .custo-select select {
                padding: 5px 8px;
                width: calc(100% + 16px);
                border: none;
                box-shadow: none;
                background: transparent;
                background-image: none;
                -webkit-appearance: none;
            }

            .custo-select select:focus {
                outline: none;
            }
        </style>

        <!--For further information and examples, can be found in the document.-->
        <!-- ================================================================= -->
        <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background-color: #212633;border-radius: 2px;color: white;text-align: right;white-space: nowrap;padding: 7px 14px;z-index: 10000;}.jqsfield { color: white;font-size: 14;text-align: right;}</style>
        <script>
            function nope() {
                $('.poll').Tabledit({
                    url: 'http://localhost/attendance/exam/recordmark',
                    deleteButton: false,
                    columns: {
                        identifier: [2, 'id'],
                        editable: [[3, 'test_score'], [4, 'exam_score'], [5, 'term'], [6, 'session'], [7, 'subject'], [8, 'class']]
                    },
                    onDraw: function () {
                        console.log('onDraw()');
                    },
                    onSuccess: function (data, textStatus, jqXHR) {
                        console.log('onSuccess(data, textStatus, jqXHR)');
                        console.log(data);
                        alert(data)
                        console.log(textStatus);
                        console.log(jqXHR);
                    },
                    onFail: function (jqXHR, textStatus, errorThrown) {
                        console.log('onFail(jqXHR, textStatus, errorThrown)');
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                    onAlways: function () {
                        //    alert(d)
                        console.log('onAlways()');
                    },
                    onAjax: function (action, serialize) {
                        console.log('onAjax(action, serialize)');
                        console.log(action);
                        console.log(serialize);
                    }
                });
            }

        </script>
    </head>

    <body class=" nifty-ready pace-done">
        <div class="pace  pace-inactive">
            <div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>
        <div id="container" class="effect mainnav-in">

            <!-- NAVBAR -->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">

                    <!-- BRAND LOGO & TEXT -->
                    <!--===================================================-->
                    <div class="navbar-header">
                        <a href="<?php echo URL; ?>" class="navbar-brand" style="background: #eee;">
                            <img alt="Schools" src="<?php echo URL; ?>libs/nifty/favicon.png" class="brand-icon">
                            <span class="brand-title" style="background: #2F343B;">
                                <span class="" href="#home" style="font-family: 'RissaTypeface';font-size: 2em; color: #fff; ">Time Table</span>
                            </span>
                        </a>
                    </div>
                    <!--===================================================-->
                    <!-- END OF BRAND LOGO & TEXT -->

                    <!-- NAVBAR DROPDOWN -->
                    <!--===================================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">

                            <!-- MAINMENU TOGGLE BUTTON -->
                            <!--===================================================-->
                            <li class="tgl-menu-btn">
                                <a id="demo-toggle-mainnav-btn" href="#">
                                    <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>
                            <!--===================================================-->

                            <!--MESSAGES TOGGLE-->
                            <!--=============================-->

                            <!-- <li class="dropdown"> -->

                                <!-- Dropdown button -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <!-- <a aria-expanded="true" href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope fa-lg"></i>
                                    <span class="badge badge-header badge-warning">9</span>
                                </a> -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->



                                <!-- Dropdown menu -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <!-- <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <p class="text-lg text-muted text-thin mar-no">You have 3 messages.</p>
                                    </div>
                                    <div style="height: 265px;" class="nano scrollable has-scrollbar">
                                        <div style="right: -15px;" tabindex="0" class="nano-content">
                                            <ul class="head-list"> -->
                                                <!-- Dropdown list -->
                                               <!--  <li>
                                                    <a class="media" href="#">
                                                        <span class="media-left">
                                                            <img class="img-circle img-sm" src="<?php echo URL; ?>libs/assets/img/av1.png" alt="Profile Picture">
                                                        </span>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Andy sent you a message</div>
                                                            <small class="text-muted">15 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div style="display: block;" class="nano-pane"><div style="height: 147px; transform: translate(0px, 0px);" class="nano-slider"></div></div></div> -->


                                    <!-- Dropdown footer -->
                                    <!-- <div class="pad-all bord-top">
                                        <a class="btn-link text-dark box-block" href="#">
                                            <i class="fa fa-angle-right fa-lg pull-right"></i> Show All Messages
                                        </a>
                                    </div>
                                </div> -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                            <!-- </li> -->

                            <!--=================================-->


                        </ul>


                        <ul class="nav navbar-top-links pull-right">
                            <!-- USER DROPDOWN -->
                            <!--===================================================-->
                            <li id="dropdown-user" class="dropdown">
                                <!-- Dropdown button -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right">
                                        <img class="img-circle img-user media-object" src="<?php echo get_image_url(); ?>" alt="<?php // echo $respmydetails["name"];                                                          ?>">
                                    </span>
                                    <div class="username hidden-xs"><?php echo ucwords($_SESSION["id"]) ?></div>
                                </a>
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                                <!-- Dropdown menu -->
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

                                    <ul class="head-list">

                                        <!-- Dropdown list -->
                                        <li>
                                            <a href="#" onclick="admin_profile_show('<?php echo $_SESSION['id']; ?>', '<?php echo $_SESSION['id']; ?>', '<?php echo $_SESSION['type']; ?>');">
                                                <i class="fa fa-user fa-fw fa-lg"></i>
                                                <span class="text-nowrap">Profile</span>
                                            </a>
                                        </li>

                                        <!-- Dropdown list -->
                                       <!--  <li>
                                            <a class="clearfix" href="#">
                                                <span class="badge badge-danger pull-right">9</span>
                                                <span class="pull-left">
                                                    <i class="fa fa-envelope fa-fw fa-lg"></i>
                                                    <span>Messages</span>
                                                </span>
                                            </a>
                                        </li> -->

                                    </ul>

                                    <!-- Dropdown footer -->
                                    <div class="pad-all">
                                        <a href="<?php echo URL; ?>logout" onclick="window.location = '<?php echo URL; ?>logout'" class="btn btn-sm btn-danger btn-labeled  fa fa-sign-out icon-lg">Logout</a> 
                                    </div>
                                </div>
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                            </li>
                            <!-- END OF USER DROPDOWN -->
                            <!--===================================================-->

                        </ul>
                    </div>
                    <!--===================================================-->
                    <!-- END OF NAVBAR DROPDOWN -->

                </div>
            </header>
            <!--===================================================-->
            <!-- END OF NAVBAR -->

            <!-- CONTENT -->
            <!--===================================================-->
            <div class="boxed">


                <!-- CONTENT CONTAINER -->
                <!--===================================================-->
                <div id="content-container">

                    <!-- PAGE CONTENT -->
                    <!--===================================================-->
                    <div id="page-content" class="wrapper" style="margin: 0px;">


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

                            function admin_profile_show(username, fullname, role) {
                            username = $.trim(username);
                            // LOADING THE AJAX MODAL
                        //  jQuery('#modal_profile').modal('show', {backdrop: 'true'});
                            $.get("http://localhost/attendance/profile/view/" + username, {headless: true}, function (resp) {
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

