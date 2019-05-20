$("#pop-up-activate").click(function(){
    $("#pop-up").css("display", "block")
    console.log("Esto si funciona")
    console.log($('#pop-up')[0]);
    $("#pop-up").slideDown(500);
});