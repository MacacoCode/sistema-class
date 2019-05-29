$(".pop-up-activate").click(function(){
    $("body").css("pointer-events", "none");
    $(".pop-up").css("display", "flex")
   
});
$(".pop-up-del").click(function(){
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
    
});
$(".pop-up-cancel").click(function(){
    $("body").css("pointer-events", "all");
    $(".pop-up").css("display", "none")
    $(".pop-up-borrar").css("display", "none")
    $(".pop-up-login").css("display", "none")

    
});
