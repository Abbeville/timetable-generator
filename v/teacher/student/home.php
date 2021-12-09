<style>
    .count{
        font-weight: bold;
        font-size: 43px;
        padding-top: 27px;
    }
    .widget-h {
        color: #afaebc;
        font-size: 16px;
        text-transform: uppercase;
        margin: 0px 0px 10px 0px;
        text-align: center;
        font-weight: bold;
    }
    .calend {
        margin-left: auto;
        margin-right: auto;
        width: 75%;
    }
    .text-thin{
        text-transform: capitalize;
    }
</style> 

<?php
    /*Get Class by teacher's Id*/
    $teacher_id =  myid();
    $class = getClassByTeacherId($teacher_id);

    if($class != ''){
?>

<div class="panel">
    
    <div class="panel-heading">
        <div class="panel-control">
            <!-- <ul class="pager pager-rounded">
                <li>
                    <a href="<?php echo URL; ?>student/add"><i class="fa fa-plus"></i> Add Student</a>
                </li>
            </ul> -->
        </div>
        <h3 class="panel-title">Students</h3>
    </div>

</div>

<div class="row post_ holder">


    <?php
    


    foreach ($class as $row):
        $students = get_students($row['class_id']);
        ?>
        <div class="col-md-4">
            <!--Registered User-->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="panel media pad-all">
                <a href="<?php echo URL; ?>student/class_list/<?php echo $row['class_id']; ?>">
                    <div class="media-left">
                        <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="fa fa-user fa-2x"></i>
                        </span>
                    </div>
                    <div class="media-body"> 
                        <p class="text-2x mar-no text-thin"><?php echo $row['name']; ?></p>
                        <p class="text-muted mar-no"><?php echo count($students); ?> Students</p>
                    </div>
                </a>
            </div>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        </div> 
    <?php 
        
        endforeach;

        }else{
    ?> 

        <div class="panel">

            <!-- Panel heading -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="panel-heading">
                <div class="panel-control">
                    <!--  -->
                </div>
                <h3 class="panel-title">You have not been assigned to Monitor a class</h3>
            </div>

        </div>
    <?php
        }
    ?> 

</div>
