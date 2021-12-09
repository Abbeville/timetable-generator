<?php
    $departments = $this->departments;
?>
<div id="preloader">
    <div id="status"></div>
</div>
<!DOCTYPE html>
<html class=" overthrow-enabled" lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Time Table - Student Signup</title>
        <!-- ================================================= -->
        <!--                 STYLESHEET                        -->
        <!-- ================================================= -->
        <!--/home/david/Desktop/Link to htdocs/fin/libs/nifty/css.css-->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/i/semantic.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>libs/assets/ui/components/icon.css">

        <!-- Bootstrap Core -->
        <link href="<?php echo URL; ?>libs/nifty/bootstrap.css" rel="stylesheet">

        <!-- Roboto Font -->
        <link href="<?php echo URL; ?>libs/nifty/css.css" rel="stylesheet" type="text/css">

        <!-- Admin Core -->
        <link href="<?php echo URL; ?>libs/nifty/nifty.css" rel="stylesheet">

        <link href="<?php echo URL; ?>libs/assets/css/fonts.css" rel="stylesheet" media="screen">

        <!--Page load progress bar -->
        <script src="<?php echo URL; ?>libs/nifty/pace.js"></script>

        <!-- ================================================================= -->

        <!--For further information and examples, can be found in the document.-->

        <!-- ================================================================= -->


        <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background-color: #212633;border-radius: 2px;color: white;text-align: right;white-space: nowrap;padding: 7px 14px;z-index: 10000;}.jqsfield { color: white;font-size: 14;text-align: right;}</style></head>
    <body class=" nifty-ready pace-done"><div class="pace  pace-inactive"><div data-progress="99" data-progress-text="100%" style="width: 100%;" class="pace-progress">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div></div>
        <div id="container" class="cls-container mainnav-sm">

            <!-- BACKGROUND IMAGE -->
            <!--===================================================-->
            <div style="background-image: url(<?php echo URL; ?>libs/index/images/contact-bg.jpg)"  id="bg-overlay" class="bg-img img-balloon"></div>
            <!-- HEADER -->
            <!--===================================================-->
            <div class="cls-header cls-header-lg">
                <div class="cls-brand">
                    <a class="box-inline" href="<?php echo URL; ?>">
                        <!--<img alt="Finale" src="<?php echo URL; ?>libs/index/images/logo.png" class="brand-icon">-->
                    </a>
                    <span class="brand-title"><span class="" href="#home" style="font-family: 'RissaTypeface';font-size: 2em; color: #fff; ">Time Table</span> </span> 
                </div>
            </div>
            <!-- LOCK SCREEN -->
            <!--===================================================-->
            <div class="cls-content">
                <div class="cls-content-sm panel widget">
                    <div class="widget-header bg-primary">
                        <!--<h4 class="text-thin">John Doe</h4>-->

                    </div>
                    <div class="widget-body">
                        <img alt="Profile Picture" class="widget-img img-circle img-border-light" src="<?php echo URL; ?>libs/nifty/av1.png">
                        <!--<p>Please enter your OTP to login!</p>-->
                        <!--<form  action="<?php // echo URL . "dataprocessing/login/request"      ?>" method="post" enctype="multipart/form-data">-->
                        <form  action="#" method="post"  >

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <input class="form-control fname" required="" name="fname" placeholder="First Name" type="text" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <input class="form-control lname" required="" name="lname" placeholder="Last Name" type="text" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <input class="form-control matric" required="" name="matric" placeholder="Matric No" type="text" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <input class="form-control uname" required="" name="username" placeholder="Username" type="text" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <select name="department_id" class="form-control department_id" id="department_id">
                                            <option>Select Department</option>
                                            <?php
                                            foreach ($departments as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group" id="class">
                                    <div class="input-group-addon"><i class="icon user"></i></div>
                                    <!-- <select name="class_id" class="form-control class_id">
                                            <option>Select Class</option>
                                            <?php
                                            $classes = get_classes_by_department(1);
                                            foreach ($classes as $row) {
                                                ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo get_classname_from_id($row['classname_id']); ?>
                                                </option>
                                            <?php } ?>
                                        </select> -->
                                </div>
                            </div>
<!--                                <input type="text" class="form-control uname" placeholder="User ID" autofocus>
                        <input type="password" class="form-control pwd" placeholder="Password">-->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon lock"></i></div>
                                    <input class="form-control pwd" required="" name="password" placeholder="Password" type="password">
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button class="btn btn-block blue ui button text-uppercase btn-login"  style="background: #458FD2; color: #fff;"  type="">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="pad-ver">
                    <div class="pad-ver"> 
                        You have an account? <a  class="btn btn-primary"href="<?php echo URL; ?>" id="signup_pin_">Sign In</a>
                    </div>
                </div>
                <!--===================================================-->
                <!-- END LOCK SCREEN -->
            </div>
            <!--===================================================-->
            <!-- END OF CONTAINER -->

            <!--===================================================-->
            <!--                 JAVASCRIPT                        -->
            <!--===================================================-->

            <!-- MAIN PLUGIN -->
            <!-- ================================================= -->


            <!-- jQuery Version 2.1.1 -->
            <script src="<?php echo URL; ?>libs/nifty/jquery-2.js"></script>


            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo URL; ?>libs/nifty/bootstrap.js"></script>


            <!-- ================================================= -->

            <!-- ADMIN PLUGIN & DEMO -->
            <!-- ================================================= -->

            <!-- Admin Core -->
            <script src="<?php echo URL; ?>libs/nifty/nifty.js"></script>

            <!-- Demo JavaScript -->
            <script src="<?php echo URL; ?>libs/nifty/bg-images.js"></script>

            <!-- ================================================= -->


            <!-- Placed js at the end of the document so the pages load faster -->
            <script>

                $(function () {
                    function alert(str) {
                        alertify.alert("Info", str);
                    }
                    $(document).on("click", ".btn-loginff", function (e) {

                        console.log();
                        if ($(".uname").val() == "" || $(".pwd").val() == "") {
                            e.preventDefault();
                        } else {
                            param = $(this).serializeArray();
                            alert(param);
                        }
                    });
                });

                $("#department_id").change(function(){
                    var id = $(this).val(); //getting dropdown value
                    // here i want to pass this variable value to php function

                    $.ajax({
                      url: 'http://localhost/pr-timetable/signup/fetchClass',
                      type: 'POST',
                      data: 'department_id='+id,
                      success: function(data) {
                        //you can add the code to show success message
                        $("#class").html(data);

                      },
                      error: function(e) {
                        //called when there is an error
                        //console.log(e.message);
                      }
                    });

                });

                $(document).ready(function () {
                    $(".btn-login").click(function (e) { 
                        e.preventDefault(); 
                        var firstname = $(".fname").val();
                        var lastname = $(".lname").val();
                        var matric_no = $(".matric").val();
                        var department = $(".department_id option:selected").val();
                        var classs = $(".class_id option:selected").val();
                        var user = $(".uname").val();
                        var pass = $(".pwd").val();
                        if (false) {
                            alert("empty")
                        } else {
                            //                    
                            $.post("http://localhost/pr-timetable/signup/create", {fname : firstname, lname:lastname, matric : matric_no, department_id : department, class_id : classs, username : user, password : pass},
                                    function (resp) {
                                        if (resp === "1") {
                                            window.location = "http://localhost/pr-timetable";
                                        } else {
                                            alert("Signup Failed!");
                                        }
                                    });
                        }
                    });
                });
            </script>

            <style>
                .form-signin-heading{
                    font-family: "Ross" !important;
                    font-size: x-large !important;
                }
            </style>

            <!--Core js-->
            <!--<script src="<?php // echo URL;    ?>libs/js/jquery.js"></script>-->

            <script src="<?php echo LIBS; ?>js/alertify.min.js" type="text/javascript"></script>
            <script src="<?php echo URL; ?>libs/bs3/js/bootstrap.min.js"></script>




    </body>

</html>
