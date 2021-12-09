<!--sidebar start-->
<style>
    .alertify .ajs-header {
    margin: -24px -24px 0px;
    padding: 16px 24px;
    background-color: #FFF;
    text-align: center;
    font-weight: bold;
    border-bottom: 2px solid rgba(188, 188, 188, 1);
}
.alertify .ajs-body .ajs-content {
    padding: 16px 24px 16px 16px;
    font-weight: bold;
    text-align: center;
}
.fc-widget-content {
    color: #fff;
}
.form-control {
    border: 1px solid #E2E2E4;
    box-shadow: none;
    /*color: rgb(194, 194, 194);*/
    color: #000;
}
</style>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="<?php if (manager == 'dashboard') echo 'active'; ?>" href="<?php echo URL; ?>dashboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu ">
                    <a class="<?php if (manager == 'student') echo 'active'; ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub ">
                         <li><a href="<?php echo URL; ?>student/add">Add New Student</a></li>
                        <?php
                        $classes = get_classes();
                        foreach ($classes as $row):
                            ?>
                            <li>
                                <a href="<?php echo URL; ?>student/class_list/<?php echo $row['class_id']; ?>">
                                    <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                
                <li>
                    <a class="<?php if (manager == 'staff') echo 'active'; ?>" href="<?php echo URL; ?>staff">
                        <i class="fa fa-dashboard"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a class="<?php if (manager == 'parent') echo 'active'; ?>" href="javascript:;">
                        <i class="fa fa-laptop"></i>
                        <span>Parents</span>
                    </a>
                    <ul class="sub"> 
                           <li><a href="<?php echo URL; ?>parents/newparent">Register New Parent</a></li>
                        <?php
                        $classes = get_classes();
                        foreach ($classes as $row):
                            ?>
                            <li>
                                <a href="<?php echo URL . "parents/parent_home/" . $row['class_id']; ?>">
                                    <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li> 

                <li>
                    <a class="<?php if (manager == 'class') echo 'active'; ?>" href="<?php echo URL; ?>allclass/">
                        <i class="fa fa-th"></i>
                        <span>Class </span>
                    </a>
                    <!--                    <ul class="sub">
                                            <li><a href="<?php echo URL; ?>allclass/">Class List</a></li>
                                            <li><a href="responsive_table.html">Class Routine </a></li>
                                        </ul>-->
                </li>



            <li class="sub-menu ">
                <a href="<?php echo URL; ?>routine" class="<?php if (manager == 'routine') echo 'active'; ?>">
                        <i class="fa fa-laptop"></i>
                        <span>Timetable</span>
                    </a>
                    <!--                    <ul class="sub">
                                            <li><a href="<?php echo URL; ?>routine/timerange">Create Time Range</a></li>
                                            <li><a href="<?php echo URL; ?>routine/timerange">Create Time Range</a></li>
                    <?php
                    $classes = get_classes();
                    foreach ($classes as $row):
                        ?>
                                                    <li>
                                                        <a href="<?php echo URL; ?>routine/view/<?php echo $row['class_id']; ?>">
                                                            <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                                                        </a>
                                                    </li>
                    <?php endforeach; ?> 
                                        </ul>-->
                </li>

<!--                <li class="sub-menu <?php if (manager == 'subject') echo 'active'; ?>">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Subjects</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>subject/add">Add New Subject</a></li>
                        <li><a href="<?php echo URL; ?>subject">Primary 1</a></li>
                        <li><a href="<?php echo URL; ?>subject">Primary 2</a></li>

                    </ul>
                </li>-->
                     <li class="sub-menu " >
                         <a href="javascript:;" class="<?php if (manager === 'subject') echo 'active'; ?>">
                        <i class="fa fa-tasks"></i>
                        <span>Subjects</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>subject/add">Add New Subject</a></li>
                                  <?php
                        $classes = get_classes();
                        foreach ($classes as $row):
                            ?>
                            <li>
                                <a href="<?php echo URL . "subject/subject_by_class/" . $row['class_id']; ?>">
                                    <i class="entypo-dot"></i>Class <?php echo $row['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
<!--                        <li><a href="<?php echo URL; ?>subject/subject_by_class/1">Primary 1</a></li>
                        <li><a href="<?php echo URL; ?>subject/subject_by_class/2">Primary 2</a></li>-->

                    </ul>
                </li>
                
                <li class="sub-menu ">
                    <a href="javascript:;"class="<?php if (manager == 'exam') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Examination </span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>exam">Exam List</a></li>
                        <li><a href="<?php echo URL; ?>exam/grade">Grades</a></li>
                        <li><a href="<?php echo URL; ?>exam/mark">Marks</a></li>
                        <li><a href="<?php echo URL; ?>exam/pre">Result Archive</a></li>
                    </ul>
                </li>
<!--                <li class="sub-menu <?php if (manager == 'attendance') echo 'active'; ?>">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Attendance </span>
                    </a>
                    <ul class="sub"> 
                        <li><a href="<?php echo URL; ?>attendance">view</a></li>
                        <li><a href="<?php echo URL; ?>attendance/manage">Manage</a></li>
                    </ul>
                </li>-->

                
                     <li class="sub-menu ">
                         <a href="javascript:;" class="<?php if (manager == 'attendance') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Attendance </span>
                    </a>
                    <ul class="sub"> 
                        <li><a href="<?php echo URL; ?>attendance/today">Mark Attendance</a></li>
                        <li><a href="<?php echo URL; ?>attendance">view</a></li>
                        <!--<li><a href="<?php echo URL; ?>attendance/manage">Manage</a></li>-->
                    </ul>
                </li>
                <li class="sub-menu ">
                    <a href="javascript:;" class="<?php if (manager == 'library') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Library </span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>library/add">Add book</a></li>
                        <li><a href="<?php echo URL; ?>library/">view</a></li>
                    </ul>
                </li>
                <li class="sub-menu ">
                    <a href="javascript:;" class="<?php if (manager == 'payment') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Payment </span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>payment">School Fees</a></li>
                        <li><a href="<?php echo URL; ?>payment/newpayment">New Payment</a></li>
                        <li><a href="<?php echo URL; ?>payment/paymenthistory">Payment History</a></li>
                    </ul>
                </li>


                <li class="sub-menu ">
                    <a href="javascript:;" class="<?php if (manager == 'message') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Message</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>message/">Inbox</a></li>
                        <li><a href="<?php echo URL; ?>message/outbox">Outbox</a></li>
                        <li><a href="<?php echo URL; ?>message/compose">Compose Mail</a></li>
                        <!--<li><a href="<?php echo URL; ?>Message/read">View Mail</a></li>-->
                    </ul>
                </li>
                <li>
                    <a class="<?php if (manager == 'transport') echo 'active'; ?>" href="<?php echo URL; ?>transport">
                        <i class="fa fa-dashboard"></i>
                        <span>Transport</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if (manager == 'dormitory') echo 'active'; ?>" href="<?php echo URL; ?>dormitory">
                        <i class="fa fa-dashboard"></i>
                        <span>Dormitory</span>
                    </a>
                </li>
                <li>
                    <a class="<?php if (manager == 'noticeboard') echo 'active'; ?>" href="<?php echo URL; ?>noticeboard">
                        <i class="fa fa-dashboard"></i>
                        <span>Noticeboard</span>
                    </a>
                </li>
                <li class="sub-menu ">
                    <a href="javascript:;" class="<?php if (manager == 'account') echo 'active'; ?>">
                        <i class="fa fa-envelope"></i>
                        <span>Account</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo URL; ?>account">Expenses</a></li>
                         
                    </ul>
                </li>
           
                <li>
                    <a class="<?php if (manager == 'settings') echo 'active'; ?>" href="<?php echo URL; ?>settings">
                        <i class="fa fa-dashboard"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>          
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<!--sidebar end-->
<section id="main-content">
    <section class="wrapper">
        <style>
            .btn-group, .btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    margin-bottom: 15px;
 
}
        </style>