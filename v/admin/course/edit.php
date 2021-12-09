<!--<section class="panel">
    <div class="panel-body">-->
        <div id="wizard">
            <section>


                <?php
                $edit_data = get_class_info($this->class);
                foreach ($edit_data as $row) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title" >
                                        <i class="entypo-plus-circled"></i>
                                        Edit Class
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form action="<?php echo URL; ?>allclass/editClass" method="post" 
                                          class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">

    <!--                    <input type="hidden" name="action"      value="ekattor_form_submit">
    <input type="hidden" name="task"        value="edit_class">-->
                                        <input type="hidden" name="class_id"    value="<?php echo $row['class_id']; ?>">

                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-3 control-label">Name</label>

                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name" data-validate="required" 
                                                       data-message-required="value required" value="<?php echo $row['name']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="field-1" class="col-sm-3 control-label">Numeric Name</label>

                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name_numeric" value="<?php echo $row['name_numeric']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="field-ta" class="col-sm-3 control-label">Teacher</label>

                                            <div class="col-sm-5">
                                                <select name="teacher_id" class="form-control">
                                                    <?php
                                                    $teachers = get_teachers();
                                                    foreach ($teachers as $row2) {
                                                        ?>
                                                        <option value="<?php echo $row2['id']; ?>" 
                                                        <?php if ($row2['id'] == $row['teacher_id']) echo 'selected'; ?>>
                                                        <?php echo $row2['name']; ?>
                                                        </option>
    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-7">
                                                <button type="submit" class="btn btn-lg btn-primary" id="submit-button">Update</button>
                                                <span id="preloader-form"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>




            </section>
        </div>
<!--    </div>
</section>-->








