jQuery(document).ready(function(){
   
    jQuery('#site_msg').live('mouseenter',function(){
        if(!jQuery('.site_msg_tip').hasClass('dn')){
            jQuery('.site_msg_tip').hide();
        }
        //jQuery(this).find('.site_msg').addClass('on');
        //jQuery(this).find('.no_site_msg').addClass('on');
        //jQuery('.dropdown_msg').show();
    })
    jQuery('#site_msg').live('mouseleave',function(){
        if(!jQuery('.site_msg_tip').hasClass('dn')){
            jQuery('.site_msg_tip').show();
        }
        //jQuery(this).find('.site_msg').removeClass('on');
        //jQuery(this).find('.no_site_msg').removeClass('on');
        //jQuery('.dropdown_msg').hide();
    })
    jQuery('#site_setting').live('mouseenter',function(){
        if(!jQuery('.site_msg_tip').hasClass('dn')){
            jQuery('.site_msg_tip').hide();
        }
        //jQuery(this).find('.site_setting').addClass('on');
        //jQuery('.dropdown_setting').show();
    }).live('mouseleave',function(){
            if(!jQuery('.site_msg_tip').hasClass('dn')){
                jQuery('.site_msg_tip').show();
            }
            //jQuery(this).find('.site_setting').removeClass('on');
            //jQuery('.dropdown_setting').hide();
        })
    jQuery('.sitenav ul li').live("mouseenter",function(){
        if(!jQuery(this).hasClass('li_nopic')){
            jQuery(this).addClass('mouse_hover');
        }
    })
    jQuery('.sitenav ul li').live("mouseleave",function(){
        jQuery(this).removeClass('mouse_hover');
    })

    jQuery('.dropmenu').live("mouseenter",function(){
        jQuery(this).find('.now').addClass('on');
        jQuery(this).find('.dropdown').show();
    })
    jQuery('.dropmenu').live("mouseleave",function(){
            jQuery(this).find('.now').removeClass('on');
            jQuery(this).find('.dropdown').hide();
	});
    });

