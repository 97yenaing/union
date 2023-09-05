$(document).ready(function(){
   if(cleanedValue=="ProjectManager"){
    $("button").prop("disabled",true);
    $(".pt_userViewBtn,.pt_viewBtn").prop("disabled",false);
   }
   
    $("#state").change(function(){
        region();
    })
});