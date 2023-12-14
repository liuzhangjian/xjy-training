function jump(count) {
	  window.setTimeout(function(){  
		   count--;  
		   if(count > 0) {  
			   $('#jump_num').text(count);  
			   jump(count);  
		   } else {  
				window.location = base_url+index_page+'/'+lang;
		   }  
	   }, 1000);
 }
$(document).ready(function(){	
	if($('#jump_num').length != 0)  jump(6);
});