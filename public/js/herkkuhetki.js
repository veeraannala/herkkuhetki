$(document).ready(function () {
     $("#register").change(function () {
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

     $("input[name=delivery]").click(function () {
          $("#sum").html("");
          let sum = Number(phpsum);
          if ($("input[name=delivery]:checked").val() === 'P') {


               $("#post").html("5.90 €");
               $("#sum").html((sum + 5.9).toFixed(2) + " €");
          }
          else {

               $("#post").html("0 €");
               $("#sum").html(sum.toFixed(2) + ' €');
          }
     });

     $("#updateCustInfo").change(function () {
          if ($(this).prop('checked') === true) {
               $("#updateCustForm").show();
          }
          else {
               $("#updateCustForm").hide();

          }
     });
     $("#passwordeye").click(function () {
          if ($('#password').attr('type') === 'password') {
               $('#password').prop('type', 'text');
               $('#passwordeye').prop('class', 'fa fa-eye-slash input-group-text');
          } else {
               $('#password').prop('type', 'password');
               $('#passwordeye').prop('class', 'fa fa-eye input-group-text');
          }
     });

     $("#passconfeye").click(function () {
          if ($('#passconfirm').attr('type') === 'password') {
               $('#passconfirm').prop('type', 'text');
               $('#passconfeye').prop('class', 'fa fa-eye-slash input-group-text');
          } else {
               $('#passconfirm').prop('type', 'password');
               $('#passconfeye').prop('class', 'fa fa-eye input-group-text');
          }
     });
});
