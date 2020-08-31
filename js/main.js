
	var scrollBtn = $(".scroll-up");
    $(window).scroll(function()
    {
        console.log($(this).scrollTop());
        scrollBtn.hide();
        if ($(this).scrollTop() >= 700 ){
            scrollBtn.show();
        }
        else{
            scrollBtn.hide();
        }
    });
        scrollBtn.click(function()
        {
           
            var body = $("html, body");
            body.animate({scrollTop:0}, 500);
        });
    
        