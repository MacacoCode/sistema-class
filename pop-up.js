$(".pop-up-activate").click(function(){
    $(".pop-up").css("display", "block")
    console.log("Esto si funciona")
    console.log($('.pop-up')[0]);
    $(".pop-up").slideDown(500);
});
$(".pop-up-cancel").click(function(){
    $(".pop-up").css("display", "none")
    console.log("Esto si funciona")
    console.log($('.pop-up')[0]);
    $(".pop-up").slideDown(500);
});