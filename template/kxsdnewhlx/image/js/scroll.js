(function($){
	$.fn.extend({
		Scroll:function(opt,callback){
				//������ʼ��
				if(!opt) var opt={};
				var _btnUp = $("#"+ opt.up);//Shawphy:���ϰ�ť
				var timerID;
				var _this=this.eq(0).find("ul:first");
				var     lineH=_this.find("li:first").outerHeight(), //��ȡ�и�
						line=opt.line?parseInt(opt.line,10):parseInt(this.outerHeight()/lineH,10), //ÿ�ι�����������Ĭ��Ϊһ�������������߶�
						speed=opt.speed?parseInt(opt.speed,10):500; //���ٶȣ���ֵԽ���ٶ�Խ�������룩
						timer=opt.timer //?parseInt(opt.timer,10):3000; //������ʱ���������룩
				if(line==0) line=1;
				var upHeight=0-line*lineH;
				//��������
				var scrollUp=function(){
						_btnUp.unbind("click",scrollUp); //Shawphy:ȡ�����ϰ�ť�ĺ�����
						_this.animate({
								marginTop:upHeight
						},speed,function(){
								for(i=1;i<=line;i++){
										_this.find("li:first").appendTo(_this);
								}
								_this.css({marginTop:0});
								_btnUp.bind("click",scrollUp); //Shawphy:�����ϰ�ť�ĵ���¼�
						});

				}
			   //Shawphy:�Զ�����
				var autoPlay = function(){
						if(timer)timerID = window.setInterval(scrollUp,timer);
				};
				var autoStop = function(){
						if(timer)window.clearInterval(timerID);
				};
				 //����¼���
				_this.hover(autoStop,autoPlay).mouseout();
				_btnUp.css("cursor","pointer").click( scrollUp ).hover(autoStop,autoPlay);//Shawphy:������������¼���

		}      
	})
})(jQuery);

	
