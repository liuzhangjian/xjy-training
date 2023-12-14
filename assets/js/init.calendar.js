$(document).ready(function(){	
	jQuery(function($){
		$.datepicker.regional['zh-CN'] = {
			closeText: '关闭',
			prevText: '&#x3c;上月',
			nextText: '下月&#x3e;',
			currentText: '今天',
			monthNames: ['一月','二月','三月','四月','五月','六月',
			'七月','八月','九月','十月','十一月','十二月'],
			monthNamesShort: ['一','二','三','四','五','六',
			'七','八','九','十','十一','十二'],
			dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
			dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
			dayNamesMin: ['日','一','二','三','四','五','六'],
			weekHeader: '周',
			dateFormat: 'yy-mm-dd',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: true,
			yearSuffix: '年'};
		$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
	});
	function IsDate(oTextbox) { 
		var regex = new RegExp("^(([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8]))))|((([0-9]{2})(0[48]|[2468][048]|[13579][26])|((0[48]|[2468][048]|[3579][26])00))-02-29)$"); 
		var dateValue = oTextbox.value; 
		if (!regex.test(dateValue)) { 
			return false; 
		}else{
			return true;
		}
	}
	if($('.date').length != 0){
		$('.date').datepicker({
			showOn: "button",
			buttonImage: ""+base_url+"assets/images/calendar.gif",
			buttonImageOnly: true
		});
		$('.date').blur(function(){
			if($(this).val()){
				if(!IsDate($(this)[0])){
					var tDate = new Date();
					alert('日期格式有误！例如:2011-01-01');
					$(this).val('');
				}
			}
		});
	}
});