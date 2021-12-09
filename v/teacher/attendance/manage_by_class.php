<?php

$viewing_current_class_id=$this->current_class_attendance;
//print_r($viewing_current_class_id);
$att_count=  \count($viewing_current_class_id);
//echo "$att_count";
?>
            <table class="table table-bordered table-striped table-condensed cf">
                <thead class="cf">
   <!--<thead>-->
                   <?php if ($att_count!=0) { ?>
                      
                
                    <tr>
                        <th> #</th>
                         
                        <th>Name</th>
                        <th>Status</th>
                        <th>Change</th>
               
                    </tr>
                     <?php  }?>
                    
                   <?php if ($att_count===0) { ?>
                      
                
                    <tr>
                        <th>NO ATTENDANCE RECORD FOR THIS CLASS ON SELECTED DATE</th>
                         
                       
                    </tr>
                     <?php  }?>
                </thead>
                <tbody>
                   
                    
                   
                   <?php $sn=1; foreach ($viewing_current_class_id as $key => $value) {  ?>
                      
              
                    <tr class="">
                       
                       <td><?php echo $sn;?></td>
                       
                     
                        <td><?php echo $value["student_name"]?></td>
                        <td><?php 
   if ($value["status"]==="0") {
      echo 'Absent';
} elseif ($value["status"]==="1") {
  echo 'Present';
}
                        ?></td>
                        
                        <td>
                          <button  class="btn btn-success btn-xs submit_att_present"  type="button" julesbianchi="<?php echo $value["attendance_id"]?>"><span class="fa fa-square"></span> &nbsp; Present&nbsp;</button>
                          <button  class="btn btn-danger btn-xs submit_att_absent"  type="button" ricardobianchi="<?php echo $value["attendance_id"]?>"><span class="fa fa-times"></span> &nbsp; Absent&nbsp;</button>
                               
                        </td>
                   

                    </tr>
                      <?php $sn++  ; } ?>
                </tbody>
            </table>


          
<script>      
   $(document).on("click", ".submit_att_present", function(e) {
      var curr_att_id =$(this).attr("julesbianchi");
//  alert(curr_att_id);
  if(curr_att_id===""){
       
       return 
     }else{
       
//      return ;
       
      $.post("http://localhost/attendance/attendance/update_att_with_present/", 
                            {
                                "att_id": curr_att_id ,
                             
                          },
                    function(data) {
//                      alert(data);
                        if (data === "1") {
                            alert("Attendance Updated As Present ");
//                            $(".submit_att_present").html("Marked Present")
//                            $(this).attr("dede","llllll"); 
//                            location.reload();
                        }
                        else if(data === 2){
//                           alert("Exam Already exists ");
                        }
                           else{
//                            alert("Error updating Subject");
                            
//                            location.reload()
                        }
                    });
      
      
      
     }
// 

 
});
   $(document).on("click", ".submit_att_absent", function(e) {
      var curr_att_id =$(this).attr("ricardobianchi");
//  alert(curr_att_id);
  if(curr_att_id===""){
       
       return 
     }else{
       
//      return ;
       
      $.post("http://localhost/attendance/attendance/update_att_with_absent/", 
                            {
                                "att_id": curr_att_id ,
                             
                          },
                    function(data) {
//                      alert(data);
                        if (data === "1") {
                            alert("Attendance Updated As Absent ");
//                            $(".submit_att_present").html("Marked Present")
//                            $(this).attr("dede","llllll"); 
//                            location.reload();
                        }
                        else if(data === 2){
//                           alert("Exam Already exists ");
                        }
                           else{
//                            alert("Error updating Subject");
                            
//                            location.reload()
                        }
                    });
      
      
      
     }
// 

 
});
                          </script>