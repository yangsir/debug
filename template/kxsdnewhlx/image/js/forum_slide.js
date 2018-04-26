jQ(function(){
	var goflag = 1;
	var slidertimeout;
	var speed = 5000;
	function getSliderInfo(id){
		var rs = [];
		var ulli_length = jQ('#' + id + '>li').length;
		var li_width = jQ('#' + id + '>li').width();
		var woffset = 0;
		if(id = 'slider_ul'){
			woffset = 4;
		}
		moveoffset = li_width + woffset;
		rs['ul_width'] = ulli_length * moveoffset;
		rs['ulli_length'] = ulli_length;
		rs['li_width'] = li_width;
		rs['moveoffset'] = moveoffset;
		return rs;
	}
	function setSliderBigImg(id , atr){
		var sliderhtml = '<a target="_blank" href="' + atr['bighref'] + '" class="slider_img_a z"><img src="' + atr['bigimg'] + '" height="256px" width="550px" alt="' + atr['bigtitle'] + '"></a><div class="pos_abs" id="controlsdesc"><a target="_blank" href="' + atr['bighref'] + '">' + atr['bigtitle'] + '</a></div>';
		jQ('#' + id + '_big').html(sliderhtml);
	}
	
	jQ('#slider_ul > li').mouseenter(function(){
		clearTimeout(slidertimeout);
		goflag = 0;
		var thisindex = jQ(this).index();
		jQ(this).addClass('active').siblings().removeClass('active');
		var bighref = jQ(this).find('a').attr('href');
		var bigtitle = jQ(this).find('img').attr('alt');
		var bigimg = jQ(this).find('img').attr('ref');
		var rs = [];
		rs['bighref'] = bighref;
		rs['bigtitle'] = bigtitle;
		rs['bigimg'] = bigimg;
		setSliderBigImg('slider_ul' , rs);
	})
	jQ('#slider_ul > li').mouseleave(function(){
		goflag = 1;
		slidertimeout = setTimeout(gonext,speed);
	})
	jQ('.slider_left_aw').click(function(){
		goflag = 0;
		clearTimeout(slidertimeout);
		var id = jQ(this).attr('rel');
		obj =  jQ('#' + id);
		var info = [];
		info = getSliderInfo('slider_ul');
		objleft = obj.position().left;
		toleft = objleft + info['moveoffset'];
		if(toleft > 0){
			return false;
		}else{
			jQ('#slider_ul').animate({left : toleft},150);
		}
		goflag = 1;
		slidertimeout = setTimeout(gonext,speed);
	})
	
	jQ('.slider_right_aw').click(function(){
		goflag = 0;
		clearTimeout(slidertimeout);
		var id = jQ(this).attr('rel');
		obj =  jQ('#' + id);
		var info = [];
		info = getSliderInfo('slider_ul');
		var rightlimit = -(info['ul_width'] - 524 -1);
		objleft = obj.position().left;
		toleft = objleft - info['moveoffset'];
		if(toleft < rightlimit){
			return false;
		}else{
			jQ('#slider_ul').animate({left : toleft} ,150);
		}
		goflag = 1;
		slidertimeout = setTimeout(gonext,speed);		
	})
	
	function gonext(){
		if(goflag > 0){
		  var actindex = jQ('#slider_ul').find('.active').index();
		  info = getSliderInfo('slider_ul');
		  var maxindex = info['ulli_length'];
		  var goindex = actindex + 1;
		  if(goindex > (maxindex - 1)){
			  goindex = 0;
		  }
		  var obj = jQ('#slider_ul li').eq(goindex);
		  var objposleft = obj.position().left;
		  if(objposleft > 524){
		  	jQ('.slider_right_aw').trigger('click');
		  }
		  if(objposleft == 0){
		  	jQ('#slider_ul').animate({left : 0} ,150);
		  }
		  obj.addClass('active').siblings().removeClass('active');
		  var bighref = obj.find('a').attr('href');
		  var bigtitle = obj.find('img').attr('alt');
		  var bigimg = obj.find('img').attr('ref');
		  var rs = [];
		  rs['bighref'] = bighref;
		  rs['bigtitle'] = bigtitle;
		  rs['bigimg'] = bigimg;
		  setSliderBigImg('slider_ul' , rs);
		  slidertimeout = setTimeout(gonext,2500);
		}
	}
	slidertimeout = setTimeout(gonext,2500);	
});