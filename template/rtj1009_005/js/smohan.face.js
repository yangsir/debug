/*
 @ 文本框插入表情插件
 @ 作者：shuimohan
 @ 日期：2013年1月28日
*/
$(function() {
	$.fn.smohanfacebox = function(options) {
		var defaults = {
		Event : "click",	
		divid : "Smohan_FaceBox",
		textid : "needmessage" 
		};
		var options = $.extend(defaults,options);
		var $btn = $(this);
		
		
		var faceimg = '';
	    for(i=9000;i<9032;i++){ 
		 faceimg+='<li><a href="javascript:void(0)"><img src="template/rtj1009_005/image/ren_biaoqing/'+(i+1)+'.gif" face="{:'+(i+1)+':}"/></a></li>';
		 };
		$("#"+options.divid).prepend("<div id='SmohanFaceBox'><div class='Content'><ul class='cl' >"+faceimg+"</ul></div></div>");
	     $('#SmohanFaceBox').css("display",'none');
		
		
		var $facepic = $("#SmohanFaceBox li img");
		
		$btn.live(options.Event,function(e) {
			if($('#SmohanFaceBox').is(":hidden")){
			$('#SmohanFaceBox').show(360);
			$btn.addClass('in');
			}else{
			$('#SmohanFaceBox').hide(360);
			$btn.removeClass('in');
				}
			});
		
		$facepic.die().click(function(){
		     $('#SmohanFaceBox').hide(360);
			 //$("#"+options.textid).focus();
			 //$("#"+options.textid).val($("#"+options.textid).val()+$(this).attr("face"));
			 $("#"+options.textid).die().insertContent($(this).attr("face"));
			 $btn.removeClass('in');
			});			
		
		$('#SmohanFaceBox h3 a.close').click(function() {
			$('#SmohanFaceBox').hide(360);
			 $btn.removeClass('in');
			});	

  };  
  
  
	$.fn.extend({  
		insertContent : function(myValue, t) {  
			var $t = $(this)[0];  
			if (document.selection) {  
				this.focus();  
				var sel = document.selection.createRange();  
				sel.text = myValue;  
				this.focus();  
				sel.moveStart('character', -l);  
				var wee = sel.text.length;  
				if (arguments.length == 2) {  
				var l = $t.value.length;  
				sel.moveEnd("character", wee + t);  
				t <= 0 ? sel.moveStart("character", wee - 2 * t	- myValue.length) : sel.moveStart("character", wee - t - myValue.length);  
				sel.select();  
				}  
			} else if ($t.selectionStart || $t.selectionStart == '0') {  
				var startPos = $t.selectionStart;  
				var endPos = $t.selectionEnd;  
				var scrollTop = $t.scrollTop;  
				$t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos,$t.value.length);  
				this.focus();  
				$t.selectionStart = startPos + myValue.length;  
				$t.selectionEnd = startPos + myValue.length;  
				$t.scrollTop = scrollTop;  
				if (arguments.length == 2) { 
					$t.setSelectionRange(startPos - t,$t.selectionEnd + t);  
					this.focus(); 
				}  
			} else {                              
				this.value += myValue;                              
				this.focus();  
			}  
		}  
	});
 
  
});
