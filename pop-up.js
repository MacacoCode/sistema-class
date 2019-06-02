$(".pop-up-activate").click(function(){
    $(this).css("display", "none")
    $("body").css("pointer-events", "none");
    $(".pop-up").css("display", "flex")
   
});
$(".pop-up-del").click(function(){
    const father = $(this).text()
    const replace = father.slice(6);
    
    console.log(replace)
    $('a.toDelete').each(function(){
        this.href = this.href.replace('replace', replace);

    });
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
    
});

$(".pop-up-del-multi").click(function(){
    
    const father = $(".pop-up-del-multi > p")
    const replace = father.slice(0,1).text();
    console.log(replace)
    const replace2 = father.slice(1,2).text();
    console.log(replace2)
    const replace3 = father.slice(2,3).text();
    console.log(replace3)
    const replace4 = father.slice(3,4).text();
    console.log(replace4)
    const replace5 = father.slice(4,5).text();
    console.log(replace5)
    $('a.toDelete').each(function(){
        this.href = this.href.replace('replace', replace);
        this.href = this.href.replace('replace2', replace2);
        this.href = this.href.replace('replace3', replace3);
        this.href = this.href.replace('replace4', replace4);
        this.href = this.href.replace('replace5', replace5);
    });
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
