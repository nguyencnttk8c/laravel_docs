@extends('backend.layout.main')
@section('content')	
	<div class="col-sm-6">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Số liệu
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="piechart-placeholder"></div>
					<div class="hr hr8 hr-double"></div>

					<div class="clearfix">
						<div class="grid2">
							<span class="grey">
								<i class="ace-icon fa fa-shopping-cart fa-2x blue"></i>
								&nbsp; Tổng giao dịch
							</span>
							<h4 class="bigger pull-right">{{$data['transactions']}}</h4>
						</div>

						<div class="grid2">
							<span class="grey">
								<i class="ace-icon fa fa-users fa-2x purple"></i>
								&nbsp; Số lượng người dùng
							</span>
							<h4 class="bigger pull-right">{{$data['customers']}}</h4>
						</div>

						<div class="grid2">
							<span class="grey">
								<i class="ace-icon fa fa fa-file-text fa-2x red"></i>
								&nbsp; Tổng tài liệu
							</span>
							<h4 class="bigger pull-right">{{$data['documents']}}</h4>
						</div>
						<div class="grid2">
							<span class="grey">
								<i class="ace-icon fa fa fa-file-text fa-2x"></i>
								&nbsp; Tổng bài viết
							</span>
							<h4 class="bigger pull-right">{{$data['articles']}}</h4>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
	<div class="col-sm-6" >
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Giao dịch gần đây
				</h5>
			</div>
			<table id="simple-table" class="table table-striped table-bordered table-hover">
			  <thead>
				<tr>
				  <th>ID</th>
				  <th>Mã giao dịch</th>
				  <th>Loại giao dịch</th>
				  <th>Tình trạng</th>
				  <th>Số tiền giao dịch</th>
				  <th>Ngày giao dịch</th>
				</tr>
			  </thead>
			  <tbody>	
				<tr>
				  <td>289</td>
				  <td>#09824</td>
				  <td>Chuyển khoản</td>
				  <td>Đã chuyển</td>
				  <td>500,000</td>
				  <td>27/09/2016</td>
				</tr>
				<tr>
				  <td>289</td>
				  <td>#09824</td>
				  <td>Chuyển khoản</td>
				  <td>Đã chuyển</td>
				  <td>500,000</td>
				  <td>27/09/2016</td>
				</tr>
				<tr>
				  <td>289</td>
				  <td>#09824</td>
				  <td>Chuyển khoản</td>
				  <td>Đã chuyển</td>
				  <td>500,000</td>
				  <td>27/09/2016</td>
				</tr>
				<tr>
				  <td>289</td>
				  <td>#09824</td>
				  <td>Chuyển khoản</td>
				  <td>Đã chuyển</td>
				  <td>500,000</td>
				  <td>27/09/2016</td>
				</tr>
				
			  </tbody>
			</table>									
		</div><!-- /.widget-box -->						
	</div>	
@stop
@section('javascripts')	
jQuery(function($) {
	$('.easy-pie-chart.percentage').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		var size = parseInt($(this).data('size')) || 50;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
			size: size
		});
	})

	$('.sparkline').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		$(this).sparkline('html',
						 {
							tagValuesAttribute:'data-values',
							type: 'bar',
							barColor: barColor ,
							chartRangeMin:$(this).data('min') || 0
						 });
	});


	//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
	//but sometimes it brings up errors with normal resize event handlers
	$.resize.throttleWindow = false;

	var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
	var data = [
		{ label: "Tổng giao dịch",  data: {{\App\Http\Controllers\Backend\DashboardController::calculation($data['transactions'])}}, color: "#478fca"},
		{ label: "Số lượng người dùng",  data: {{\App\Http\Controllers\Backend\DashboardController::calculation($data['customers'])}}, color: "#a069c3"},
		{ label: "Tổng tài liệu",  data: {{\App\Http\Controllers\Backend\DashboardController::calculation($data['documents'])}}, color: "#dd5a43"},
		{ label: "Tổng bài viết",  data: {{\App\Http\Controllers\Backend\DashboardController::calculation($data['articles'])}}, color: "#777"}
	]
	function drawPieChart(placeholder, data, position) {
		  $.plot(placeholder, data, {
		series: {
			pie: {
				show: true,
				tilt:0.8,
				highlight: {
					opacity: 0.25
				},
				stroke: {
					color: '#fff',
					width: 2
				},
				startAngle: 2
			}
		},
		legend: {
			show: true,
			position: position || "ne", 
			labelBoxBorderColor: null,
			margin:[-30,15]
		}
		,
		grid: {
			hoverable: true,
			clickable: true
		}
	 })
	}
	drawPieChart(placeholder, data);

	/**
	we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
	so that's not needed actually.
	*/
	placeholder.data('chart', data);
	placeholder.data('draw', drawPieChart);


	//pie chart tooltip example
	var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
	var previousPoint = null;

	placeholder.on('plothover', function (event, pos, item) {
	if(item) {
		if (previousPoint != item.seriesIndex) {
			previousPoint = item.seriesIndex;
			var tip = item.series['label'] + " : " + item.series['percent']+'%';
			$tooltip.show().children(0).text(tip);
		}
		$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
	} else {
		$tooltip.hide();
		previousPoint = null;
	}

	});
})
@stop