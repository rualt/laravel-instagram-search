$(document).bind("ajaxSend", function(){
    $(".loader").show();
  }).bind("ajaxComplete", function(){
    $(".loader").hide();
  });
 