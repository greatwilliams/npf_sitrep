<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('sitrep/adminbackend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{ asset('sitrep/adminbackend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('sitrep/adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('sitrep/adminbackend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('sitrep/adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> -->

	<!-- loader-->
	<link href="{{ asset('sitrep/adminbackend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('sitrep/adminbackend/assets/js/pace.min.js')}}"></script>
	
	<!-- Bootstrap CSS -->

	<link href="{{ asset('sitrep/adminbackend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('sitrep/adminbackend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('sitrep/adminbackend/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/header-colors.css')}}" />


	<style type="text/css">

		.vertical-text-table {
		writing-mode: vertical-rl;
		transform: rotate(180deg);
		text-align: left;
		max-height: 150px;
			}

	</style>
	<title>SITREP - Admin</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('sitrep.admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('sitrep.admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">

		



		



@foreach($sitreps_total as $sitrep_total) 
          
@endforeach

	



<div class="page-content">

                <div class="col-md-12">
                    
                </div> 

				<div class="row">
					<div class="col-12 col-lg-12 col-xl-12 d-flex">
					   <div class="card w-100">
						<div class="card">
                            <div class="card-body">
                            
                                <div style="text-align: center;">
                                    <img src="{{ asset('sitrep/adminbackend/assets/images/logo/logo.png') }}"  alt="My Image"  height="100px">


                                    <h3><b> SITUATION REPORT ACROSS THE COUNTRY</b></h3>  
                                </div>

                                <div style="text-align: right;">
                                    
                                    <h4>  
                                        @if($sitreps_total->all() != null)
                                            <h4 class="m-0">{{$info}} </h4>
                                        @endif
                                        @if($sitreps_total->all() == null)
                                            <h4 class="m-0">No Record for {{$info}}</h4>
                                        @endif
                                    </h4> 

                                </div>  
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
					   </div>
					</div>
				</div><!--End Row-->

             


				

				<!-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Major Incident Freqency  </h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
							<div class="chart-container-1">
								<canvas id="chart6"></canvas>
							</div>
							</div>
					   </div>
					</div> -->
					
					<div class="col">
						<div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="text-uppercase fw-bold" style="color:rgba(90, 113, 238, 1)">{{$info}} Culpable Homicide Trend  </h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart7"></canvas>
						   </div>
						</div>
					   </div>
					</div>

					<div class="col">
						<div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="text-uppercase fw-bold" style="color:rgba(10, 88, 3, 1)">{{$info}} Armed Robbery Trend  </h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart8"></canvas>
						   </div>
						</div>
					   </div>
					</div>


					<div class="col">
						<div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="text-uppercase fw-bold" style="color:rgba(190, 24, 212, 1)">{{$info}} Kidnapping Trend  </h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart9"></canvas>
						   </div>
						</div>
					   </div>
					</div>

					<div class="col">
						<div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="text-uppercase fw-bold" style="color:rgba(211, 68, 12, 1)">{{$info}} Banditry Trend  </h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart10"></canvas>
						   </div>
						</div>
					   </div>
					</div>

					<div class="col">
						<div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="text-uppercase fw-bold" style="color:rgba(177, 19, 19, 1)">{{$info}} Kidnapping Trend  </h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart11"></canvas>
						   </div>
						</div>
					   </div>
					</div>

                <!-- </div> -->
				<!--end row-->






                   


                <div class="row row-cols-1 row-cols-md-1 row-cols-xl-1">
                    <div class="col">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="text-uppercase fw-bold" style="color: #333">{{$info}} Comparative Crime Trends</h6>
                                        <p class="text-muted mb-0" style="font-size: 14px">Monthly trends for all crime categories</p>
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                    </div>
                                </div>
                                <div class="chart-container-1" style="height: 450px">
                                    <canvas id="comparativeCrimeChart"></canvas>
                                </div>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="legend-item d-flex align-items-center mb-2">
                                                <div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(90, 113, 238, 1);"></div>
                                                <small>Culpable Homicide</small>
                                            </div>
                                            <div class="legend-item d-flex align-items-center mb-2">
                                                <div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(10, 88, 3, 1);"></div>
                                                <small>Armed Robbery</small>
                                            </div>
                                            <div class="legend-item d-flex align-items-center">
                                                <div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(190, 24, 212, 1);"></div>
                                                <small>Kidnapping</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="legend-item d-flex align-items-center mb-2">
                                                <div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(211, 68, 12, 1);"></div>
                                                <small>Banditry</small>
                                            </div>
                                            <div class="legend-item d-flex align-items-center mb-2">
                                                <div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(177, 19, 19, 1);"></div>
                                                <small>Terrorism</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				


				</div>
				<!--end row-->

               


             

                
</div>
			

		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('sitrep.admin.body.footer')
		
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
			$('#example11').DataTable();
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
		$(document).ready(function() {
			var table = $('#example1').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example1_wrapper .col-md-6:eq(0)' );
		} );
	</script>

     <script>
		$(document).ready(function() {
			var table = $('#example3').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example3_wrapper .col-md-6:eq(0)' );
		} );
	</script>


	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>
	@if($sitreps_total->all() != null)
	<script>
		$(function() {
		"use strict";
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
				
		});	 
	</script>
	@endif





<script>  //HOMICIDE TREND
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Prepare data array for all 12 months
        let monthlyData = new Array(12).fill(0); // Initialize with zeros
        
        // Fill in the data from sitreps_total
        @foreach($sitreps_total as $data)
            monthlyData[{{ $data->month }} - 1] = {{ $data->crime1 }};
        @endforeach
        
        // chart 7 - Line chart for yearly trends
        var ctx = document.getElementById("chart7").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Homicide Trend',
                    data: monthlyData,
                    borderColor: "#14abef",
                    backgroundColor: "rgba(20, 171, 239, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#14abef",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3 // Smooth line
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontColor: '#ddd',
                            fontSize: 12,
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.3
                    }
                }
            }
        });
    });
</script>


<script>  //Armed Robbery TREND
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Prepare data array for all 12 months
        let monthlyData = new Array(12).fill(0); // Initialize with zeros
        
        // Fill in the data from sitreps_total
        @foreach($sitreps_total as $data)
            monthlyData[{{ $data->month }} - 1] = {{ $data->crime2 }};
        @endforeach
        
        // chart 8 - Line chart for yearly trends
        var ctx = document.getElementById("chart8").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Armed Robbery Trend',
                    data: monthlyData,
                    borderColor: "#1ac932ff",
                    backgroundColor: "rgba(65, 170, 79, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#053f29ff",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3 // Smooth line
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontColor: '#ddd',
                            fontSize: 12,
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.3
                    }
                }
            }
        });
    });
</script>

<script>  //Kidnapping TREND
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Prepare data array for all 12 months
        let monthlyData = new Array(12).fill(0); // Initialize with zeros
        
        // Fill in the data from sitreps_total
        @foreach($sitreps_total as $data)
            monthlyData[{{ $data->month }} - 1] = {{ $data->crime3 }};
        @endforeach
        
        // chart 8 - Line chart for yearly trends
        var ctx = document.getElementById("chart9").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Armed Robbery Trend',
                    data: monthlyData,
                    borderColor: "#ab24d4ff",
                    backgroundColor: "rgba(207, 51, 181, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#420442ff",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3 // Smooth line
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontColor: '#ddd',
                            fontSize: 12,
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.3
                    }
                }
            }
        });
    });
</script>

<script>  //Bandirty TREND 
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Prepare data array for all 12 months
        let monthlyData = new Array(12).fill(0); // Initialize with zeros
        
        // Fill in the data from sitreps_total
        @foreach($sitreps_total as $data)
            monthlyData[{{ $data->month }} - 1] = {{ $data->crime4 }};
        @endforeach
        
        // chart 8 - Line chart for yearly trends
        var ctx = document.getElementById("chart10").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Bandirty Trend',
                    data: monthlyData,
                    borderColor: "#f7772dff",
                    backgroundColor: "rgba(209, 126, 78, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#420442ff",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3 // Smooth line
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontColor: '#ddd',
                            fontSize: 12,
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.3
                    }
                }
            }
        });
    });
</script>

<script>  //Terrorism TREND 
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Prepare data array for all 12 months
        let monthlyData = new Array(12).fill(0); // Initialize with zeros
        
        // Fill in the data from sitreps_total
        @foreach($sitreps_total as $data)
            monthlyData[{{ $data->month }} - 1] = {{ $data->crime5 }};
        @endforeach
        
        // chart 8 - Line chart for yearly trends
        var ctx = document.getElementById("chart11").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Bandirty Trend',
                    data: monthlyData,
                    data: monthlyData,
                    borderColor: "#d4190cff",
                    backgroundColor: "rgba(218, 63, 63, 0.1)",
                    borderWidth: 3,
                    pointBackgroundColor: "#f50c0cff",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.3 // Smooth line
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontColor: '#ddd',
                            fontSize: 12,
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)',
                            borderColor: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            fontColor: '#ddd',
                            fontSize: 11,
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                },
                elements: {
                    line: {
                        tension: 0.3
                    }
                }
            }
        });
    });
</script>






<script>  // comparativeCrimeChart
    $(function() {
        "use strict";
        
        // Prepare month labels
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        
        // Initialize data arrays for all crime types
        let homicideData = new Array(12).fill(0);
        let robberyData = new Array(12).fill(0);
        let kidnappingData = new Array(12).fill(0);
        let banditryData = new Array(12).fill(0);
        let terrorismData = new Array(12).fill(0);
        
        // Fill data from sitreps_total
        @foreach($sitreps_total as $data)
            homicideData[{{ $data->month }} - 1] = {{ $data->crime1 }};
            robberyData[{{ $data->month }} - 1] = {{ $data->crime2 }};
            kidnappingData[{{ $data->month }} - 1] = {{ $data->crime3 }};
            banditryData[{{ $data->month }} - 1] = {{ $data->crime4 }};
            terrorismData[{{ $data->month }} - 1] = {{ $data->crime5 }};
        @endforeach
        
        // Create comparative chart
        var ctx = document.getElementById("comparativeCrimeChart").getContext('2d');
        var comparativeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [
                    {
                        label: 'Culpable Homicide',
                        data: homicideData,
                        borderColor: "rgba(90, 113, 238, 1)",
                        backgroundColor: "rgba(90, 113, 238, 0.1)",
                        borderWidth: 2,
                        pointBackgroundColor: "rgba(90, 113, 238, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Armed Robbery',
                        data: robberyData,
                        borderColor: "rgba(10, 88, 3, 1)",
                        backgroundColor: "rgba(10, 88, 3, 0.1)",
                        borderWidth: 2,
                        pointBackgroundColor: "rgba(10, 88, 3, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Kidnapping',
                        data: kidnappingData,
                        borderColor: "rgba(190, 24, 212, 1)",
                        backgroundColor: "rgba(190, 24, 212, 0.1)",
                        borderWidth: 2,
                        pointBackgroundColor: "rgba(190, 24, 212, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Banditry',
                        data: banditryData,
                        borderColor: "rgba(211, 68, 12, 1)",
                        backgroundColor: "rgba(211, 68, 12, 0.1)",
                        borderWidth: 2,
                        pointBackgroundColor: "rgba(211, 68, 12, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Terrorism',
                        data: terrorismData,
                        borderColor: "rgba(177, 19, 19, 1)",
                        backgroundColor: "rgba(177, 19, 19, 0.1)",
                        borderWidth: 2,
                        pointBackgroundColor: "rgba(177, 19, 19, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 1.5,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        display: false, // Hide default legend (using custom HTML legend)
                        position: 'top',
                        labels: {
                            font: {
                                size: 11
                            },
                            boxWidth: 15,
                            padding: 10,
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 13
                        },
                        bodyFont: {
                            size: 12
                        },
                        padding: 12,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y.toLocaleString();
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            },
                            color: '#666'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            },
                            color: '#666',
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        },
                        title: {
                            display: true,
                            text: 'Number of Cases',
                            color: '#666',
                            font: {
                                size: 12,
                                weight: 'normal'
                            }
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.3
                    },
                    point: {
                        hoverRadius: 7
                    }
                }
            }
        });
    });
</script>




































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

</body>

</html>