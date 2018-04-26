(function(jQ) {
	jQ.fn.hlxSlider = function(options){
		var defaults = {
			controlsShow:	true,
			controlsBefore:	'',
			controlsAfter:	'',
			speed: 			1500,
			auto:			true,
			pause:			2000,
			continuous:		true,
			numericId: 		'controls',
			titleshow:		'controlsdesc'
		}; 
		
		var options = jQ.extend(defaults, options);  
		var ulimg = jQ(this).find('ul');
		var timeout;
		this.each(function() {  
			var obj = jQ(this);		
			var s = jQ("li", obj).length;
			var w = jQ("li", obj).width();
			var h = jQ("li", obj).height();
			var clickable = true;
			obj.width(w);
			obj.height(h);
			obj.css("overflow","hidden");
			var ts = s-1;
			var t = 0;
			jQ("ul", obj).css('width',s * w);
			jQ(this).hover(function(){
				clearTimeout(timeout);
			},function(){
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			});
			if(options.continuous){
				jQ("ul", obj).prepend(jQ("ul li:last-child", obj).clone().css("margin-left","-"+ w +"px"));
				jQ("ul", obj).append(jQ("ul li:nth-child(2)", obj).clone());
				jQ("ul", obj).css('width',(s+1)*w);
			};				
			
			jQ("li", obj).css('float','left');
								
			if(options.controlsShow){
				if(options.titleshow != ''){
					jQ(obj).after('<div id="' + options.titleshow + '"></div>');
				}
				var html = options.controlsBefore;				
				html += '<ol id="'+ options.numericId +'"></ol>';
				html += options.controlsAfter;						
				jQ(obj).after(html);
			};						
			for(var i=0;i<s;i++){						
				jQ(document.createElement("li"))
					.attr('id',options.numericId + (i+1))
					.html('<a rel='+ i +' href=\"javascript:void(0);\">'+ (i+1) +'</a>')
					.appendTo(jQ("#"+ options.numericId))
					.click(function(){
						animate(jQ("a",jQ(this)).attr('rel'),true);
					}); 												
			};
			function setCurrent(i){
				i = parseInt(i)+1;
				jQ("#" + options.numericId + " > li ").removeClass("current");
				jQ("li#" + options.numericId + i).addClass("current");
				if(options.titleshow != ''){
					var ahref = ulimg.find('li').eq(i).find('a').attr('href');
					var title = ulimg.find('li').eq(i).find('img').attr('title');
					var discripe = ulimg.find('li').eq(i).find('img').attr('rel');
					var discripep = "";
					if (typeof(discripe) != "undefined"){
						discripep = '<p>'+ discripe +'</p>'
					}
					jQ("div#" + options.titleshow).html('<a href="'+ ahref +'"><h2>' + title + '</h2>' + discripep + '</a>');
				}
			};
			function adjust(){
				if(t>ts) t=0;		
				if(t<0) t=ts;
				jQ("ul",obj).css("margin-left",(t*w*-1));
				clickable = true;
				setCurrent(t);
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					animate("next",false);
				},5000);
			};
			
			function animate(dir,clicked){
				if (clickable){
					clickable = false;
					var ot = t;
					switch(dir){
						case "next":
							t = (ot>=ts) ? (options.continuous ? parseInt(t)+1 : ts) : parseInt(t)+1;				
							break; 
						default:
							t = dir;
							break; 
					};
					var diff = Math.abs(ot-t);
					var speed = options.speed;
					p = (t*w*-1);
					if(clicked){
						jQ("ul",obj).hide().fadeIn('fast').css('margin-left',p);
						adjust();
						clearTimeout(timeout);
						timeout = setTimeout(function(){
							animate("next",false);
						},options.pause);
					}else{
						jQ("ul",obj).animate({marginLeft:p},{queue:false,duration:speed,complete:adjust});
					}
					if(options.auto && dir=="next" && !clicked){
						timeout = setTimeout(function(){
							animate("next",false);
						},options.pause);
					};
				};
			};
			
			// init
			if(options.auto){;
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			};		
			setCurrent(0);			
			
		});
	  
	};
	jQ("#zx_diary").html('\u672c\u6e90\u7801\u7531\u72d7\u6251\u6e90\u7801\u793e\u533a\u0028\u0042\u0042\u0053\u002e\u0047\u004f\u0050\u0045\u002e\u0043\u004e\u0029\u63d0\u4f9b');
})(jQuery);