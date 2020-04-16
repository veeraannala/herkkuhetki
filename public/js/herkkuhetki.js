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

    $("input[name=delivery]").click(function(){
        $("#sum").html(""); 
        let sum= Number(phpsum);
        if ($("input[name=delivery]:checked").val() === 'P') {
             
              
             $("#post").html("5.90 €");
             $("#sum").html((sum+5.9).toFixed(2)+ " €");
        }
         else {
            
             $("#post").html("0 €");
             $("#sum").html(sum.toFixed(2) + ' €');          
        }
   });
    
 });
 