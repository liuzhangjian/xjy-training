$(document).ready(function(){
//窗口改变大小，布局随之变化
	Resize();
	$(window).resize(function(){
		Resize();
	});
	function Resize(){
		var maskHeight = $(window).height();  
		//var maskWidth = $(window).width();
		//var navWidth= $('#navigation').width();
		//var contentWidth = maskWidth - navWidth;
		var headHeight = $('#header').height();
		var contentHeight = maskHeight - headHeight;
		//$('#content-box').width(contentWidth-9);
		//$('#content-box').height(contentHeight);
		$('#mainTab').height(contentHeight-26);
		$('#mainTab,#mainTb').height(contentHeight-26);
		//$('#split_layout').css('margin-top',contentHeight/2.6+'px');
	}
	$('#split_layout').click(function(){
		if($('#navigation').is(":hidden")){
			$('#navigation').show();
			$('#navigation').width(190);
			$(this).addClass('split_layout').removeClass('split_layout2');
		} else {
			$('#navigation').hide();
			$('#navigation').width(0);
			$(this).addClass('split_layout2').removeClass('split_layout');
		};
		Resize();
	});
	
	$('#menu h5').click(function(){
		$('#menu li ul').slideUp("normal");
		$(this).next().slideDown("normal");
	});
	
	var url = (document.URL).toLowerCase();//取得当前页的URL
	var menuA = $('#menu a');
	show = false;
	var url = (document.URL).toLowerCase();//取得当前页的URL
	var menuH5 = $('#menu h5');
	menuH5.each(function(){
		el = $(this);
		menuClass = $(this).attr('class').toLowerCase();
		classArray = menuClass.split(' ');
		$.each(classArray, function(index,v){
			if(url.indexOf(v) > -1){
				$(el).next('ul').show();
				show = true;
				return false;
			}
		});
		if(show) return false;
	});
	if(!show) $('#menu li ul').first().show();
});