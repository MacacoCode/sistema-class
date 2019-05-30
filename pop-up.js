$(".pop-up-activate").click(function(){
    $(this).css("display", "none")
    $("body").css("pointer-events", "none");
    $(".pop-up").css("display", "flex")
   
});
$(".pop-up-del").click(function(){
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
    
});
$(".pop-up-cancel").click(function(){
    $(".pop-up-activate").css("display", "inline")
    $(".pop-up-del").css("display", "inline")
    $("body").css("pointer-events", "all");
    $(".pop-up").css("display", "none")
    $(".pop-up-borrar").css("display", "none")
    $(".pop-up-error").css("display", "none")

    
});
