
<?php
$teacher_id = get_teacher_id_from_name($this->teacher);
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
            <img class="img-responsive " src="<?php echo get_image_url('teacher', $row['id']); ?>" alt="Image">
        </div>
        <div class="panel-media">
            <img src="<?php echo get_image_url('teacher', $row['id']); ?>" class="panel-media-img img-circle img-border-light" alt="Profile Picture">

            <div class="row" >
                <div class="col-lg-7">
                    <h4 class="panel-media-heading"><?php echo $row['name']; ?></h4>
                </div>
                <div class="col-lg-5 text-lg-right">
                    <a href="<?php echo URL . "staff/edit/" . $this->teacher ?>" class="btn btn-sm btn-primary">Edit Profile</a> 
                </div>
            </div>

            <div class="pull-right">
                <!--ffdddddvghdgh-->
            </div>


        </div>
        <div class="panel-body">



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