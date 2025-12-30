@php
			// Initialize arrays
			$state_id = [];
			$number_incident = [];
			$number_arrest = [];
			
			foreach ($sitreps as $sitrep) {
				$state_id[] = $sitrep->state_id;
				$number_incident[] = $sitrep->number_incident; 
				$number_arrest[] = $sitrep->number_arrest;
			}
		@endphp
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="{{ asset('sitrep/adminbackend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{ asset('sitrep/adminbackend/assets/js/jquery.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

	<script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
			} );
	</script>
	<script>
		$(document).ready(function() {
			$('#example1').DataTable();
			} );
	</script>

	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>
	@if($sitreps->all() != null)
	<script>
		$(function() {
		"use strict";

		// chart 1
		
			var ctx = document.getElementById('chart1').getContext('2d');
			
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
						labels  : {!! json_encode($state_id) !!},

						datasets: [{
							label: 'Number of Incident',
							data                :  {!! json_encode($number_incident) !!},

							backgroundColor: '#14abef',
							borderColor: "transparent",
							pointRadius :"0",
							borderWidth: 3
						}, 
						// {
						// 	label: 'Old Visitor',
						// 	// data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
						// 	data                :  {!! json_encode($number_arrest) !!},

						// 	backgroundColor: "rgba(239, 64, 20, 0.35)",
						// 	borderColor: "transparent",
						// 	pointRadius :"0",
						// 	borderWidth: 1
						// }
					]
					},
				options: {
					maintainAspectRatio: false,
					legend: {
					display: false,
					labels: {
						fontColor: '#585757',  
						boxWidth:40
					}
					},
					tooltips: {
					displayColors:false
					},	
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,
							fontColor: '#585757'
						},
						gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, 0.05)"
						},
					}],
					yAxes: [{
						ticks: {
							beginAtZero:true,
							fontColor: '#585757'
						},
						gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, 0.05)"
						},
					}]
					}

				}
				});  
			
			
		// chart 6

			var ctx = document.getElementById("chart6").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["Homicide", "Armed Robbery", "Kidnapping", "Banditry", "Terrorism"],
						datasets: [{
							backgroundColor: [
								"#14abef",
								"#02ba5a",
								"#d13adf",
								"#fba540",
								"#ff0000"  
							],
							data: [{{$sitrep_total->crime1}}, {{$sitrep_total->crime2}}, {{$sitrep_total->crime3}}, {{$sitrep_total->crime4}},{{$sitrep_total->crime5}}],
							borderWidth: [0, 0, 0, 0,0]
						}]
					},
					options: {
						maintainAspectRatio: false,
						cutoutPercentage: 60,
					legend: {
						position :"bottom",	
						display: false,
							labels: {
							fontColor: '#ddd',  
							boxWidth:15
						}
						}
						,
						tooltips: {
						displayColors:false
						}
					}
			});
			
		// chart 7

			var ctx = document.getElementById("chart7").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["Suspects", "Sophisticated Firearms", "Dane Guns ", "Ammunitions", "Cartridges","Victims Rescued"],
						datasets: [{
							backgroundColor: [
								"#14abef",
								"#02ba5a",
								"#d13adf",
								"#fba540",
								"#ff0000"  
							],
							data: [{{$sitrep_insight->number_arrest}}, {{$sitrep_insight->number_firearms}}, {{$sitrep_insight->number_dane_gun}}, {{$sitrep_insight->number_ammunition}},{{$sitrep_insight->number_caterages}},{{$sitrep_insight->number_victims_rescused}}],
							borderWidth: [0, 0, 0, 0,0]
						}]
					},
					options: {
						maintainAspectRatio: false,
						cutoutPercentage: 60,
					legend: {
						position :"bottom",	
						display: false,
							labels: {
							fontColor: '#ddd',  
							boxWidth:15
						}
						}
						,
						tooltips: {
						displayColors:false
						}
					}
			});
			
			
		
				// easy pie chart 
		
		$('.easy-dash-chart1').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#3b5998',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});	


		$('.easy-dash-chart2').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#55acee',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});


		$('.easy-dash-chart3').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#e52d27',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});
			
			
		// worl map

		jQuery('#dashboard-map').vectorMap(
		{
			map: 'world_mill_en',
			backgroundColor: 'transparent',
			borderColor: '#818181',
			borderOpacity: 0.25,
			borderWidth: 1,
			zoomOnScroll: false,
			color: '#009efb',
			regionStyle : {
				initial : {
				fill : '#14abef'
				}
			},
			markerStyle: {
			initial: {
				r: 9,
				'fill': '#fff',
				'fill-opacity':1,
				'stroke': '#000',
				'stroke-width' : 5,
				'stroke-opacity': 0.4
						},
						},
			enableZoom: true,
			hoverColor: '#009efb',
			markers : [{
				latLng : [21.00, 78.00],
				name : 'Lorem Ipsum Dollar'
			
			}],
			hoverOpacity: null,
			normalizeFunction: 'linear',
			scaleColors: ['#b6d6ff', '#005ace'],
			selectedColor: '#c9dfaf',
			selectedRegions: [],
			showTooltip: true,
		});
				
				
		$("#trendchart1").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#eb5076'
			});
				

			$("#trendchart2").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#14abef'
			});


			$("#trendchart3").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#02ba5a'
			});


			$("#trendchart4").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#d13adf'
			});	


			$("#trendchart5").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#000000'
			});	

			
			// chart 3

			var ctx = document.getElementById('chart3').getContext('2d');
					
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
				labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
				datasets: [{
					label: 'Page Views',
					data: [0, 8, 12, 5, 12, 8, 16, 25, 15, 10, 20, 10, 30],
					backgroundColor: 'rgba(0, 150, 136, 0.33)',
					borderColor: '#009688',
					pointBackgroundColor:'#fff',
					pointHoverBackgroundColor:'#fff',
					pointBorderColor :'#fff',
					pointHoverBorderColor :'#fff',
					pointBorderWidth :1,
					pointRadius :0,
					pointHoverRadius :4,
					borderWidth: 3
				}]
				}
				,
				options: {
					maintainAspectRatio: false,
					legend: {
						position: false,
						display: true,
					},
				tooltips: {
				enabled: false
			},
			scales: {
				xAxes: [{
					display: false,
					gridLines: false
				}],
				yAxes: [{
					display: false,
					gridLines: false
				}]
				}
				}
			
			});

			// chart 4
			
			var ctx = document.getElementById("chart4").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
							datasets: [{
								label: 'Total Clicks',
								data: [0, 10, 14, 18, 12, 8, 16, 25, 15, 10, 20, 10, 30],
								backgroundColor: "#ff6a00"
							}]
						},
						options: {
							maintainAspectRatio: false,
							legend: {
							display: false,
							labels: {
								fontColor: '#ddd',  
								boxWidth:40
							}
							},
							tooltips: {
							enabled:false
							},	
							
							scales: {
							xAxes: [{
								barPercentage: .3,
								display: false,
								gridLines: false
							}],
							yAxes: [{
								display: false,
								gridLines: false
							}]
							}

					}
					
					});
			
			// chart 5

			var ctx = document.getElementById("chart5").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
							datasets: [{
								label: 'Total Earning',
								data: [39, 19, 25, 16, 31, 39, 23, 20, 23, 18, 15, 20],
								backgroundColor: "#04b35a"
							},{
								label: 'Total Sales',
								data: [27, 12, 26, 15, 21, 27, 13, 19, 32, 22, 18, 30],
								backgroundColor: "rgba(4, 179, 90, 0.35)"
							}]
						},
						options: {
							maintainAspectRatio: false,
							legend: {
							display: false,
							position: 'bottom',
							labels: {
								fontColor: '#ddd',  
								boxWidth:13
							}
							},
							tooltips: {
							enabled:true,
							displayColors:false,
							},	
							
							scales: {
							xAxes: [{
								stacked: true,
								barPercentage: .4,
								display: false,
								gridLines: false
							}],
							yAxes: [{
								stacked: true,
								display: false,
								gridLines: false
							}]
							}

					}
					
					});
			
			
				
				
		});	 
	
	</script>
	@endif
	<!--app JS-->
	<script src="{{ asset('sitrep/adminbackend/assets/js/app.js')}}"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
 
	<script>
	@if(Session::has('message'))
	var type = "{{ Session::get('alert-type','info') }}"
	switch(type){
		case 'info':
		toastr.info(" {{ Session::get('message') }} ");
		break;
	
		case 'success':
		toastr.success(" {{ Session::get('message') }} ");
		break;
	
		case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
		break;
	
		case 'error':
		toastr.error(" {{ Session::get('message') }} ");
		break; 
	}
	@endif 
	</script>

	<script>
		$(document).ready(function() {
			$('#state').on('change', function() {
				var stateId = $(this).val();
				if (stateId) {
					$.ajax({
						url: "{{ route('locations.get_cities') }}",
						type: "GET",
						data: { state_id: stateId },
						dataType: "json",
						success: function(data) {
							$('#city').empty();
							$('#city').append('<option value="">Select City</option>');
							if (data.length > 0) {
								$.each(data, function(key, value) {
									$('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
								});
								$('#city').prop('disabled', false);
							} else {
								$('#city').prop('disabled', true);
							}
						}
					});
				} else {
					$('#city').empty();
					$('#city').append('<option value="">Select City</option>');
					$('#city').prop('disabled', true);
				}
			});
		});
	</script>