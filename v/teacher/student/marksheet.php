
<?php
//    print_r($this->mydomainvalue);
//$resultsubject = $this->resultsubject;
//print_r($resultsubject);
//$studentdetails=$this->Skuldetails;
//print_r($studentdetails);
?>   
<style>
    .ReportCard_wrapper{
        width: 100%;
        height: 100%;
        padding: 4px;
    }
    .bn{
        display: none;
    }
    .huhuhu{
        font-weight: bold;
        font-size: 41px;
        text-align: center;
        color: red;
        animation: 1s ease 3s normal none 1 blink;
        margin-bottom: 21px;
    }
    .school_logo_wrap img{
        /*       width: 100%;
               height: 100%;*/
        width: 146px;
        height: 130px;
        border-radius: 50%;
    }
    .principal_sign img{
        /*       width: 100%;
               height: 100%;*/
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    .result-herder {
        border: 1px solid #000;
        padding: 4px;
    }
    .headertext {
        text-align: center;
    }
    .school_name {
        font-weight: bold;
        font-size: 33px;
        text-transform: uppercase;
    }
    .address {
        font-weight: bold;
        font-size: 14px;
        text-transform: uppercase;
    }
    .phone {
        font-weight: bold;
        font-size: 12px;
        text-transform: uppercase;
    }
    .moto {
        margin-top: 12px;
        font-weight: bold;
        font-size: 12px;
        text-transform: uppercase;
    }
    .headerimage {
        text-align: center;
    }
    .report_title {
        text-align: center;
        border: 1px solid #000;
        font-weight: bold;
        font-size: 24px;
        text-transform: uppercase;
        margin-left: auto;
        margin-right: auto;
        width: 87%;
    }
    .text_bold {
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        line-height: 24px;
        font-size: 11px;
    }
    .report_sketch_head {
        text-align: center;
        border: 1px solid #000;
        font-weight: bold;
        margin-bottom: 2px;
        margin-top: 2px;
        padding: 4px;
    }
    .report_sketch_body {
        /*height: 200px;*/
        background: blue;
    }
    .affect_domain {
        text-align: center;
        border: 1px solid #000;
        margin-top: 3px;
        text-transform: uppercase;
        /*font-weight: bold;*/
    }
    .affect_domain_body {
        text-align: center;
        border-top: 1px solid #000;
        margin-left: auto;
        margin-right: auto;
        height: 192px;
    }
    .rr {
        float: right;
    }
    .yuyu {
        height: 163px;
        font-size: 12px;
        border-right: 1px solid #000;
        padding-top: 12px;
    }
    .yuyu2 {
        height: 75px;
        font-size: 12px;
        /*border-right: 1px solid #000;*/
    }
    .nextbegin {
        margin-top: 6px;
        font-weight: bold;
        font-size: 12px;
    }
    .report_commentss {
        margin-top: 9px;

    }
    .uiouiuiu {
        border-bottom: 1px solid #000;
        text-indent: 12px;
        margin-bottom: 10px;
        word-wrap: break-word;
    }
    .nnn {
        font-weight: bold;

    }
    .result_footer {
        /*text-align: center;*/

    }
    .date_printed {
        font-weight: bold;
        padding-top: 48px;
    }
    .principal_sign {
        text-align: center;
    }
    .affect_domain_head {
        font-weight: bold;
    }
    .result_table {
        border:1px solid #000;
        margin-top: 12px;
        margin-bottom: 7px;
    }
    .downlist {
        text-align: left;
        line-height: 42px;
    }
</style>
<?php
if (isset($this->resultsubject) || isset($this->studentdetails) || isset($this->Skuldetails)) {
    $studentdetails = $this->studentdetails;
    $resultsubject = $this->resultsubject;
    $Skuldetails = $this->Skuldetails;
    $mydomainvalue = $this->mydomainvalue;
//print_r($Skuldetails);
    ?>

    <div class="ReportCard_wrapper printreport">
        <!--    <div style="width:300px; position: relative; margin-left: auto;margin-right: auto; margin-top: 50px; overflow-y: auto;" id="preview" class="cart">-->

        <!--<div style="width: 100%; position: relative; margin-left: auto;margin-right: auto; margin-top: 20px;">-->
        <div class="result-herder" style="">
            <div class="row">
                <div class="col-sm-3 school_logo_wrap headerimage">
                    <?php
                    $pix_link = URL . "data/" . $Skuldetails[8]["description"];
                    ?>
                    <img class="school_logo" src="<?php
                    if ($Skuldetails[8]["description"] != "") {
                        echo file_get_contents($pix_link);
                    }
                    ?>">

                </div>   

                <div class="col-sm-9 headertext">
                    <div class="school_name">
                        <?php
                        echo decrypt($Skuldetails[1]['description']);
                        ?>
                    </div>
                    <div class="address">
                        <?php
                        echo decrypt($Skuldetails[2]['description']);
                        ?>
                    </div>
                    <div class="phone">
                        <?php
                        echo decrypt($Skuldetails[3]['description']);
                        ?>
                    </div>
                    <div class="row email">
                        <div class="col-sm-6">
                            E-mail :                                  <?php
                            echo $Skuldetails[4]['description'];
                            ?>
                        </div>
                        <div class="col-sm-6">
                            Website :   <?php
                            echo $Skuldetails[7]['description'];
                            ?>
                        </div>

                    </div>
                    <div class="moto">
                        moto:   <?php
                        echo $Skuldetails[6]['description'];
                        ?>
                    </div>



                </div>
            </div>


        </div>
        <?php
//                          print_r($resultsubject);
//    echo count($resultsubject);
        if (count($resultsubject) > 0) {
            ?>

            <div>
                <div class="report_title">
                    student progressive report  for       <?php
                    if (isset($resultsubject)) {
                        echo $resultsubject[0]['term_id'];
                    }
                    ?>,        <?php
                    echo $resultsubject[0]['session_id'];
                    ?> session 
                </div>
                <div class="row text_bold">
                    <div class="col-sm-6 std_class">
                        <div class="col-sm-4">
                            class:
                        </div>
                        <div class="col-sm-8">
                            <?php
                            echo $studentdetails[0]['class_id'] . "  (" . $studentdetails[0]['class_sub_id'] . ")";
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 class_population" >
                        <div class="col-sm-4">
                            no . in class
                        </div>
                        <div class="col-sm-8">
                            <?php
                            echo $studentdetails[0]['no_in_class'];
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 std_name">
                        <div class="col-sm-4">
                            name:
                        </div>
                        <div class="col-sm-8">
                            <?php
                            echo $studentdetails[0]['name'];
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 std_admin_no">
                        <div class="col-sm-4">
                            admission no.:
                        </div>
                        <div class="col-sm-8 addremin">
                            <?php
                            echo $studentdetails[0]['admission_no'];
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <?php
                            echo $studentdetails[0]['address'];
                            ?>
                        </div>
                        <div class="col-sm-6">
                            Overall Best In The Class:                          <?php
                            echo "(" . $studentdetails[0]['beststudent'] . ")";
                            ?>
                        </div>

                    </div>
                </div>  
            </div>
            <!--<div >-->
            <div class="report_sketch">
                <div class="report_sketch_head">
                    <span style="text-transform: uppercase">
                        Cognitive domain 
                    </span><span>Performance In Subject</span>
                </div>
                <div class="report_sketch_body" style="background-color:  black;">
                    <section class="panel">

                        <div class="panel-body">
                            <div class="chartJS">
                                <canvas id="bar-chart-js" height="250" width="900" ></canvas>


                            </div>



                        </div>
                        <div class="bn">
                            <img class="progressive" src="">
                        </div>
                    </section>




                </div>
            </div>
            <!--</div>-->
            <div class="result_table" style="">

                <div class="table table-hover table-responsive " id="tabletop">          
                    <table class="table poll">
                        <thead>
                            <tr>
                                <th>subject</th>
                                <th>Test (30)</th>
                                <th>Exam(70)</th>
                                <th>Total(100)</th>
                                <th>1st Term Score</th>
                                <th>2nd Term Score</th>
                                <th>3rd Term Score</th>
                                <th>Annual Score</th>
                                <th>position in class</th>
                                <th>overall position</th>
                                <th>grade</th>
                                <th>remark</th>

                            </tr>
                        </thead>
                        <tbody class="table_body markbody">
                            <?php
                            foreach ($this->resultsubject as $row) {
                                ?>

                                <tr>
                                    <td><?php echo $row['subject_id']; ?></td>
                                    <td><?php echo $row['test_score']; ?></td>
                                    <td><?php echo $row['exam_score']; ?></td>
                                    <td><?php echo $row['mark_total']; ?></td>
                                    <td><?php echo $row['first_term_score']; ?></td>
                                    <td><?php echo $row['second_term_score']; ?></td>
                                    <td><?php echo $row['Third_term_score']; ?></td>
                                    <td><?php echo $row['annual_score']; ?></td>
                                    <td><?php echo $row['position_sub_class']; ?></td>
                                    <td><?php echo $row['position_in_overall_class']; ?></td>
                                    <td><?php echo $row['grade']; ?></td>
                                    <td><?php echo $row['comment']; ?></td>

                                </tr>  

                                <?php
                            }
                            ?>




                        </tbody>
                    </table>


                </div>

            </div>

            <div class="showmenow">
                <div class="affect_domain">
                    <div class="affect_domain_head">
                        affective domain
                    </div>
                    <div class="affect_domain_body row">
                        <div class="col-sm-4" style="border-right: 1px solid #000;">
                            <div style="border-bottom: 1px solid #000;font-weight: bold;">
                                punctuality and regularity  
                            </div>

                            <div class="downlist">
                                <div>
                                    <span>
                                        Time School Open
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_open'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Present
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_present'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Absent
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_absent'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Late
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_late'];
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8" >
                            <div style="border-bottom: 1px solid #000; font-weight: bold;">
                                psychomotor skills
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">punctuality</option>

                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['punctuality']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">neatness</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['neatness']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">leadership</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['leadership']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>


                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">demeanour</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['demeanour']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">honesty</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['honesty']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div> 
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">respect  </option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['respect']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>
                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div> 
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">mixing </option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['mixing']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>
                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">obedient</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['obedient']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div> 
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">library</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['library']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>
                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>  
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">sporting </option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['sporting']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div> 
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">cultural </option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['cultural']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>
                                        </select>
                                        <!--</div>-->
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-top: 19px;">
                                <div>  
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">tecnical </option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['tecnical']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>
                                        </select>
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div>    
                                    <div>
                                        <!--<div class="col-sm-5">-->
                                        <select name="" class="form-control affective_domain" style="margin-bottom: 2px;">
                                            <option value=""selected="true" disabled="true">club_society</option>
                                            <?php foreach ($this->domainvalue as $row) {
                                                ?>

                                                <option value="<?php echo $row["value"] ?>" <?php
                                                if ($row["value"] === $mydomainvalue[0]['club_society']) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $row["value"] ?></option>
                                                    <?php } ?>

                                        </select>
                                        <!--</div>-->
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="nextbegin">
                    <span class="">
                        Next Term Begins :
                    </span>
                    <span class="">
                        <?php
                        if ($Skuldetails[9]["description"] != "") {
                            echo $Skuldetails[9]["description"];
                        }
                        ?>
                    </span>
                </div>
                <div class="row report_commentss">
                    <!--<div></div>-->
                    <div class="col-sm-4 nnn">
                        Class Teachers's Comment:
                    </div>
                    <!--        <div class="col-sm-8 uiouiuiu">
                                commentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcomment
                            </div>-->
                    <div class="col-lg-8" style="margin-bottom: 15px;">
                        <div class="col-sm-10">
                            <input type="text" class="form-control classteachercomment" placeholder="class teacher comment" value="<?php
                            if (isset($mydomainvalue[0]['teacher_comment'])) {

                                echo $mydomainvalue[0]['teacher_comment'];
                            }
                            ?>">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary saveteacher" type="button">SAVE</button>
                        </div>
                    </div>
                    <div class="col-sm-4 nnn">
                        Principal's Comment :
                    </div>
                    <!--        <div class="col-sm-8 uiouiuiu">
                                  commentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcomment
                            </div>-->
                    <div class="col-lg-8">
                        <div class="col-sm-10">
                            <input type="text" class="form-control principal_comment" placeholder="principal Comment" value="<?php
                            if (isset($mydomainvalue[0]['principal_comment'])) {
                                
                            } echo $mydomainvalue[0]['principal_comment']
                            ?>">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary saveprincipal" type="button">SAVE</button>
                        </div>


                    </div>
                </div>
            </div>

            <div class="showmelater">
                <div class="affect_domain">
                    <div class="affect_domain_head">
                        affective domain
                    </div>
                    <div class="affect_domain_body row">
                        <div class="col-sm-4" style="border-right: 1px solid #000;">
                            <div style="border-bottom: 1px solid #000;font-weight: bold;">
                                punctuality and regularity  
                            </div>

                            <div class="downlist">
                                <div>
                                    <span>
                                        Time School Open
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_open'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Present
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_present'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Absent
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_absent'];
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Time Late
                                    </span>
                                    <span class="rr">
                                        <?php
                                        echo $mydomainvalue[0]['time_late'];
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8" >
                            <div style="border-bottom: 1px solid #000; font-weight: bold;">
                                psychomotor skills
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div>
                                    <span>
                                        punctuality
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['punctuality'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Neatness
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['neatness'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Leadership
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['leadership'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Demeanour 
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['demeanour'];
                                        }
                                        ?>
                                    </span>

                                </div>
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div>
                                    <span>
                                        Honesty
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['honesty'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Respect
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['respect'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Mixing
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['mixing'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Obedient
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['obedient'];
                                        }
                                        ?>
                                    </span>

                                </div>
                            </div>
                            <div class="col-sm-3 yuyu">
                                <div>
                                    <span>
                                        Library
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['library'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Sporting
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['sporting'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Cultural
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['cultural'];
                                        }
                                        ?>
                                    </span>


                                </div>
                            </div>
                            <div class="col-sm-3 yuyu" >
                                <div>
                                    <span>
                                        Technical
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['tecnical'];
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <span>
                                        Club Society
                                    </span>
                                    <span class="rr">
                                        <?php
                                        if (isset($mydomainvalue)) {
                                            echo $mydomainvalue[0]['club_society'];
                                        }
                                        ?>
                                    </span>


                                </div>
                            </div>
                        </div>




                    </div>
                </div>
                <div class="nextbegin">
                    <span class="">
                        Next Term Begins :
                    </span>
                    <span class="">
                        Monday, 11th January 2017
                    </span>
                </div>
                <div class="row report_commentss">
                    <!--<div></div>-->
                    <div class="col-sm-4 nnn">
                        Class Teachers's Comment:
                    </div>
                    <div class="col-sm-8 uiouiuiu">
                        <?php
                        if (isset($mydomainvalue[0]['principal_comment'])) {
                            
                        } echo $mydomainvalue[0]['teacher_comment']
                        ?>
                    </div>
                    <!--        <div class="col-sm-4 nnn">
                                Principal's Comment :
                            </div>
                            <div class="col-sm-8 uiouiuiu">
                                  commentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcomment
                            </div>-->
                </div>
                <div class="row report_commentss">
                    <!--<div></div>-->
                    <!--        <div class="col-sm-4 nnn">
                                Class Teachers's Comment:
                            </div>
                            <div class="col-sm-8 uiouiuiu">
                                commentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcommentcomment
                            </div>-->
                    <div class="col-sm-4 nnn">
                        Principal's Comment :
                    </div>
                    <div class="col-sm-8 uiouiuiu">
                        <?php
                        if (isset($mydomainvalue[0]['principal_comment'])) {
                            
                        } echo $mydomainvalue[0]['principal_comment']
                        ?>
                    </div>
                </div>
            </div>
            <div class="result_footer row">
                <div class="principal_sign col-sm-6">
                    <img class="sign_logo" src="<?php echo URL; ?>public/images/logo-n.png">

                </div>
                <div class="date_printed col-sm-6">
                    Thursday , 10th December 2017
                </div>
            </div>
            <div class="row print_receipts">
                <div class="col-sm-4 ">
                    <button class="btn btn-primary printreot" type="button">print Report Card</button>
                </div>
                <?php
                if ($resultsubject[0]['term_id'] === "Third Term") {
//                                             echo $resultsubject[0]['term_id'];
                    ?>
                    <div class="col-sm-4">
                        <button class="btn btn-success " onclick="   jQuery('#Promote_modal').modal('show', {backdrop: 'true'});" type="button">Promote Student</button>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-danger" type="button">Repeat Student</button>
                    </div>
                    <?php
                }
                ?>

            </div>

            <?php
        } else {
            ?>
            <?php
            echo '<div class="huhuhu">This Result Is Not Ready</div>';
        }
        ?> 

        <?php
//   print_r($mydomainvalue);
        ?>

    </div> 
    <!--Profile  Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="Promote_modal" class="modal fade" style="top: 89px;">
        <div class="modal-dialog">
            <div class="modal-content" style="background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.82);">
                <div class="modal-header" style="text-align: center;
                     font-weight: bold;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Promote Student</h4>
                </div>
                <!--<div class="modal-body"  style="height:400px; overflow:auto;">-->
                <div class="modal-body"  style="height:230px; overflow:auto;">
                    <!--<div class="row">-->

                    <!--<div class="col-md-12">-->
                    <div class="form-group">
                        <label class="col-lg-4 control-label " style="color: #FFF;
                               font-weight: bold;
                               font-size: 16px;">Current Class:</label>
                        <div class="col-lg-8">
                            <select name="class_id" class="form-control current_class">
                                <option value="" class=""> Select New Class</option>
                                <!--disabled=""--> 
                                <?php
                                foreach ($this->allclass as $class) {
                                    ?>
                                    <option value="<?php echo $class["class_id"]; ?>" <?php
                                    if ($class["name"] === $studentdetails[0]['class_id']) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $class["name"]; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <!--</div>-->
                    <!--<div class="col-md-12">-->
                    <div class="form-group">
                        <label class="col-lg-4 control-label "style="color: #FFF;
                               font-weight: bold;
                               font-size: 16px;">Current Sub Class:</label>
                        <div class="col-lg-8">
                            <select name="class_id" class="form-control current_sub">
                                <option > Select Sub Class</option>

                                <?php
                                foreach ($this->my_subclass as $class) {
                                    ?>
                                    <option value="<?php echo $class["id"]; ?>" <?php
                                    if ($class["sub_classname"] === $studentdetails[0]['class_sub_id']) {
                                        echo "selected";
                                    }
                                    ?>><?php echo $class["sub_classname"]; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>

                    </div>
                    <div style="text-align: center;margin-top: 16px;">
                        <button style="margin-top: 23px;" class="btn btn-primary print_receipts promotestudentnow" type="button">Promote Now !!!</button>  
                    </div>

                    <!--</div>-->

                    <!--</div>-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> 
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <!--Profile  Modal -->
    </div>
    <?php
}
?>



<script src="<?php echo LIBS; ?>js/jQuery.print.js" type="text/javascript"></script>

<!--///-->
<script src="<?php echo URL; ?>libs/js/chart-js/Chart.js"></script>
<script src="<?php echo URL; ?>libs/js/chartjs.init.js"></script>



<script>
                            var myadmision_id = "<?php echo $studentdetails[0]['id']; ?>";
// $(document).ready(function (){
//   function promote_student() {
// 
//        jQuery('#Promote_modal').modal('show', {backdrop: 'true'});
//       
//        }
// })
                            $(".showmelater").hide();
                            var barChartData = {

                            labels : [
<?php
foreach ($this->resultsubject as $row) {
    $fr = $row['subject_id'];
    ?>
    <?php echo "'" . $fr . "'"; ?>,
    <?php
}
?>

                            ],
                                    datasets : [
                                    {
                                    fillColor : "#E67A77",
                                            strokeColor : "#E67A77",
                                            data : [
<?php
foreach ($this->resultsubject as $row) {
    $fr = $row['highest_score'];
    ?>
    <?php echo "'" . $fr . "'"; ?>,
    <?php
}
?>
                                            ]
                                    },
                                    {
                                    fillColor : "#79D1CF",
                                            strokeColor : "#79D1CF",
                                            data : [
<?php
foreach ($this->resultsubject as $row) {
    $fr = $row['mark_total'];
    ?>
    <?php echo "'" . $fr . "'"; ?>,
    <?php
}
?>
                                            ]
                                    }
                                    ]


                            }

                            var myLine = new Chart(document.getElementById("bar-chart-js").getContext("2d")).Bar(barChartData);
                            console.log(barChartData)
                                    function pr() {
                                    $(".printreport").css({
                                    "width": "100%",
                                            "height": "100%"
                                    });
                                    $(".printreport").print({
                                    //Use Global styles
                                    globalStyles: false,
                                            //Add link with attrbute media=print
                                            mediaPrint: false,
                                            //Custom stylesheet
                                            stylesheet: "http://localhost/attendance/v/admin/student/marksheetstyle.css",
//                    /opt/lampp/htdocs/school/v/admin/student/marksheetstyle.css
                                            //Print in a hidden iframe
                                            iframe: true,
                                            //Don't print this
                                            noPrintSelector: ".print_receipts",
                                            //Add this at top
                                            prepend: "",
                                            //Add this on bottom
                                            append: ""
                                    });
//               alertify.alert("Success!");
                                    $(".showmelater").hide();
                                    alertify.alert('done', function(){ alertify.success('Ok')
//  location.reload();
                                    }

                                    )
                                    }

                            $(document).on("click", ".printreot", function () {
                            var canvas = document.getElementById('bar-chart-js'),
                                    context = canvas.getContext('2d'),
                                    dataUrl = canvas.toDataURL();
//          alert(dataUrl)
                            $(".progressive").attr("src", dataUrl);
                            $(".chartJS").css({"display": "none"});
                            $(".showmenow").css({"display": "none"});
                            $(".showmelater").css({"display": "block"});
                            pr();
                            })
//    })
                                    ///////////////////////////////////////////////////////////////
//    $(document).ready(function (){

                                    $(document).on("change", ".affective_domain", function () {
                            var studentid = $(".addremin").text().trim();
//alert(studentid)
                            var value = $(this).find(":selected").val();
//        var fields = $(this).find('option:first').val();
                            var fields = $($(this).children()[0]).text().trim();
                            $.post("http://localhost/attendance/exam/update_affective", {
                            fields: fields,
                                    studentid: studentid,
                                    value: value
                            },
                                    function (r) {

                                    });
                            })
                                    $(document).on("change", ".current_class", function () {
                            var current_class = $('.current_class').find(":selected").val();
// alert(current_class)
                            $.post("http://localhost/attendance/exam/get_subclass", {
                            current_class: current_class
                            },
                                    function (r) {
//           alert(r)

                                    var result = JSON.parse(r);
                                    //                alert(result)
                                    if (result.length === 0) {
                                    $(".current_sub").empty();
                                    $(".class_subject_").append("   <option value='' disabled='' class=''>Select Sub Class</option>");
                                    }
                                    else {
                                    $(".current_sub").empty();
                                    $(".current_sub").append("<option value='' disabled='' class=''> Select Sub Class</option> ");
                                    $.each(result, function (res, res) {

                                    var name = res.sub_classname;
                                    var id = res.id;
//                           alert(subject)
                                    var opt = ' <option value="' + id + '">' + name + '</option>';
                                    $(".current_sub").append(opt);
                                    });
                                    }

                                    });
                            })

                                    $(document).on("click", ".promotestudentnow", function () {


                            var my_new_class = $(".current_class").find(":selected").val();
                            var my_new_sub_class = $(".current_sub").find(":selected").val();
// alert(my_new_class)
// alert(my_new_sub_class)
// alert(myadmision_id)

                            alertify.confirm("SYSTEM INFORMATION", 'ARE YOU SURE YOU WANT TO PROCEED !!!  \n  Note:Action Can Not Be Reverted', function(){ alertify.success('Ok')
                                    $.post("http://localhost/attendance/exam/update_class", {
                                    myadmision_id: myadmision_id,
                                            my_new_class: my_new_class,
                                            my_new_sub_class: my_new_sub_class
                                    },
                                            function (r) {
//           alert(r)

                                            if (r === ""){
                                            location.reload();
                                            }
                                            else{
                                            alertify.alert("Error Occure")
                                            }
                                            });
                            },
                                    function(){ alertify.error('Cancel')

                                    }
                            )



                            })
                                    $(document).on("click", ".saveteacher", function () {

                            var studentid = $(".addremin").text().trim();
                            var value = $(".classteachercomment").val().trim();
                            var fields = "teacher_comment";
                            $.post("http://localhost/attendance/exam/update_affective", {
                            fields: fields,
                                    studentid: studentid,
                                    value: value
                            },
                                    function (r) {
//           alert(r)


                                    });
                            })

                                    $(document).on("click", ".saveprincipal", function () {

                            var studentid = $(".addremin").text().trim();
                            var value = $(".principal_comment").val().trim();
                            var fields = "principal_comment";
                            $.post("http://localhost/attendance/exam/update_affective", {
                            fields: fields,
                                    studentid: studentid,
                                    value: value
                            },
                                    function (r) {
//           alert(r)


                                    });
                            })


//    }) 
</script>