$(document).ready(function(){
	if($("#sales_record_box").length && typeof(sales_record) != "undefined"){
		$.jqplot.config.enablePlugins = true;
		$.jqplot('sales_record_box', [sales_record], {
			seriesDefaults:{
				renderer:$.jqplot.BarRenderer, 
				rendererOptions:{
					barPadding:10, barMargin:10
				}
			},
		legend: {show:false},
		axes:{
			xaxis:{
				renderer:$.jqplot.CategoryAxisRenderer, 
				rendererOptions:{
					tickRenderer: $.jqplot.CanvasAxisTickRenderer
				},
				tickOptions: {
					angle: -30
				}
			},
			yaxis:{
				min:0,
				max:maxVal,
				numberTicks:6,
				tickOptions: {
					formatString: '%.2f'
				}
			}
		},
		highlighter: {show: false},
		cursor: {show: false}
		});
	}
});