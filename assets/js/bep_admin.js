$(document).ready(function(){
	$('.icon_back,.button_cancel').click(function(){
		   history.go(-1);
	});
	
	$('.delete').click(function(){
		return confirm('确认要删除吗？') ? true : false;
	});

	$('.invalid').click(function(){
		return confirm('确认要无效吗？') ? true : false;
	});
	
	$('input[name="closeWindow"]').click(function(){
		window.close();
	});
	
	$('#showComponentStatus').click(function(){
		$(this).next('table').toggle();
	});
	
	$('.upfile').click(function(){
		var $mEl = $(this).next('.message');
		$(this).ajaxStart(function(){
			$mEl.html('<img src="'+base_url+'assets/images/loading.gif" />');
		});
		$.ajaxFileUpload({
			url : base_url+index_page+"/page/admin/ajaxUp/", 
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			success: function (data){
				if(data != 0){
					$('#fileToUpload').prev().val(data.file_name);
					$mEl.html('上传成功！<a href="'+base_url+'uploads/'+data.file_name+'" target="_blank">查看</a>');
				}else{
					error_msg = '上传失败：未选择文件或文件类型不正确'
					$mEl.html(error_msg);
				}
			}
		});
	});
	if($('#jump_num').length != 0)  jump(10);
});
function wopenfixed(url,name,w,h){
   OWinID = window.open(url,name,'height='+h+',width='+w+',top=100,left=150,toolbar=auto,menubar=no,scrollbars=no,resizable=no, location=no,status=no');
   OWinID.focus();
}

function wopen(url,name,w,h){
   OWinID = window.open(url,name,'height='+h+',width='+w+',top=100,left=150,toolbar=no,menubar=no,scrollbars=yes,resizable=yes, location=no,status=no');
   OWinID.focus();
}
function jump(count) {
	alert(3);
	  window.setTimeout(function(){  
		   count--;  
		   if(count > 0) {  
			   $('#jump_num').text(count);  
			   jump(count);  
		   } else {  
				history.go(-1);
		   }  
	   }, 1000);
 }