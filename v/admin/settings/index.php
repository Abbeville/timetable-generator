

<?php
$curr_settings = $this->curr_settings;
$all_sessions = $this->all_sessions;
$all_terms = $this->all_terms;
//print_r($curr_settings);
$c_sess = $curr_settings[4]["description"];
$c_term = $curr_settings[5]["description"];
// echo $c_term;
?> 
<style>
    .mfp-content {
        width: 45%;
        height: 88%;
    }
    .mfp-figure{
        height: 100%;
        width: 100%; 
    }
    .mfp-figure figure {
        margin: 0;
        width: 100%;
        height: 100%;
    }
    img.mfp-img {
        width: 100%;
        max-width: 100%;
        height: 100%;
        display: block;
        line-height: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 40px 0 40px;
        margin: 0 0px;
    }
    .thumb-img {
        border-radius: 2px;
        overflow: hidden;
        width: 100%;
        height: 119px;
    }
    .gg{
        display: none !important;

    }
    .options{
        cursor: pointer;

    }
</style>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-title">
                    SETTINGS
                </div>
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>

                </span>
            </header>
            <div class="panel-body">

                <div id="wizard">


                    <section>
                        <form class="form-horizontal">
                            <!--                     <div class="form-group">
                                                    <label class="col-lg-2 control-label ">Name</label>
                                                    <div class="col-lg-8 ">
                                                       <input type="text" class="form-control submit_settings_name" placeholder="Name" value="<?php
                            if (isset($curr_settings[0]["description"])) {
                                
                            } echo decrypt($curr_settings[0]["description"])
                            ?>">
                                                    </div>
                                                 </div>-->






                        </form>
                    </section>


                    <section>
                        <form class="form-horizontal">


                            <!--                     <div class="form-group">
                                                    <label class="col-lg-2 control-label ">Address</label>
                                                    <div class="col-lg-8">
                                                       <textarea class="form-control submit_settings_address" cols="60" rows="5"><?php
                            if (isset($curr_settings[1]["description"])) {
                                
                            } echo decrypt($curr_settings[1]["description"])
                            ?></textarea>
                                                    </div>
                                                 </div>-->
                        </form>


                    </section>


                    <section>
                        <form class="form-horizontal">


                            <!--                     <div class="form-group">
                                                    <label class="col-lg-2 control-label ">Phone</label>
                                                    <div class="col-lg-8">
                                                       <input type="number" class="form-control submit_settings_phone" placeholder="Phone" value="<?php
                            if (isset($curr_settings[2]["description"])) {
                                
                            } echo decrypt($curr_settings[2]["description"])
                            ?>">
                                                    </div>
                                                 </div>-->


                            <div class="form-group">
                                <label class="col-lg-2 control-label ">School Web site</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control submit_settings_website" placeholder="School Web site" value="<?php
                                    if (isset($curr_settings[7]["description"])) {
                                        
                                    } echo $curr_settings[7]["description"]
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label ">School Motto:</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control submit_settings_motto" placeholder="School Motto" value="<?php
                                    if (isset($curr_settings[6]["description"])) {
                                        
                                    } echo $curr_settings[6]["description"]
                                    ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label ">E mail</label>
                                <div class="col-lg-8">
                                    <input type="email" class="form-control submit_settings_email" placeholder="E mail" value="<?php
                                    if (isset($curr_settings[3]["description"])) {
                                        
                                    } echo $curr_settings[3]["description"]
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label ">Next Term Begins On :</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control submit_settings_next" placeholder="Next Term Begins On" value="<?php
                                    if (isset($curr_settings[9]["description"])) {
                                        
                                    } echo $curr_settings[9]["description"]
                                    ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label ">Current Session</label>
                                <div class="col-lg-8">
                                    <select class="form-control submit_settings_current_session">
                                          <option value="" selected="true" disabled="true">CHOOSE CURRENT SESSION</option>
                                          <?php foreach ($all_sessions as $key => $value) { ?>
                                          <option value="<?php echo $value["id"] ?>" <?php
                                          if ($value["id"] === $c_sess) {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $value["name"] ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Current Term</label>
                        <div class="col-lg-8">
                         <select class="form-control submit_settings_current_term">
                            <option value="" selected="true" disabled="true">CHOOSE CURRENT TERM</option>
                            <?php foreach ($all_terms as $key => $valuet) { ?>
                            <option value="<?php echo $valuet["id"] ?>" <?php
                            if ($valuet["id"] === $c_term) {
                                echo "selected";
                            }
                            ?>  ><?php echo $valuet["name"] ?></option>
                            <?php } ?>

                        </select>

                    </div>
                </div>
                            <!--<div class="fileupload btn btns-info waves-effect waves-light uploadnew" style="text-align: center;">-->
                                                      <!--<span><i class="ion-upload m-r-5 "></i>Choose SChool Image</span>-->

                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center;">
                                    <button class="btn btn-info btn-lg uploadnew" style="margin-left: auto; margin-right: auto;" type="button"title="click to change school logo"> <i class="ion-upload m-r-5 "></i> Choose school Logo</button>
                                </div>
                                <div class="col-md-12" style="width: 15%;">
                                    <input type="file" required="" id="files" name="myFile"  class="fileimage gg"/>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="thumb-small fll display_logo">
                                        <?php
                                        $pix_link = URL . "data/school/" . $curr_settings[8]["description"];
                                        ?>

                                        <img style="width: 40%;border-radius: 50%;" src="<?php
                                        if ($curr_settings[8]["description"] != "") {
                                            echo file_get_contents($pix_link);
                                        }
                                        ?>" alt="Image ALt"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <!--<label class="col-lg- control-label"></label>-->
                                <div class="col-lg-12">

                                    <button class="btn btn-lg btn-primary submit_settings_save" type="button">SAVE</button>

                                </div>
                            </div>
                        </form>
                    </section>


                </div>
            </div>
        </section>

    </div>
</div>









<script>
    var pixTemp;
    var changepix = "false";
    $(document).on("click", ".submit_settings_save", function (e) {
//alert("lll");

//      var settings_name = $(".submit_settings_name").val().trim();
//      var settings_address = $(".submit_settings_address").val().trim();
//      var settings_phone = $(".submit_settings_phone").val().trim();


        var settings_email = $(".submit_settings_email").val().trim();
        var settings_current_session = $(".submit_settings_current_session").val();
        var settings_current_term = $(".submit_settings_current_term").val();
        var submit_settings_website = $(".submit_settings_website").val();
        var submit_settings_motto = $(".submit_settings_motto").val();
        var submit_settings_next = $(".submit_settings_next").val();


//   console.log(settings_name)
//   console.log(settings_address)
//   console.log(settings_phone)
//   console.log(settings_email)
//   console.log(settings_current_session)
//   console.log(settings_current_term)

        if (settings_current_session === null || submit_settings_website === null || submit_settings_motto === null || settings_current_term === null || settings_email === "") {
            alert("incomplete Entry")
            return
        } else {
//       alert("post");



            $.post("http://localhost/attendance/settings/save/",
                    {
//                                "system_name":settings_name,
//                                "address": settings_address ,
//                                "phone": settings_phone ,



                        "system_email": settings_email,
                        "current_session": settings_current_session,
                        "submit_settings_website": submit_settings_website,
                        "submit_settings_motto": submit_settings_motto,
                        "current_current": settings_current_term,
                        "submit_settings_next": submit_settings_next,
                        "pixTemp": pixTemp,
                        "changepix": changepix
                    },
                    function (data) {
//                      alert(data);

                        if (data === "1") {
                            alert("Settings Updated ");
                            location.reload();
                        } else if (data == 2) {

                        } else {
                            alert("Error updating ");

//                            location.reload()
                        }
                    });



        }
// 


    });

    $(document).on("click", ".uploadnew", function () {
        var allowed = "image/jpeg,image/jpg,image/png,image/gif";
        $('.fileimage').trigger('click').change(function () {
            if (this.files && this.files[0]) {
                fileMan = new FileReader();
                fileMan.readAsDataURL(this.files[0]);
                fileMan.onload = function (e) {
                    pixTemp = e.target.result;
                    console.log(pixTemp);
                    fileType = pixTemp.substring(5, pixTemp.indexOf(";"));
                    if (allowed.indexOf(fileType) < 0) {
                        alert(' The File Type You Chose Is Not Supported!\nPlease Select A Valid Image File');
                    } else {
                        changepix = "true";
                        $('.display_logo').empty();
                        $('.display_logo').append('<img style="width: 40%;" class="bannerPreview img-thumbnail" src="' + pixTemp + '">');
//                        alert(pixTemp);
                    }
//                    alert(pixTemp.indexOf(";"));
//                $('.imageTemp').attr('src', pixTemp);
                };
            }
        });

    })

    $('.sd').click(function (e) {
        e.preventDefault();
        var allowed = "image/jpeg,image/jpg,image/png,image/gif";
        $('.fileimage').trigger('click').change(function () {

        });
    });
</script>


