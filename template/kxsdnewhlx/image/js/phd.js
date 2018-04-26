jQuery(document).ready(function(){
    jQuery('.dropmenu').live("mouseenter",function(){
        jQuery(this).find('.now').addClass('on');
        jQuery(this).find('.dropdown').show();
    })
    jQuery('.dropmenu').live("mouseleave",function(){
            jQuery(this).find('.now').removeClass('on');
            jQuery(this).find('.dropdown').hide();
	});
    });

jQuery(document).ready(function(){

    jQuery(".nav_login_title").live("click",function(e){
        e.preventDefault();
        e.stopPropagation();
        jQuery(".login_pop_up").show().addClass("open");
    })
    jQuery(".login_pop_up").live("click",function(e){
        //e.preventDefault();
        e.stopPropagation();
    })
    jQuery(document).on('click',function(){
        if(jQuery(".login_pop_up").hasClass("open")){
            jQuery(".login_pop_up").hide().removeClass("open");
        }
    });
})
