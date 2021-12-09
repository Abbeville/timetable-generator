<?php
$curr_settings = $this->curr_settings;
$all_sessions = $this->all_sessions;
$all_terms = $this->all_terms;
//print_r($curr_settings);
 $c_sess=$curr_settings[4]["description"];
 $c_term=$curr_settings[5]["description"];
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
            SETTINGS
            <span class="tools pull-right">
               <a href="javascript:;" class="fa fa-chevron-down"></a>

            </span>
         </header>
         <div class="panel-body">

            <div id="wizard">


               <section>
                  <form class="form-horizontal">
                     <div class="form-group">
                        <label class="col-lg-2 control-label ">Name</label>
                        <div class="col-lg-8 ">
                           <input type="text" class="form-control submit_settings_name" placeholder="Name" value="<?php if (isset($curr_settings[0]["description"])) {
   
} echo decrypt($curr_settings[0]["description"])
?>">
                        </div>
                     </div>






                  </form>
               </section>


               <section>
                  <form class="form-horizontal">


                     <div class="form-group">
                        <label class="col-lg-2 control-label ">Address</label>
                        <div class="col-lg-8">
                           <textarea class="form-control submit_settings_address" cols="60" rows="5"><?php if (isset($curr_settings[1]["description"])) {
   
} echo decrypt($curr_settings[1]["description"])
?></textarea>
                        </div>
                     </div>
                  </form>


               </section>


               <section>
                  <form class="form-horizontal">


                     <div class="form-group">
                        <label class="col-lg-2 control-label ">Phone</label>
                        <div class="col-lg-8">
                           <input type="number" class="form-control submit_settings_phone" placeholder="Phone" value="<?php if (isset($curr_settings[2]["description"])) {
   
} echo decrypt($curr_settings[2]["description"])
?>">
                        </div>
                     </div>
                      
                      
 
             
                                   <div class="form-group">
	                                       
                                
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
 var changepix="false";
   $(document).on("click", ".submit_settings_save", function(e) {
//alert("lll");
     
      var settings_name = $(".submit_settings_name").val().trim();
      var settings_address = $(".submit_settings_address").val().trim();
      var settings_phone = $(".submit_settings_phone").val().trim();
      
      
//      var settings_email = $(".submit_settings_email").val().trim();
//      var settings_current_session = $(".submit_settings_current_session").val();
//      var settings_current_term = $(".submit_settings_current_term").val();
//      var submit_settings_website = $(".submit_settings_website").val();
//      var submit_settings_motto = $(".submit_settings_motto").val();
//      var submit_settings_next = $(".submit_settings_next").val();
       
 
//   console.log(settings_name)
//   console.log(settings_address)
//   console.log(settings_phone)
//   console.log(settings_email)
//   console.log(settings_current_session)
//   console.log(settings_current_term)
 
  if(   settings_name==="" ){
       alert("incomplete Entry")
       return 
     }else{
//       alert("post");
      
      
       
      $.post("http://localhost/attendance/settings/save2/",
                            {
                                "system_name":settings_name,
                                "address": settings_address ,
                                "phone": settings_phone ,



                                 
                          },
                    function(data) {
                      alert(data);
             
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


