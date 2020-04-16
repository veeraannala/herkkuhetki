$(document).ready(function(){
    $("#register").change(function(){
         if ($(this).prop('checked') === true) {
            $("#passwordshow").show(); 
            $("#regOrder").show(); 
            $("#order").hide();   
         }
          else {
            $("#passwordshow").hide(); 
            $("#regOrder").hide();
            $("#order").show();              
         }
    });
    
 });
 