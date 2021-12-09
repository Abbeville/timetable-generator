
 

<?php ?> 
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Add Student
        </header>
        <div class="panel-body">
            <div class="" >
                <div class="row">
                    <!--                    <form role="form">
                                            <div class="form-group">
                    
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control round-input round-input" placeholder="ADD SUBJECT" style="text-align: center">
                                                </div>
                    
                                            </div>
                                        </form>-->
                    <form action="" method="post" 
                          class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">

<!--                    <input type="hidden" name="action" value="ekattor_form_submit">
<input type="hidden" name="task" value="add_student">-->

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control round-input" name="name" data-validate="required" 
                                       data-message-required="value required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label">Class</label>

                            <div class="col-sm-7">
                                <select name="class_id" class="form-control round-input">
                                    <option value="12">Primary 12</option>
                                    <option value="1">Primary 1</option>
                                    <option value="2">Primary 2</option>
                                </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="control-label col-md-3">Birth Date</label>
                            <div class="col-md-4 col-xs-11">
                                <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012" class="input-append date dpYears">
                                    <input readonly="" value="12-02-2012" size="16" class="form-control" type="text">
                                    <span class="input-group-btn add-on">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label">Sex</label>

                            <div class="col-sm-7">
                                <select name="sex" class="form-control round-input">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label">Address</label>

                            <div class="col-sm-7">
                                <textarea name="address" class="form-control  html5editor" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Phone</label>

                            <div class="col-sm-7">
                                <input type="text" name="phone" class="form-control round-input" id="field-1" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-7">
                                <input type="email" name="email" class="form-control round-input" id="field-1" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"> Username</label>

                            <div class="col-sm-7">
                                <input type="text" name="username" class="form-control round-input" id="field-1"  data-validate="required" 
                                       data-message-required="value required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Password</label>

                            <div class="col-sm-7">
                                <input type="password" name="password" class="form-control round-input" id="field-1"  data-validate="required" 
                                       data-message-required="value required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Photo</label>

                            <div class="col-sm-7">
                                <input type="file" name="image" class="form-control round-input" >
                            </div>
                        </div>

                        <!--                        <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-7">
                                                        <button type="submit" class="btn btn-info" id="submit-button">Submit</button>
                                                        <span id="preloader-form"></span>
                                                    </div>
                                                </div>-->
                    </form>
                </div>
                <div class="row" >

                    <div class="col-lg-4" style="margin-top: 10px">
                        <button type="submit" class=" col-lg-6 btn btn-info">Submit</button>  </div>

                </div>

            </div>

        </div>
    </section>

</div>  

 



