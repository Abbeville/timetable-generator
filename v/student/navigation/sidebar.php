</div>
<!--===================================================-->
<!-- END OF PAGE CONTENT -->


</div>
<!--===================================================-->
<!-- END OF CONTENT CONTAINER -->



<!-- MAIN NAVIGATION -->
<!--===================================================-->

<nav id="mainnav-container" data-sm="mainnav-sm" data-all="mainnav-lg">
    <div id="mainnav">

        <!-- MAIN NAVIGATION : MENU -->
        <!--===================================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano has-scrollbar">
                <div style="right: -15px;" tabindex="0" class="nano-content">
                    <ul id="mainnav-menu" class="list-group">

                        <li>
                            <a  href="<?php echo URL; ?>dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title"><strong>Dashboard</strong> </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo URL; ?>timetable/view/<?php echo $_SESSION['class_id']; ?>"  >
                                <i class="fa fa-check-square-o"></i>
                                <span class="menu-title"><strong>Time Table</strong> </span>
                                <!--<i class="fa arrow"></i>-->
                            </a>
                        </li>
                       
                        <!-- <li>
                            <a   href="<?php echo URL; ?>settings">
                                <i class="fa fa-wrench"></i>
                                <span class="menu-title"><strong>Settings</strong> </span>
                            </a>
                        </li>
 -->
                    </ul>
                </div>
                <div style="display: none;" class="nano-pane"><div style="height: 20px; transform: translate(0px, 0px);" class="nano-slider"></div></div></div>
        </div>
        <!--===================================================-->
        <!-- END OF MAIN NAVIGATION : MENU -->
    </div>
</nav>
<!--===================================================-->
<!-- END OF MAIN NAVIGATION -->

