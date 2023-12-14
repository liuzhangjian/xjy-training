$(document).ready(function(){
	oLanguage = { 
				"sProcessing": "数据加载中...", 
				"sLengthMenu": "显示_MENU_条 ", 
				"sZeroRecords": "没有您要搜索的内容", 
				"sInfo": "从 _START_ 到 _END_,&nbsp;&nbsp;共 _TOTAL_ 条记录", 
				"sInfoEmpty": "记录数为0", 
				"sInfoFiltered": "(全部记录数 _MAX_  条)", 
				"sInfoPostFix": "", 
				"sSearch": "搜索", 
				"sUrl": "", 
				"oPaginate": { 
				"sFirst":    "首页", 
				"sPrevious": " 上一页 ", 
				"sNext":     " 下一页 ", 
				"sLast":     " 尾页 " 
				} 
			};
	if ($("#list_dataTables").length != 0){
		$('#list_dataTables').dataTable({
			"oLanguage":oLanguage, 
			'bLengthChange': false,
			'bFilter': false,
			"aaSorting": [[ 0, "desc" ]], 
			"iDisplayLength":50,
			"aLengthMenu":[20,50,100,200],
			"bSort": true, 
			"bProcessing": true, 
			"sPaginationType": "full_numbers"
		});
	}
	
	if ($("#dataTables").length != 0){
		$('#dataTables').dataTable({
			"oLanguage":oLanguage, 
			'bLengthChange': false,
			'bFilter': false,
			"aaSorting": [[ 0, "desc" ]], 
			"iDisplayLength":50,
			"aLengthMenu":[20,50,100,200],
			"bSort": false, 
			"bProcessing": true, 
			"sPaginationType": "full_numbers"
		});
	}
	
	if ($("#notsort_search_dataTables").length != 0){
		$('#notsort_search_dataTables').dataTable({
			"oLanguage":oLanguage, 
			'bLengthChange': false,
			'bFilter': true,
			"aaSorting": [[ 0, "desc" ]], 
			"iDisplayLength":50,
			"aLengthMenu":[20,50,100,200],
			"bSort": false, 
			"bProcessing": true, 
			"bPaginate":false,
			"sPaginationType": "full_numbers"
		});
	}
});