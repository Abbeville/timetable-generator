<?php
$curr_settings = $this->curr_settings;
$all_sessions = $this->all_sessions;
$all_terms = $this->all_terms;
//print_r($curr_settings);
 $c_sess=$curr_settings[4]["description"];
 $c_term=$curr_settings[5]["description"];
// echo $c_term;
// echo $c_sess."hjhghdghghghgh";
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
#container {
    width: 100%;
    height: 100%;
    transition: all 0.3s ease-in-out 0s;
    overflow: hidden;
}
</style>
<div class="row" style="height: auto;">
    <p style="font-size: 26px;
margin-top: 12px;
color: red;margin-right: auto;
margin-left: auto;
width: 71%;">
       NOTE: Changing anything on this page when the term or the session has not come to an end will affect the performance of  this application. 
       <br>
       NOTE: All Student Promotion(s) at Third Term Must be Done before changing anything on this page.      
    </p>
    
<!--    <p>
        if you change either the term or session when is not due will affect the application logic performance 
        please do not proceed if is not due to  change it. 
        
    </p>-->
</div>
<div class="row" style="height: auto;">
    <form class="form-horizontal">
        
             <div class="form-group">
                        <label class="col-lg-4 control-label ">Current Session</label>
                        <div class="col-lg-6">
                           <select class="form-control submit_settings_current_session">
                              <option value="" selected="true" disabled="true">CHOOSE CURRENT SESSION</option>
                         <?php foreach ($all_sessions as $key => $value) { ?>
                              <option value="<?php echo $value["id"]?>" <?php if($value["id"]===$c_sess){echo "selected";}?> ><?php echo $value["name"]?></option>
                          <?php     }?>
                          
                           </select>
                        </div>
                     </div>
        <br/>
        <br/>
        <br/>
                     <div class="form-group">
                        <label class="col-lg-4 control-label">Current Term</label>
                        <div class="col-lg-6">
                           <select class="form-control submit_settings_current_term">
                                <option value="" selected="true" disabled="true">CHOOSE CURRENT TERM</option>
                          <?php foreach ($all_terms as $key => $valuet) { ?>
                              <option value="<?php echo $valuet["id"]?>" <?php if($valuet["id"]===$c_term){echo "selected";}?>  ><?php echo $valuet["name"]?></option>
                          <?php     }?>
                          
                           </select>

                        </div>
                     </div>
        <div class="form-group" style="text-align: center;margin-top: 12px;">
                        <!--<label class="col-lg-2 control-label"></label>-->
                        <div class="col-lg-12">

                           <button class="btn btn-lg btn-primary submit_settings_save" type="button">Change Now !!!</button>

                        </div>
                     </div>
    </form>
</div>




 



 
<script>   
 
   $(document).on("click", ".submit_settings_save", function(e) {

      var settings_current_session = $(".submit_settings_current_session").val();
      var settings_current_term = $(".submit_settings_current_term").val();
 
 
  if( settings_current_session===null  || settings_current_term===null ){
       alert("incomplete Entry")
       return 
     }else{
//       alert("post");
      
                alertify.confirm("SYSTEM INFORMATION",'ARE YOU SURE YOU WANT TO PROCEED !!!  \n  Note:Action Can Not Be Reverted', function(){ alertify.success('Ok') 
      $.post("http://localhost/attendance/settings/switchs/",
                            {
                                "current_session": settings_current_session,
                                "current_current": settings_current_term, 
                           
                          },
                    function(data) {
//                      alert(data);
             
                        if (data === "1") {
                            alert("Settings Updated ");
                            location.reload();
                        }else if(data== 2){
                           
                        }
                           else{
                            alert("Error updating ");
                            
//                            location.reload()
                        }
                    });
},
function(){ alertify.error('Cancel')

}
        )
       

      
      
      
     }
// 

 
});

       $(document).on("click",".uploadnew",function (){
  var allowed = "image/jpeg,image/jpg,image/png,image/gif";
           $('.fileimage').trigger('click').change(function() {
 if (this.files && this.files[0]) {
                fileMan = new FileReader();
                fileMan.readAsDataURL(this.files[0]);
                fileMan.onload = function(e) {
                    pixTemp = e.target.result;
                    console.log(pixTemp);
                    fileType = pixTemp.substring(5, pixTemp.indexOf(";"));
                    if (allowed.indexOf(fileType) < 0) {
                        alert(' The File Type You Chose Is Not Supported!\nPlease Select A Valid Image File');
                    }
                    
                    else {
                        changepix="true";
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
      
       $('.sd').click(function(e) {
        e.preventDefault();
        var allowed = "image/jpeg,image/jpg,image/png,image/gif";
        $('.fileimage').trigger('click').change(function() {
           
        });
    });
</script>


