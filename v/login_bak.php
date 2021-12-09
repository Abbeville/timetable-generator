<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="libs/images/favicon.png">

        <title>Custo School - Login</title>

        <!--Core CSS -->
        <link href="<?php echo URL; ?>libs/bs3/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="<?php echo URL; ?>libs/css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>libs/css/style-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo LIBS; ?>css/alertify.min.css" />
        <script src="<?php echo URL; ?>libs/js/jquery.js"></script>
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]>
        <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

            <form class="form-signin" >
                <h2 class="form-signin-heading">
                    <img src="<?php echo URL; ?>libs/images/logo.png"><br>
                    <!--<img src="<?php echo URL; ?>public/images/logo-n.png"><br>-->
                    
                    
                 Jubilee international Nursery and Primary School.

                </h2>
                <div class="login-wrap">
                    <div class="user-login-info">
                        <input type="text" class="form-control uname" placeholder="User ID" autofocus>
                        <input type="password" class="form-control pwd" placeholder="Password">
                    </div>
                    <label class="checkbox">
                        <!--<input type="checkbox" value="remember-me"> Remember me-->
<!--                        <span class="pull-right">
                            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                        </span>-->
                        <button class="btn btn-lg btn-login btn-block btn-login" type="submit">Sign in</button>
                    </label>


                    <div class="registration">
                        <!--                        Don't have an account yet?
                                                <a class="" href="register.php">
                                                    Create an account
                                                </a>-->
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        </div>

        <!-- Placed js at the end of the document so the pages load faster -->
        <script>

            $(function() {
                function alert(str) {
                    alertify.alert("Info", str);
                }
                $(document).on("click", ".btn-loginff", function(e) {

                    console.log();
                    if ($(".uname").val() == "" || $(".pwd").val() == "") {
                        e.preventDefault();
                    } else {
                        param = $(this).serializeArray();
                        alert(param);
                    }
                });
            });

            $(document).ready(function() {
                $(".btn-login").click(function(e) {
//                    alert("a")
                    e.preventDefault();
//                    window.location = "http://127.0.0.1:8884/news";
                    var username = $(".uname").val();
                    var pass = $(".pwd").val();
                    if (username === "" || pass === "") {
                        alert("empty")
                    }
                    else {
//                    
                        $.post("http://localhost/attendance/loginout/", {username: username, pass: pass},
                        function(resp) {
//                        alert(resp)
                            if (resp === "1") {
                                window.location = "http://localhost/school";
                            } else {
                                alert("Wrong Login!");
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
        <script src="<?php echo URL; ?>libs/js/jquery.js"></script>

        <script src="<?php echo LIBS; ?>js/alertify.min.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>libs/bs3/js/bootstrap.min.js"></script>

    </body>
</html>