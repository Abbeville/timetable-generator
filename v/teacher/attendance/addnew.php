<?php
$all_classes=$this->all_classes
?> 
      <div class="panel-body">
                        <form action="#" class="form-horizontal ">

                          
                            <div class="form-group">
                                  <div class="col-md-3 col-xs-11">

                                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                                        <input type="text" readonly="" value="12-02-2012" size="16" class="form-control view_all_class_attendance_date">
                                              <span class="input-group-btn add-on">
                                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                              </span>
                                    </div>
                                    
                                </div>
                                
                               
                                  <div class="col-md-3 col-xs-11">
  <select class="form-control view_all_class_attendance">
     <option disabled="true" selected="true">Select Class</option>
                               <?php 
     foreach ($all_classes as $key => $value) { ?>
     <option value="<?php echo $value["class_id"]?>"><?php echo $value["name"]?></option>
     <?php }?>
                                
                                
                              
                        
                            </select>
                                    
                                </div>
                                  <div class="col-md-3 col-xs-11">
 <button class="btn btn-primary manage_class_attendance" type="button">Manage<i class="fa fa-arrow-right"></i></button>
                                             
                                    
                                </div>
                            </div>
                      
                          

                        </form>
                    </div>
      
      
    <div class="panel-body">
       <section id="flip-scroll" class="display_selected_att">
             
           
        </section>
    </div>
   
  

<script>

      $(document).on("click", ".manage_class_attendance", function(e) {
       $viewing_class_id=$(".view_all_class_attendance").val();
       $viewing_class_id_date=$(".view_all_class_attendance_date").val();
//        alert($viewing_class_id);
//        alert($viewing_class_id_date);
        if($viewing_class_id===null || $viewing_class_id_date==="" || $viewing_class_id_date==="12-02-2012"){
           alert("Invalid Entry");
           return ;
        }
        
  
 $.get("http://localhost/attendance/attendance/view_to_manage/", {headless: true, class_id:$viewing_class_id,viewing_date:$viewing_class_id_date},  function(resp) {
//                alert(resp);
            $('.display_selected_att').html(resp);
        });
 
});
   
</script>
 