<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="libs/images/favicon.png">
        <title> SchoolBiz</title>
        <!--Core CSS -->
        <link href="<?php echo URL; ?>libs/bs3/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/css/clndr.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/js/bootstrap-timepicker/compiled/timepicker.css" />
        <!--clock css-->
        <link href="<?php echo URL; ?>libs/js/css3clock/css/style.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo URL; ?>libs/js/morris-chart/morris.css">
        <!-- Custom styles for this template -->

        <link href="<?php echo URL; ?>libs/css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/css/style-responsive.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/js/bootstrap-datepicker/css/datepicker.css" />
        <script src="<?php echo URL; ?>libs/js/jquery2.1.3.min.js"></script>
        <script src="<?php echo URL; ?>libs/js/fullcalendar/fullcalendar.min.js"></script>
        <link href="<?php echo URL; ?>libs/css/neon.css" rel="stylesheet" />
        <link href="<?php echo URL; ?>libs/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>css/alertify.min.css" />
        <!--/opt/lampp/htdocs/school/libs/js/jquery.PrintArea.js-->
        <script src="<?php echo LIBS; ?>js/alertify.min.js" type="text/javascript"></script>
        <script src="<?php echo LIBS; ?>js/jquery.tabledit.js" type="text/javascript"></script>
        <script src="<?php echo LIBS; ?>js/jQuery.print.js" type="text/javascript"></script>
        <!--        /opt/lampp/htdocs/school/libs/js/jquery2.1.3.min.js-->

        <!--/home/david/Desktop/Link to htdocs/school/libs/js/jquery.tabledit.js
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]>
        <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]--> 
         <!--<link href="<?php echo URL; ?>libs/css/turquoise-theme.css" rel="stylesheet">-->
    </head>
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
    <body>
        <section id="container">
            <!--header start-->
            <header class="header fixed-top clearfix">
                <!--logo start-->
                <div class="brand">

                    <a href="<?php echo URL; ?>" class="logo" style="color:#fff; font-family: 'Amita';">
                        <!--<img src="<?php echo URL; ?>libs/images/logo.png" alt="">-->
                        SchoolBiz
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </div>
                <!--logo end-->

                <div class="nav notify-row pull-left" id="top_menu">
                    <div style="font-weight: bold;
                         font-size: 22px;margin-left: 288px;
                         margin-top: -16px;">
                        <span>
                            Current Term:
                        </span>
                        <span>
                            <?php echo termid2name(get_current_term()); ?>
                        </span>

                    </div>

                    <!--  notification start -->
                    <ul class="nav top-menu">

                        <!-- inbox dropdown start-->
                      
                        <!-- inbox dropdown end -->
                    </ul>
                    <!--  notification end -->
                    <div style="font-weight: bold;
                         font-size: 22px;margin-left: 288px;">
                        <span>
                            Current Session:
                        </span>
                        <span>
                            <?php echo sessionid2name(get_current_session()) ?>
                        </span>

                    </div>
                </div>

                <div class="top-nav clearfix">

                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <!--                        <li>
                                                    <input type="text" class="form-control search" placeholder=" Search">
                                                </li>-->
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="<?php echo get_image_url($_SESSION["type"], uname2id($_SESSION["id"])); ?>">
                                <span class="username"><?php echo getfullName($_SESSION["type"], $_SESSION["id"]) ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
<!--                                <li><a href="<?php echo URL; ?>profile/view/<?php echo $_SESSION['id']; ?>"><i class=" fa fa-suitcase"></i>View Profile</a></li>
                                <li><a href="<?php echo URL; ?>profile/edit/<?php echo $_SESSION['id']; ?>"><i class=" fa fa-suitcase"></i>Edit Profile</a></li>-->
                                <li><a href="<?php echo URL; ?>settings"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="<?php echo URL; ?>settings/switchcalender"><i class="fa fa-cog"></i>New Term /Session</a></li>
                                <li><a href="<?php echo URL; ?>logout"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                        <!--                        <li>
                                                    <div class="toggle-right-box">
                                                        <div class="fa fa-bars"></div>
                                                    </div>
                                                </li>-->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <script>

                $(document).ready(function () {
                    $('.modal').on('hidden.bs.modal', function () {
                        location.reload();
                    })
       //$('#modal_payhistory').on('hidden.bs.modal', function () {
       //location.reload();
       //})


                })
            </script>