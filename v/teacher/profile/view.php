<?php
$teacher_id = myid();
//print_r($student_id);
$profile_data = get_teacher_info($teacher_id);
foreach ($profile_data as $row) {
    ?>
    <style>
        .text-2x.text-muted{
            margin-left: 20px !important;
            font-size: 18px !important;
        }
        .panel-media-heading,.text-muted{
            text-transform: capitalize;
        }

        #profile_banner{
            max-height: 300px;
            max-height: 250px;
            /*                        position: absolute;
                                            content: '.';
                                            width: 100%;
                                            height: 100%;
                                            background: rgba(0,0,0,0.3);
                                            top: 0;*/
        }
        .modal-body{
            padding: 0px;
        }
    </style>

    <div class="panel">
        <div class="panel-bg-cover" id="profile_banner">
            <img class="img-responsive " src="<?php echo get_image_url('student', $row['id']); ?>" alt="Image">
        </div>
        <div class="panel-media">
            <img src="<?php echo get_image_url('student', $row['id']); ?>" class="panel-media-img img-circle img-border-light" alt="Profile Picture">

            <div class="row" >
                <div class="col-lg-7">
                    <h4 class="panel-media-heading"><?php echo $row['name']; ?></h4>
                    <a href="#" class="btn-link">@<?php echo $row['username']; ?></a>
                    <!-- <p class="text-muted mar-btm"> <?php if ($row['class_id'] != ''): ?>
                            <b>
                                <?php
                                $class_name = get_class_name_from_id($row['class_id']);
                                echo $class_name;
                                ?>
                            </b> 
                        <?php endif; ?>
                    </p> -->
                </div>
                <div class="col-lg-5 text-lg-right">
                    <a href="<?php echo URL . "staff/edit/" . $row['username'] ?>" class="btn btn-sm btn-primary">Edit Profile</a> 
                </div>
            </div>

            <div class="pull-right">
                <!--ffdddddvghdgh-->
            </div>


        </div>
        <div class="panel-body">

                                                                    <!--<table class="table table-bordered">-->

            <!-- <?php if ($row['class_id'] != ''): ?>

                <div class="panel mini media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-danger">
                            <i class="fa fa-th-large"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <p class="text-2x mar-no text-thin"> dfg</p>
                        <p class="text-2x text-muted text-thin mar-no">
                            <?php
                            $class_name = get_class_name_from_id($row['class_id']);
                            echo $class_name;
                            ?>
                        </p>
                    </div>
                </div>

            <?php endif; ?> -->

            <!-- <?php if ($row['roll'] != ''): ?> -->
                <!--
                                <div class="panel media pad-all">
                                    <div class="media-left">
                                        <span class="icon-wrap icon-wrap-xs icon-circle bg-primary">
                                            <i class="fa fa-list "></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-thin">Roll</p>
                                        <p class="text-2x text-muted mar-no">
                <?php echo $row['roll']; ?>
                                        </p>
                                    </div>
                                </div>-->

            <!-- <?php endif; ?> -->

            <?php if ($row['birthday'] != ''): ?>

                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-success">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <!--<p class="text-2x mar-no text-thin">Birthday</p>-->
                        <p class="text-2x text-muted mar-no">
                            <?php echo $row['birthday']; ?>
                        </p>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($row['sex'] != ''): ?>

                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-dark">
                            <i class="fa fa-venus-mars"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <!--<p class="text-2x mar-no text-thin">Gender</p>-->
                        <p class="text-2x text-muted mar-no">
                            <?php echo $row['sex']; ?>
                        </p>
                    </div>
                </div>

            <?php endif; ?>


            <?php if ($row['phone'] != ''): ?>

                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-danger">
                            <i class="fa fa-phone"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <!--<p class="text-2x mar-no text-thin">Phone</p>-->
                        <p class="text-2x text-muted mar-no">
                            <?php echo $row['phone']; ?>
                        </p>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($row['email'] != ''): ?>

                <div class="panel media pad-all">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-info">
                            <i class="fa fa-envelope-o "></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <!--<p class="text-2x mar-no text-thin">Email</p>-->
                        <p class="text-2x text-muted mar-no" style="text-transform: lowercase;">
                            <?php echo $row['email']; ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($row['address'] != ''): ?>
                <div class="panel media pad-all">
                    <div class="media-left small">
                        <span class="icon-wrap icon-wrap-xs icon-circle bg-warning">
                            <i class="fa fa-map-marker "></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <!--<p class="text-2x mar-no text-thin">Address</p>-->
                        <p class="text-2x text-muted mar-no">
                            <?php echo $row['address']; ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
            <!--</table>-->
        </div>
    </div>
<?php } ?>
 