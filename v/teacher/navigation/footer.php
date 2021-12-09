

</div>
<!--===================================================-->
<!--END OF CONTENT -->


<!-- FOOTER -->
<!--===================================================-->
<footer id="footer">

    <!-- Only visible when the footer is fixed position -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="show-fixed pull-right">
        <ul class="footer-list list-inline">
            <li>
                <p class="text-sm">SEO Proggres</p>
                <div class="progress progress-sm progress-light-base">
                    <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger"></div>
                </div>
            </li>

            <li>
                <p class="text-sm">Online Tutorial</p>
                <div class="progress progress-sm progress-light-base">
                    <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-primary"></div>
                </div>
            </li>
            <li>
                <a href="javascript:void(0)" class="btn btn-sm btn-dark btn-active-success">Checkout</a>
            </li>
        </ul>
    </div>



    <!-- Visible when the footer is static position -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!--<div class="hide-fixed pull-right pad-rgt">Currently v2.0.1</div>-->



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears at a fixed or static position -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <p class="pad-lft">© <?php echo date("Y") ?> //Abbeville@FullstackDevelper</p>



</footer>
<!--===================================================-->
<!-- END OF FOOTER -->



<!-- SCROLL TOP BUTTON -->
<!--===================================================-->
<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
<!--===================================================-->




</div>
<!--===================================================-->
<!-- END OF CONTAINER -->


<!--===================================================-->
<!--                 JAVASCRIPT                        -->
<!--===================================================-->





<!-- MAIN PLUGIN -->
<!-- ================================================= -->




<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL; ?>libs/nifty/bootstrap.js"></script>


<!-- ================================================= -->







<!-- ADMIN PLUGIN & DEMO -->
<!-- ================================================= -->




<!-- Admin Core -->
<script src="<?php echo URL; ?>libs/nifty/nifty.js"></script>

<!-- ================================================= -->

<script src="<?php echo URL; ?>libs/assets/js/alertify.js"></script> 
<script src="<?php echo URL; ?>libs/assets/js/jquery.parallax-1.1.3.js"></script>
<script src="<?php echo URL; ?>libs/assets/js/imagesloaded.js"></script> 
<script src="<?php echo URL; ?>libs/assets/js/wow.min.js"></script>
<script src="<?php echo URL; ?>libs/assets/js/height.js"></script>  
<!--<script src="<?php echo URL; ?>libs/assets/ui/semantic.min.js"></script> -->
<script src="<?php echo URL; ?>libs/assets/js/processing.js"></script>
<script src="<?php echo URL; ?>libs/assets/fullcalendar/fullcalendar.min.js"></script>
<!--<script src="<?php echo URL; ?>libs/assets/ui/processing.js"></script>-->


<script>
    $(function () {
        // init Masonry
        var $grid = $('.post_holder').masonry({
            // options...
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });

//        $('.profile-nav .menu .item')
//                .tab({
//                    // special keyword works same as above
//                    context: 'parent'
//                })
//                ;

        $('#container').addClass("navbar-fixed steps");
    });

//    (function ($) {
//        /* ---------------------------------------------- /*
//         * Preloader
//         /* ---------------------------------------------- */
//
//        $(window).load(function () {
//            $('#status').fadeOut();
//            $('#preloader').delay(300).fadeOut('slow');
//        });
//        /* ---------------------------------------------- /*
//         * Home BG
//         /* ---------------------------------------------- */
//
//        $(".screen-height").height($(window).height());
//        $(window).resize(function () {
//            $(".screen-height").height($(window).height());
//        });
//        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
//            $('#home').css({'background-attachment': 'scroll'});
//        } else {
//            $('#home').parallax('50%', 0.1);
//        }
//
//        $(window).scroll(function () {
//            if ($(this).scrollTop() > 100) {
//                $('.scroll-up').fadeIn();
//            } else {
//                $('.scroll-up').fadeOut();
//            }
//        });
//    })(jQuery);

    $(function () {
        $("select").parent("div").addClass("custo-select");
        $("select").parent("section").addClass("custo-select");
        var alert = function (str) {
            alertify.alert("SYSTEM INFORMATION", str);
        };
      
    });

</script>



<!-- DEFAULT BOOTSTRAP MODAL -->
<!--===================================================-->

<!--<div style="display: none;" class="modal fade" id="upload-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

             Modal header 
             ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Upload Image </h4> 
            </div>


             Modal body 
             ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
            <div class="modal-body">
                <form action="http://localhost/finale/dataprocessing/upload_im/request" method="post"   class="form-horizontal form-groups-bordered " enctype="multipart/form-data"> 

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ui center floated primary button uploadnew" style="cursor: pointer;">
                                Choose File
                                <i class="picture icon"></i>
                            </div>  
                        </div>
                        <div class="col-sm-12">
                            <div class="thumb-small fll display_logo" style="margin-top: 12px;">

                            </div>
                        </div>
                    </div>

                    <h3 class="ui header uploadnew">User Profile</h3>
                    <div class="form-group">

                        <div class="col-md-12">
                            <input type="file" id="files" name="myFile"  class="fileimage gg" style="display: none;"/>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="ui large transparent left icon input form-control">
                                <i class="comment icon"></i>
                                <input placeholder="Add Caption..." class="gnumber" value="" name="Caption" type="text">
                            </div>
                            <textarea type="text" ></textarea>
                        </div>
                    </div>

                    <br>
                    <input type="submit" value="Upload" class="piximage gg" style="display:none">

                </form>
            </div>

             Modal footer 
             ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light proceed" onclick="$('.piximage').trigger('click');">Upload</button> 
            </div>
        </div>
    </div>
</div>-->

<!--===================================================-->
<!-- END OF DEFAULT BOOTSTRAP MODAL -->

</body>
</html>

