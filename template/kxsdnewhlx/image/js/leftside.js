
  if(jQuery('#left_side_bar gdt').length > 0){
        screenw = window.screen.width;
        if(screenw < 1280){
            var leftobj = jQuery('#left_side_bar gdt');
            leftobj.find('a').addClass('wc');
            leftobj.find('dt').addClass('sbc');
            var c = -(screenw - 1000 - 12)/2;
            var t;
            leftobj.mouseenter(function(){
                leftobj.find('a').removeClass('wc');
                leftobj.find('dt').removeClass('sbc');
                leftobj.animate({left:c},200);
                if(t){clearTimeout(t)}
            })
            jQuery('#left_side_bar gdt').mouseleave(function(){
                t = setTimeout(function(){
                    leftobj.find('a').addClass('wc');
                    leftobj.find('dt').addClass('sbc');
                    leftobj.animate({left:'-135px'},200);
                },200)
            })
        }
        jQuery('#left_side_bar gdt>dl>dt').click(function(){
			jQuery(this).siblings().toggle();
        })
    	}

     // ¹Ì¶¨²ã
(function($){$(function () {
    var bartop = $('#infoTab').offset().top;
    function changeBar(){
        var st = $(window).scrollTop();
        if( st > bartop){
            $('#infoTab').addClass('follows');
        }else{
            $('#infoTab').removeClass('follows');
        }
    }
   $(window).scroll( function(){
        changeBar();
    })

})
})(jQuery)
