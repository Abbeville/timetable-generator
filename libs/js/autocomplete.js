    var avail;
            $(document).on("keyup", ".search_input_message", function(e) {
//               alert("mello");
                var search_token = $(".search_input_message").val();
                if (search_token.length < 1) {

                } else {
                    $.post("http://192.168.0.102/medslat/mobile/search_docs/", {token: search_token}, function(r) {
                   alert(r);
  var res = JSON.parse(r);
  alert(res);
//    var acc_2=JSON.stringify(r);
////    alert(acc_2);
//    
//        var lenght11 = acc_2.length;
////        alert(lenght11);
//        if (lenght11 < 5) {
////                        return;
////            alert('  empty  ');
//            $(".transcHist").append($("<div class='time_category datestamp'>transaction history is empty</div>"));
//            return;
//        }
    
   var my_hist="";
   $.each(res, function (id, res) {
        
// $(".transcHist").append($("<div class='time_category datestamp'>" + data.trans_date + "</div><div class='single_transaction'><span class='description_transaction'>" + data.trans_des + "</span><div class='time_amt'><div class='time_trasc'><div class='tr_time'><span>Transaction Date:</span>" + data.trans_date + "</div><div class='v_time'><span>Transaction Verification Date:</span>" + data.trans_vdate + "</div> </div><div class='amount_trasc'><span>Amount: </span><span class='transc_amt'>" + data.trans_deb + "</span><span>Currency:  </span><span class='transc_amt'>" + data.trans_currency + "</span> </div> </div> </div></div>"));
//var his_row="<div class='time_category datestamp'>" + data.trans_date + "</div><div class='single_transaction'><span class='description_transaction'>" + data.trans_des + "</span><div class='time_amt'><div class='time_trasc'><div class='tr_time'><span>Transaction Date:</span>" + data.trans_date + "</div><div class='v_time'><span>Transaction Verification Date:</span>" + data.trans_vdate + "</div> </div><div class='amount_trasc'><span>Amount: </span><span class='transc_amt'>" + data.trans_deb + "</span><span>Currency:  </span><span class='transc_amt'>" + data.trans_currency + "</span> </div> </div> </div></div>";
//var his_row="<div class='list_item_container' rel='" + res.uid + "><div class='image'><img src='images/mem.png'> <div class='label'>'" + res.value + "" + res.value2 + "'  <div class='description'>'" + res.label + "'</div></div>";
var his_row="<div class='list_item_container' rel='" + res.uid + "'><div class='image'><img src='images/3.png'></div><div class='label'>'" + res.value + "' '" + res.value2 + "'</div><div class='description'>'" + res.label + "'</div></div>";


// 


my_hist += his_row;
    });
//        $(".resp").html(r); 
$(".search-display").empty();
$(".search-display").append(my_hist);
 
                    });
                }
            });
//                $.post("http://192.168.0.102/medslat/mobile/search_docs/", {"": ""}, function(r) {
//                    avail = JSON.parse(r);
//                    $("#tags").autocomplete({
//                        source: avail
//                                //
//                    }).data("ui-autocomplete")._renderItem = function(ul, item) {
//                        var inner_html = '<a><div class="list_item_container" rel="' + item.uid + '"><div class="image"><img src="images/3.png"></div><div class="label">' + item.value + ' ' + item.value2 + '</div><div class="description">' + item.label + '</div></div></a>';
//                        return $("<li></li>")
//                                .data("item.autocomplete", item)
//                                .append(inner_html)
//                                .appendTo(ul);
//                    };
//                });

//      div class='list_item_container' rel=' + item.uid + '><div class='image'><img src='images/3.png'></div><div class='label'>' + item.value + ' ' + item.value2 + '</div><div class='description'>' + item.label + '</div></div>